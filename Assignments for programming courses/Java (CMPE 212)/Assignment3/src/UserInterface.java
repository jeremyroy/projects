import java.util.ArrayList;

/**
 * This class is supplied for your use.  It prompts the user for the starting
 * conditions which are the starting number of fish, the starting weight of the
 * fish and the month that the cage should be started.  The user is also prompted
 * for the desired final weight of the fish.  The program then runs the growth
 * model until the fish have reached or surpassed the desired final weight.
 * The model is run for Rainbow Trout and then Lake Trout using the same
 * temperature profile and the same starting conditions.
 * <p>
 * There is code provided to display the interval results as well as the summary
 * results to the console.
 * <p>
 * You cannot change the code in this class, other than changing the console input
 * code so that you can use your own IOHelper class.  You will need to make sure your
 * objects work with this class.  Sample output is appended to the end of this
 * program.
 * 
 * @author Alan McLeod
 * @version 1.0
 */
public class UserInterface {

	/** Displays the results for each interval to the console.
	 * @param data An ArrayList of {@link IntervalData} objects
	 * where each record represents the data for each month.
	 */
	public static void displayResults(ArrayList<IntervalData> data) {
		System.out.println("\nMonth      deg C   #fish  g/fish  feed (kg)");
		for (IntervalData row : data)
			System.out.println(row);
	}
	
	/**
	 * Calculates and displays the summary data which consists of the total
	 * amount of feed used and the gain to feed ratio.
	 * @param data An ArrayList of {@link IntervalData} objects where 
	 * each record represents the data for each month.
	 */
	public static void displaySummary(ArrayList<IntervalData> data) {
		double feedSum = 0;
		double fishGain;
		double gainFeedRatio;
		IntervalData firstRecord = data.get(0);
		double startWeight = firstRecord.getFishSnapshot().getWeight();
		int startNumFish = firstRecord.getCageSnapshot().getNumFish();
		IntervalData lastRecord = data.get(data.size() - 1);
		double finalWeight = lastRecord.getFishSnapshot().getWeight();
		int finalNumFish = lastRecord.getCageSnapshot().getNumFish();
		for (IntervalData row : data)
			feedSum += row.getFoodAmount();
		fishGain = finalWeight * finalNumFish - startWeight * startNumFish;
		gainFeedRatio = fishGain / 1000 / feedSum;
		System.out.printf("\nTotal feed used: %d kg.", (int)feedSum);
		System.out.printf("\nGain to feed ratio: %5.3f", gainFeedRatio);
	}
	
	/**
	 * Main obtains the necessary information from the user, creates a
	 * {@link TemperatureProfile} object from the data in the csv file, and then
	 * runs the model using both Rainbow Trout and Lake Trout.
	 * @param args Command line parameters.  (Not used.)
	 */
	public static void main(String[] args) {
		String startMonth = IOHelper.getString("Month to start cage: ");
		int startNumFish = IOHelper.getInt(1, "Starting number of fish: ", 500000);
		int startWeight = IOHelper.getInt(1, "Starting fish weight in grams: ", 1000);
		int finishWeight = IOHelper.getInt(500, "Desired weight: ", 1500);
		if (finishWeight <= startWeight) {
			System.err.println("Why do you not want your fish to grow?");
			System.err.println("Exiting program!");
			System.exit(0);			
		}
		Fish fish = null;
		TemperatureProfile profile = null;
		try {
			profile = new TemperatureProfile("TemperatureProfile.csv");
		} catch (FeedModelException e) {
			System.err.println(e.getMessage());
			System.err.println("Exiting program!");
			System.exit(0);
		}
		// Model Rainbow Trout
		fish = new RainbowTrout(startWeight);
		Cage testCage = new Cage(startNumFish, profile.getTemperatureProfile());
		IntervalData startInterval = new IntervalData(startMonth, fish, testCage);
		FeedModel model = new FeedModel(startInterval, finishWeight);
		ArrayList<IntervalData> data = model.runModel();
		System.out.print("\nFor Rainbow Trout:");
		displayResults(data);
		displaySummary(data);
		// Model Lake Trout
		fish = new LakeTrout(startWeight);
		testCage = new Cage(startNumFish, profile.getTemperatureProfile());
		startInterval = new IntervalData(startMonth, fish, testCage);
		model = new FeedModel(startInterval, finishWeight);
		data = model.runModel();
		System.out.print("\n\nFor Lake Trout:");
		displayResults(data);
		displaySummary(data);
	} // end main

} // end UserInterface class
/* SAMPLE OUTPUT:
Month to start cage: May
Starting number of fish: 100000
Starting fish weight in grams: 10
Desired weight: 1200

For Rainbow Trout:
Month      deg C   #fish  g/fish  feed (kg)
-             -   100000     10       0
May         5.0    99318     15     274
June       18.0    98663     42    1681
July       19.0    97991     98    3557
August     21.0    97323    200    6972
September  19.0    96681    334    9905
October    11.0    96022    437    8339
November    5.5    95389    494    4791
December    0.5    94739    500     476
January     0.5    94093    505     477
February    0.5    93514    510     432
March       0.5    92877    516     481
April       0.5    92265    522     467
May         5.0    91636    581    5070
June       18.0    91032    825   21615
July       19.0    90412   1158   33369
August     21.0    89796   1620   52864

Total feed used: 150769 kg.
Gain to feed ratio: 0.958

For Lake Trout:
Month      deg C   #fish  g/fish  feed (kg)
-             -   100000     10       0
May         5.0    99318     13     203
June       18.0    98663     30    1074
July       19.0    97991     61    2010
August     21.0    97323    114    3580
September  19.0    96681    179    4747
October    11.0    96022    228    3873
November    5.5    95389    255    2195
December    0.5    94739    257     218
January     0.5    94093    260     219
February    0.5    93514    262     198
March       0.5    92877    265     219
April       0.5    92265    268     213
May         5.0    91636    295    2270
June       18.0    91032    407    9035
July       19.0    90412    557   13117
August     21.0    89796    762   19405
September  19.0    89204    978   22633
October    11.0    88596   1125   16999
November    5.5    88012   1201    9249

Total feed used: 111456 kg.
Gain to feed ratio: 0.940
*/

