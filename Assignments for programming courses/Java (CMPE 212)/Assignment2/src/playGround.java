import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.file.Files;
import java.nio.file.LinkOption;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;


public class playGround {

	public static void main(String[] args) {

		/*Charset charset = Charset.forName("Us-ASCII");
		ArrayList<String> fileInput = new ArrayList<String>();
		String fileName = IOHelper.getString("Please enter the name of the file you wish to read: ") + ".csv";
		Path file = Paths.get(fileName);
		
		if(Files.exists(file, LinkOption.NOFOLLOW_LINKS) && Files.isReadable(file)){
			System.out.println("File exists and is readable!");
			try {
				fileInput = (ArrayList<String>) Files.readAllLines(file, charset);
			} catch (IOException e) {
				System.err.println("Unable to read file: " + fileName);
			}//end try block
		}//end if
		for (int i = 0; i < fileInput.size(); i++)
			System.out.println(fileInput.get(i));*/
		System.out.println(Math.round(25.56845684 * 10) / 10.0);
	}
}
