package SelectWanUser;

import java.io.IOException;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Reducer;

public class WordReducer extends Reducer<Text, Text, Text, Text>{
//	private IntWritable result = new IntWritable();
	private Text result = new Text();
	public void reduce(Text key, Iterable<Text> values, Context context) throws IOException, InterruptedException{
//		int sum = 0;
		for(Text val : values);
//			sum += val.get();
//		result.set(sum);
		context.write(key, new Text());
	}
	
}
