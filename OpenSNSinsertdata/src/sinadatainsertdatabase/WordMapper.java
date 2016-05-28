package sinadatainsertdatabase;

import java.io.IOException;
import java.util.StringTokenizer;

import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper;

public class WordMapper extends Mapper<Object, Text, Text, Text> {
	// private final static IntWritable one = new IntWritable(1);
	private Text word = new Text();

	public void map(Object key, Text value, Context context)
			throws IOException, InterruptedException {
		String[] val = value.toString().split("	");
		if (val.length == 12) {
			String did = val[0];
			String timestamp = val[1];
			String uid = val[2];
			String username = val[3];
			String repostcount = val[4];
			String commentcount = val[5];
			String content = val[6];
			String sdid = val[7];
			String suid = val[8];
			String susername = val[9];
			String scontent = val[10];
			String replyid = val[11];
			String inputString = "";
			if (replyid.equals("null")) {
				inputString = "(" + did + "," + timestamp + "," + uid + ", '"
						+ username + "' , " + repostcount + "," + commentcount
						+ ", '" + content + "' ,";
				if (sdid.equals("null")) {
					inputString += ("'','','','',''),");
				} else {
					inputString += (sdid + "," + suid + ", '" + susername
							+ "'," + "'" + scontent + "',''),");
				}
				word.set(inputString);
				context.write(word, new Text());
			}
		}
//		if(val.length != 12){
//			word.set(value);
//			context.write(word, new Text());
//		}
	}
}
