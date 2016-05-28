package Weibo;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class Write {
	public static void main(String[] args) {
		try {

			String content = "123456789 1012345678 liuxiang1 123456789 1012345678 123456789 //@鲁振旺:拿下！ //@航空物语:网友独家爆料：嫌疑犯搭乘国泰航空CX897航班由洛杉矶飞往香港。嫌疑犯机场临时购买商务舱机票登机！飞机预计5点降落香港国际机场！//@鲁振旺:拿下！ //@航空物语:网友独家爆料：嫌疑犯搭乘国泰航空CX897航班由洛杉矶飞往香港。嫌疑犯机场临时购买商务舱机票登机！飞机预计5点降落香港国际机场！//@鲁振旺:拿下！ //@航空物语:网友独家爆料：嫌疑犯搭乘国泰航空CX897航班由洛杉矶飞往香港。嫌疑犯机场临时购买商务舱机票登机！飞机预计5点降落香港国际机场！";

			File file = new File("/home/liuxianga/filename.txt");

			// if file doesnt exists, then create it
			if (!file.exists()) {
				file.createNewFile();
			}

			FileWriter fw = new FileWriter(file.getAbsoluteFile());
			BufferedWriter bw = new BufferedWriter(fw);
			for (int i = 0; i < 20000; i++)
				bw.write(content+'\n');
			
			bw.close();

			System.out.println("Done");

		} catch (IOException e) {
			e.printStackTrace();
		}
	}
}
