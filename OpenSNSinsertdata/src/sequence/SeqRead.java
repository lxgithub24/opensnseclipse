package sequence;

import java.io.IOException;
import java.net.URI;

import org.apache.hadoop.fs.FileSystem;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.SequenceFile;
import org.apache.hadoop.io.Writable;
import org.apache.hadoop.util.ReflectionUtils;
import org.apache.hadoop.conf.Configuration;

import org.apache.hadoop.io.IOUtils;

public class SeqRead {//读取sequenceFile文件
	public static void main(String[] args) throws Exception{
		Configuration conf = new Configuration();
		
		FileSystem fs = FileSystem.get(conf);
		
		Path path = new Path("hdfs://lx-zhujiming:9000/user/liuxianga/tmp/input/filelx");
		
		SequenceFile.Reader reader = null;
		
		try{
			reader = new SequenceFile.Reader(fs, path,conf);
			Writable key = (Writable) ReflectionUtils.newInstance(reader.getKeyClass(), conf);
			
			Writable value = (Writable) ReflectionUtils.newInstance(reader.getValueClass(), conf);
			
			while(reader.next(key,value)){
				System.out.println(key+"\t"+value);
				break;
			}
		}catch (Exception e){
			e.printStackTrace();
		}finally{
			IOUtils.closeStream(reader);
		}
	}
}
