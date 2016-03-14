import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.file.Files;
import java.nio.file.LinkOption;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
/**
 * A class to store information pertaining to a cage's daily feed amount over the course of a month.
 * <br><br>
 * When the object CageData is declared, the user must specify the cage's designation and the name of the month.  
 * The cage designation starts with the letter 'A' of the letter 'B'.  The next digits represent a number between
 * 10 and 99 inclusive.  The object only stores non-abbreviated months on the Roman Calendar.  Once declared, the object reads a
 * file with filename <code>(cageDesignation + month + ".csv")</code> that stores the kg of feed used for each day of
 * the month <u>one number per line</u> in a double array called foodWeight.  The sum of every member of the foodWeight
 * array is stored in attribute foodSum. 
 * <br><br>
 * <i><b>There must exist an associated file called <code>(cageDesignation + month + ".csv")</code> for the object to be
 * properly declared.</b></i>
 * 
 * @author Jeremy Roy
 * @version 1.0
 */

public class CageData {
	private String cageName;
	private String month;
	private double[] foodWeight; //Stores array of foodWeight/day (in kg) for cage during specified month
	private double foodSum;  //Stores sum of foodWeights (in kg) for cage during specified month
	
	/**
	 * Declares new CageData object.
	 * @param designation Cage designation. The cage designation starts with the letter 'A' of the letter 'B'.  
	 * The next two digits represent a number between 10 and 99 inclusive.
	 * @param mth The month the feed amounts were read.  Must be a month on the <i>Roman Calendar</i>.
	 * @throws CageDataException If arguments are not legal.
	 */
	//constructor:
	public CageData (String designation, String mth) throws CageDataException{
		setCageName(designation);
		setMonth(mth);
		readFoodWeight();
		calcTotFoodWeight();
	}//end CageData()
	
	private void setCageName(String name) throws CageDataException{
		char cageLetter = name.toUpperCase().charAt(0);
		int cageNumber = 0;
		try{
			cageNumber = Integer.parseInt(name.substring(1));
		}catch(NumberFormatException e){
			throw new CageDataException("Cage name contains illegal number: " + name.substring(1));
		}//end try block
		if (cageLetter != 'A' && cageLetter != 'B')
			throw new CageDataException("Cage name contains illegal letter: " + cageLetter);
		if (cageNumber <= 10 || cageNumber >= 99)
			throw new CageDataException("Cage name contains illegal number: " + cageNumber);
		cageName = "" + cageLetter + cageNumber;
	}//end setCageName()
	
	private void setMonth(String mth) throws CageDataException{
		mth = mth.toLowerCase();
		if (!mth.equals("january") && !mth.equals("february") && !mth.equals("march")
				&& !mth.equals("april") && !mth.equals("may") && !mth.equals("june")
				&& !mth.equals("july") && !mth.equals("august") && !mth.equals("september")
				&& !mth.equals("october") && !mth.equals("november") && !mth.equals("december"))
			throw new CageDataException("Please specify a month on the Roman callendar");
		month = mth;
	}//end setMonth()
	
	private void readFoodWeight() throws CageDataException{
		Charset charset = Charset.forName("Us-ASCII");
		ArrayList<String> fileInput = new ArrayList<String>();
		String fileName = cageName + month + ".csv";
		Path file = Paths.get(fileName);
		if(Files.exists(file, LinkOption.NOFOLLOW_LINKS) && Files.isReadable(file)){
			try {
				fileInput = (ArrayList<String>) Files.readAllLines(file, charset);
			} catch (IOException e) {
				System.err.println("Unable to read file: " + fileName + "/nPlease make sure to enter one value per line.");
			}//end try block
		}//end if
		checkFoodWeightErrors(fileInput);
		foodWeight = new double[fileInput.size()];	
		for (int i = 0; i < fileInput.size(); i++){
			foodWeight[i] = Double.parseDouble(fileInput.get(i));
			foodWeight[i] = Math.round(foodWeight[i]  * 10) / 10.0; //Values are only accurate to a tenth of a kg.  Do rounding if values too precise.
			//System.out.println(foodWeight[i]);
		}//end for
	}//end readFoodWeight()
	
	private void checkFoodWeightErrors(ArrayList<String> fWInput) throws CageDataException{
		checkFoodWeightNumInputs(fWInput);
		checkFoodWeightValueLegality(fWInput);
	}//end checkFoodWeightErrors()
	
