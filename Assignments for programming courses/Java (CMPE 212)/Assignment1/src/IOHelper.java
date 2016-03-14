/*
 * This is a "helper" utility class by Jeremy Roy.
 * It contains methods that can be used to:
 * 		- obtain an int from the user
 * 		- obtain a double from the user
 * 		- obtain a String from the user
 * 		- save and write text tiles using String arrays.
 * The methods to obtain a number from the user can optionally
 * accept the following parameters:
 * 		- the low legal limit
 * 		- the high legal limit
 * 		- a String prompt
 */
import java.io.*;
import java.util.*;
import java.nio.charset.Charset;
import java.nio.file.Files;
import java.nio.file.LinkOption;
import java.nio.file.Path;
import java.nio.file.Paths;

public class IOHelper {
	
	private static Scanner screen = new Scanner(System.in);

	public static int getInt(int low, String prompt, int high){//three-input method to read ints from the console
		int num=0;
		boolean inputOk = false;
		String dump;
		
		while(!inputOk){
			try{
				System.out.println(prompt);
				num = screen.nextInt();
				if(num <= high && num >= low){//Check if inputed number is within bounds
					inputOk = true;
				}
				else{
					System.out.println("The number is outside the legal limits.");
				}// end if block
			} catch(InputMismatchException e){ //Check if user inputed an integer
				dump = screen.nextLine();
				System.out.printf("%s is not an integer!\n", dump);
			} // end try block
		}// end while loop
		return num;
	}// end getInt()
	
	public static int getInt(int low, String prompt){//two-input method to read ints from the console (if low number is supplied)
		int high = Integer.MAX_VALUE;
		return getInt(low, prompt, high);
	}// end getInt()
	
	public static int getInt(String prompt, int high){//two-input method to read ints from the console (if high number is supplied)
		int low = Integer.MIN_VALUE;
		return getInt(low, prompt, high);
	}// end getInt()
	
	public static int getInt(String prompt){//method to read and print ints from the console
		int high = Integer.MAX_VALUE;
		int low = Integer.MIN_VALUE;
		return getInt(low, prompt, high);
	}// end getInt()
	
	public static int getInt(){//method to read and print ints from the console (without custom)
		int high = Integer.MAX_VALUE;
		int low = Integer.MIN_VALUE;
		String prompt = "Please enter any integer: ";
		return getInt(low, prompt, high);
	}// end getInt()
	
	public static double getDouble(double low, String prompt, double high){//three-input method to read doubles from the console
		double num=0;
		Scanner screen = new Scanner(System.in);
		boolean inputOk = false;
		String dump;
		
		while(!inputOk){
			try{
				System.out.println(prompt);
				num = screen.nextDouble();
				if(num <= high && num >= low){//Check if inputed number is within bounds
					inputOk = true;
				}
				else{
					System.out.println("The number is outside the legal limits.");
				}// end if block
			} catch(InputMismatchException e){ //Check if user inputed a double
				dump = screen.nextLine();
				System.out.printf("%s is not a double!\n", dump);
			} // end try block
		}// end while loop
		return num;
	}// end getDouble()
	
	public static double getDouble(double low, String prompt){//two-input method to read doubles from the console (if low number is supplied)
		double high = Double.MAX_VALUE;
		return getDouble(low, prompt, high);
	}// end getDouble()
	
	public static double getDouble(String prompt, double high){//two-input method to read doubles from the console (if high number is supplied)
		double low = -Double.MAX_VALUE;
		return getDouble(low, prompt, high);
	}// end getDouble()
	
	public static double getDouble(String prompt){//method to read and print doubles from the console
		double low = -Double.MAX_VALUE;
		double high = Double.MAX_VALUE;
		return getDouble(low, prompt, high);
	}// end getDouble()
	
	public static double getDouble(){//method to read and print doubles from the console (without custom)
		double low = -Double.MAX_VALUE;
		double high = Double.MAX_VALUE;
		String prompt = "Please enter any double: ";
		return getDouble(low, prompt, high);
	}// end getDouble()
	
	public static String getString(String prompt){//reads and returns a string from the console
		String userInput = null;
		System.out.print(prompt);
		userInput = screen.nextLine();
		return userInput;
	}//end getString()
	
	
	/* I, Jeremy Roy, had no idea how to write these functions, 
	 * even after a couple of hours time on stack overflow.
	 * The saveText() and readText() functions where therefore copied from the prof's solutions.
	 * When I have a better understanding of Java I will attempt to re-write these functions.
	 */
	public static int saveText(String filename, String[] text) {
    	int lineCount = 0;
    	Charset charset = Charset.forName("US-ASCII");
        Path file = Paths.get(filename);
        // Creates file or empties existing file.
		try (BufferedWriter writer = Files.newBufferedWriter(file, charset)) {
			for (int i = 0; i < text.length; i++) {
				writer.write(text[i] + "\r\n");  // Note addition of line terminator 
				lineCount++;
			}
		} catch (IOException err) {
		    System.err.format("IOException: %s%n", err);
		    System.err.println("Unable to write file: " + filename);
		    return 0;
		}
        return lineCount;
    } // end saveText

	public static String[] readText(String filename) {
        ArrayList<String> contents = null;
        Charset charset = Charset.forName("US-ASCII");
        Path file = Paths.get(filename);
		if (Files.exists(file, LinkOption.NOFOLLOW_LINKS) && Files.isReadable(file) )
			try {
				contents = (ArrayList<String>)Files.readAllLines(file, charset);
			} catch (IOException err) {
                System.err.format("IOException: %s%n", err);
                System.err.println("Unable to read file: " + filename);
                return null;
			}
		else {
            System.out.println("Unable to open file: " + filename);
            return null;
		}
        return contents.toArray(new String[0]);
    } // end readText
}//end IOHelper class
