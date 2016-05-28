package SelectWanUser;

import java.io.IOException;
import java.util.StringTokenizer;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper;

public class WordMapper extends Mapper<Object, Text, Text, Text> {
//	private final static IntWritable one = new IntWritable(1);
	
	private Text word1 = new Text();
	private Text word2 = new Text();
	public void map(Object key, Text value, Context context) throws IOException, InterruptedException {
		StringTokenizer itr = new StringTokenizer(value.toString());
//		while(itr.hasMoreTokens()) {
//			itr.nextToken();
//			String a = itr.nextToken();
//			String b = itr.nextToken();
//			word1.set("("+a+", '"+b+"', 0, '0000-00-00', '', 4, 2130706433, 1453512556, 2887392934, 1453560120, 1, 1, 1, '', 0, 0, 0, 0, 13, 0, 0, 0, 0, 0),");
//			context.write(word1, new Text());
//			itr.nextToken();
//			String c = itr.nextToken();
//			itr.nextToken();
//			word2.set("("+c+", '"+c+"', 0, '0000-00-00', '', 4, 2130706433, 1453512556, 2887392934, 1453560120, 1, 1, 1, '', 0, 0, 0, 0, 13, 0, 0, 0, 0, 0),");
			context.write(value, new Text());
//		}
	}
}
//(100, 'liuxiang1', 0, '0000-00-00', '', 4, 2130706433, 1453512556, 2887392934, 1453560120, 1, 1, 1, '', 0, 0, 0, 0, 13, 0, 0, 0, 0, 0),
//8285a9d62f00633ddf8f0c9cf07daabd