	private void checkFoodWeightNumInputs(ArrayList<String> fWInput) throws CageDataException{
		if ((fWInput.size() != 28 && month.toLowerCase().equals("february"))
				|| (fWInput.size() != 30 && (month.toLowerCase().equals("april") || month.toLowerCase().equals("june")
				|| month.toLowerCase().equals("september") || month.toLowerCase().equals("november")))
				|| (fWInput.size() != 31 && (month.toLowerCase().equals("january") || month.toLowerCase().equals("march")
				|| month.toLowerCase().equals("may") || month.toLowerCase().equals("july") || month.toLowerCase().equals("august")
				|| month.toLowerCase().equals("october") || month.toLowerCase().equals("december"))))
			throw new CageDataException("File associated with cage contains an illegal number of inputs.");
	}//end checkFoodWeightNumInputs()
	
	private void checkFoodWeightValueLegality(ArrayList<String> fWInput) throws CageDataException{
		double[] fW = new double[fWInput.size()];
		for (int i = 0; i < fWInput.size(); i++){
			fW[i] = Double.parseDouble(fWInput.get(i));
			if (fW[i] > 2000 || fW[i] < 0)
				throw new CageDataException("Illegal food weight: " + fW[i]);
		}//end for
	}//end checkFoodWeightValueLegality()
	
	private void calcTotFoodWeight(){
		for (int i = 0; i < foodWeight.length; i++)
			foodSum += foodWeight[i];
		foodSum = Math.round(foodSum  * 10) / 10.0;//For some reason the program returns weird double values (like x.999999999) without this.
	}//end calcTotFoodWeight()
	
	/**
	 * Returns the cage designation.
	 * @return Cage designation.
	 */
	public String getCageName(){
		return cageName;
	}//end getCageName()
	
	/**
	 * Returns the month on the Roman Calendar when the associated feed amounts per day were sampled.
	 * @return Month feed weight was sampled.
	 */
	public String getMonth(){
		return month;
	}//end getMonth()
	
	/**
	 * An array of the feed amounts per day in kg that was supplied to the cage.
	 * @return Feed amounts per day in kg.
	 */
	public double[] getFoodAmounts(){
		return foodWeight.clone();
	}//end getFoodAmounts()
	
	/**
	 * Returns the total amount of feed supplied to the cage over the course of the month (in kg)
	 * @return Total amount of feed supplied to cage over the course of the month (in kg).
	 */
	public double getFoodSum(){
		return foodSum;
	}//end getFoodSum
	
	/**
	 * Creates a string representation of the object.
	 * @return A string representation of the object that contains all the values of the attributes.
	 */
	@Override
	public String toString(){
		return "Data for cage " + cageName + ", for " 
				+ month.substring(0,1).toUpperCase() 
				+ month.substring(1) + ": " 
				+ foodSum + " kg total feed.";
	}//end toString()
	
	/**
	 * Compares two CageData objects on the basis of the total amount of food supplied to the cage 
	 * (in kg) over the course of the month <u>only</u>.
	 * @param otherCage The other CageData object.
	 * @return<ul><li>Positive <code>int</code> if the current object has a higher total amount of food</li>
	 * 			  <li>Negative <code>int</code> if the other object has a higher total amount of food</li>
	 * 			  <li>Zero if the two objects have the same total amount of food</li></ul>
	 */
	public int compareTo(CageData otherCage){
		return (int) (foodSum - otherCage.foodSum);
	}//end compareTo()
	
	/**
	 * Tests two CageData objects for equality on the basis of their <i>cage designation</i> and <i>month</i>.
	 * @param otherObject The other CageData object.
	 * @return <ul><li><code>true</code> if the cage designation and month of both objects are identical;</li> <li><code>false</code> otherwise.</li></ul>
	 */
	@Override
	public boolean equals(Object otherObject){
		if (otherObject instanceof CageData){
			CageData otherCage = (CageData) otherObject;
			if (month.equals(otherCage.month) && cageName.equals(otherCage.cageName))
				return true;
		}//end if
		return false;
	}//end equals()
	
	/**
	 * Creates a un-aliased copy of the CageData object.
	 * @return A cloned version of the CageData object
	 */
	@Override
	public CageData clone(){
		CageData cloned = null;
		try {
			cloned = new CageData(cageName, month);
		} catch (CageDataException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}//end try block
		return cloned;
	}//end clone()
}
