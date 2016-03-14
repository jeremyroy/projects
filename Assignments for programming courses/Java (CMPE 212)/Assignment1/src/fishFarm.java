import java.text.DecimalFormat;
import java.util.Scanner;

public class fishFarm {
	
	
	public static void main(String[] args){
		int intervalSize;
		double timeTemp[][]; //stores time[][0] and temperature[][1] values at each interval
		int fishNum;
		double weight;
		double foodEnergyConstant;
		int feed; //in kg
		DecimalFormat df = new DecimalFormat("####0.00"); //round doubles in println
		
		/*Get user input*/
		fishNum = IOHelper.getInt("Please enter the initial number of fish: ");
		weight = IOHelper.getDouble("Please enter the average current weight of a single fish (in grams): ");
		foodEnergyConstant = IOHelper.getDouble("What is the food energy constant (kJ/gram) of the fishes' food? ");
		
		intervalSize = IOHelper.getInt(1, "Over how many intervals would you like to monitor the fish? ");
		
		timeTemp = new double[intervalSize][2];
		timeTemp = getArr(intervalSize);
		
		System.out.println("Interval\t" + "# Days\t\t" + "T (deg C)\t" + "# Fish\t\t" + "Wight per fish (g)");
		
		for (int i=0; i < intervalSize; i++){
			weight = calcWeight(timeTemp[i][0], timeTemp[i][1], fishNum, weight);
			feed = calcFeed(weight, timeTemp[i][0], timeTemp[i][1], foodEnergyConstant, fishNum);
			fishNum -= (int) (fishNum * 0.00022 * timeTemp[i][0]); //take into account mortality rate
			System.out.println((i+1) + "\t\t" + timeTemp[i][0] + "\t\t" + timeTemp[i][1] + "\t\t" + fishNum + "\t\t" + df.format(weight)); 
		}
		
	}//end of main()
	
	public static double[][] getArr(int size){
		double time[][] = new double[size][2];
		
		for (int i=0; i < size; i++){
			time[i][0] = IOHelper.getInt(1, "Please enter the length of interval " + (i+1) + " (in days): ", 100);
			time[i][1] = IOHelper.getDouble(0, "Please enter the temperature of the water during interval " + (i+1) + " (in degrees Centigrade): ", 30);
		}	
		
		return time;
	}//end getArr()
	
	public static double calcWeight(double time, double temp, int fishNum, double initWeight){
		return Math.pow((Math.cbrt(initWeight) + (0.191 * time * temp)/100), 3); 
	}// end calcWeight()
	
	public static int getInt(String prompt){
		int fishNum;
		Scanner screen = new Scanner(System.in);
		
		System.out.println(prompt);
		fishNum = screen.nextInt();
		
		return fishNum;
	}
	
	public static int calcFeed(double weight, double time, double temp, double foodEnergyConst, int numFish){
		int feedWeight;
		double totalEnergy = calcTE(time, temp, weight);
		
		feedWeight = (int) (totalEnergy/foodEnergyConst) * numFish;
		
		return feedWeight;
	}
	
	public static double calcME(double time, double temp, double weight){
		return (-0.0104 + 3.26*temp - 0.05*Math.pow(temp,2)) * Math.pow(weight/1000, 0.824) * time;
	}
	
	public static double calcRE(){
		return (5.0 + 0.005*weight)*(weight - initWeight);
	}
	
	public static double calcDE(double ME, double RE){
		return (ME + RE)*0.2;
	}
	
	public static double calcEL(double ME, double RE, double DE){
		return (ME + RE + DE)*0.1;
	}
	
	public static double calcTE(double time, double temp, double weight){
		double maintainedEnergy, retainedEnergy, digestionEnergy, energyLoss;
		
		maintainedEnergy = calcME(time, temp, weight);
		retainedEnergy = calcRE();
		digestionEnergy = calcDE();
		energyLoss = calcEL();
	
	}
}
