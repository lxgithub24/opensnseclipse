package opensns_weibo;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.conf.Configured;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Job;
import org.apache.hadoop.mapreduce.Mapper;
import org.apache.hadoop.mapreduce.Reducer;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.input.SequenceFileInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;
import org.apache.hadoop.mapreduce.lib.output.TextOutputFormat;
import org.apache.hadoop.util.Tool;
import org.apache.hadoop.util.ToolRunner;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.io.IOException;

/**
 * 博文数据导出Demo，输出key为用户id，value为用户所属地域
 *
 */
public class WriteWeibo extends Configured implements Tool {

	private static final Logger logger = LoggerFactory
			.getLogger(WriteWeibo.class);

	private static String DELIMITER_COMMA = ",";

	private static String DELIMITER_TAB = "\t";

	public static void main(String[] args) throws Exception {
		System.exit(ToolRunner.run(new Configuration(),
				new WriteWeibo(), args));
	}

	@Override
	public int run(String[] args) throws Exception {
		if (args.length != 2) {
			logger.warn("Exporter: " + "input output reducenum");
			return 1;
		}

		String input = args[0].trim();
		String output = args[1].trim();
		// int reducerNum = Integer.parseInt(args[2].trim());

		Job job = Job.getInstance(getConf());

		job.setJobName("SequenceFileReadDemo");
		job.setJarByClass(WriteWeibo.class);

		job.setMapperClass(InnerMapper.class);
		job.setReducerClass(InnerReducer.class);

		job.setInputFormatClass(SequenceFileInputFormat.class);
		job.setOutputFormatClass(TextOutputFormat.class);

		job.setMapOutputKeyClass(Text.class);
		job.setMapOutputValueClass(Text.class);

		job.setOutputKeyClass(Text.class);
		job.setOutputValueClass(Text.class);

		// job.setNumReduceTasks(reducerNum);

		// String[] sources = input.split(DELIMITER_COMMA);
		// for (String source : sources) {
		FileInputFormat.addInputPath(job, new Path(input));
		// }
		Configuration conf = new Configuration();
		Path path2 = new Path(output);
		org.apache.hadoop.fs.FileSystem fs = path2.getFileSystem(conf);
		if (fs.exists(path2))
			fs.delete(path2);
		FileOutputFormat.setOutputPath(job, path2);

		// return job.waitForCompletion(true) ? 0 : 1;

		long startTime = System.currentTimeMillis();
		boolean retun = job.waitForCompletion(true);
		long endTime = System.currentTimeMillis();
		long timeSpend = endTime - startTime;
		timeSpend /= 1000;
		if (timeSpend >= 3600) {
			System.out.println(timeSpend / 3600 + "小时" + timeSpend / 60 % 3600
					+ "分钟" + timeSpend % 60 + "秒");
		} else if (timeSpend >= 60) {
			System.out.println(timeSpend / 60 % 3600 + "分钟" + timeSpend % 60
					+ "秒");
		} else {
			System.out.println(timeSpend % 60 + "秒");
		}
		return retun ? 0 : 1;
	}

	public static class InnerMapper extends Mapper<Text, Text, Text, Text> {

		// Text outputValue = new Text();
		Text wordkey = new Text();
		Text wordvalue = new Text();

		@Override
		protected void map(Text key, Text value, Context context)
				throws IOException, InterruptedException {
			// key：用户id
			// value：用户名、性别（0：男；1：女；2：未知）、地域、账号创建时间（格式为milliseconds）、发博数、粉丝数、关注数、用户描述
			// String location = value.toString().split(DELIMITER_TAB)[2];

			// outputValue.set(location);
			//
			// context.write(key, outputValue);

			String[] val = value.toString().split("	");
			if (val.length == 11) {
				String did = key.toString();
				String timestamp = val[0].substring(0,10);
				String uid = val[1];
				String username = val[2];
				String repostcount = val[3];
				String commentcount = val[4];
				String content = val[5];
				String sdid = val[6];
				String suid = val[7];
				String susername = val[8];
				String scontent = val[9];
				String replyid = val[10];
				String inputkey = "";
				String inputvalue = "";
				if(sdid.equals("null")){
					inputkey = "("+did+","+uid+",'"+content+"',";
					inputvalue = timestamp+","+commentcount+",1,0,'feed','a:0:{}',"+repostcount+",''),";
					wordkey.set(inputkey);
					wordvalue.set(inputvalue);
					context.write(wordkey, wordvalue);
				}
				if(!sdid.equals("null")){
					inputkey = "("+did+","+uid+",'"+content+"',";
					inputvalue = timestamp+","+commentcount+",1,0,'repost','a:2:{s:6:\"source\";N;s:8:\"sourceId\";i:"+sdid+";}',"+repostcount+",''),";
					wordkey.set(inputkey);
					wordvalue.set(inputvalue);
					context.write(wordkey, wordvalue);
					
					
					inputkey = "("+sdid+","+suid+",'"+scontent+"',";
					inputvalue = timestamp+",0,1,0,'feed','a:0:{}',0,''),";
					wordkey.set(inputkey);
					wordvalue.set(inputvalue);
					context.write(wordkey, wordvalue);
				}
			}
		}
	}

	public static class InnerReducer extends Reducer<Text, Text, Text, Text> {

		@Override
		protected void reduce(Text key, Iterable<Text> values, Context context) throws IOException, InterruptedException {
			int timestamp = 1464453490;
			int currenttimestamp = 0;
			int repostCountString = 0;
			boolean flag = false;
//			values.spliterator().
			for (Text value : values) {
				String[] valuecomma = value.toString().split(",");
				if(!valuecomma[6].equals("0")){
					context.write(key, value);
					flag = true;
					break;
				}
				repostCountString++;
				currenttimestamp = Integer.parseInt(valuecomma[0]);
				if(Integer.parseInt(valuecomma[0])<timestamp)timestamp = currenttimestamp;
			}
			if(!flag){
				String inputvalue = "";
				inputvalue = timestamp+",0,1,0,'feed','a:0:{}',"+repostCountString+",''),";
				context.write(key, new Text(inputvalue));
			}
		}
	}
}
