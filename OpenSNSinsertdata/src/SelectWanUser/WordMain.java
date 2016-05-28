package SelectWanUser;

import java.nio.file.FileSystem;
import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;
import org.apache.hadoop.mapreduce.Job;
import org.apache.hadoop.util.GenericOptionsParser;

public class WordMain {

	public static void main(String[] args) throws Exception {
		Configuration conf = new Configuration();
		String[] otherArgs = new GenericOptionsParser(conf, args).getRemainingArgs();
		if (otherArgs.length != 2){
			System.err.println("Usage: wordcount <in> <out>");
			System.exit(2);
		}
		Job job = new Job(conf, "word count");
		job.setJarByClass(WordMain.class);
		job.setMapperClass(WordMapper.class);
		job.setReducerClass(WordReducer.class);
		job.setOutputKeyClass(Text.class);
		job.setOutputValueClass(Text.class);
		Path path1 = new Path(otherArgs[0]);
		Path path2 = new Path(otherArgs[1]);
		org.apache.hadoop.fs.FileSystem fs = path2.getFileSystem(conf);
		if(fs.exists(path2))
			fs.delete(path2);
		FileInputFormat.addInputPath(job, path1);
		FileOutputFormat.setOutputPath(job, path2);
		
		job.waitForCompletion(true);
//		System.exit(job.waitForCompletion(true)?0:1);
	}
}
