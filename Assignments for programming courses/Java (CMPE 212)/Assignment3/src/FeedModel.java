import java.util.ArrayList;

/**
 * This class is responsible for modeling the growth of the fish given the cage, the
 * temperature profile, the starting month and the desired final weight per fish.
 * 
 * @author Alan McLeod
 * @version 1.0
 */
public class FeedModel {

	private double desiredWeight;
	private String startingMonth;
	private Cage modelCage;
	private Fish aFish;
	private IntervalData firstInterval;
	
	/**
	 * The constructor.  It obtains the starting conditions from the supplied {@link IntervalData}
	 * object along with the desired final fish weight.  The object assumes that the
	 * {@link IntervalData} object contains only legal data and that the finish weight has already
	 * been checked for validity.
	 * @param startingConditions This object supplies the month to start the model, the {@link Cage}
	 * object to be used and the {@link Fish} object to be used. This object also contains the data
	 * for the first interval, which includes the starting number of fish and the starting
	 * fish weight.
	 * @param finishWeight The desired final fish weight in grams per fish.  The model will
	 * stop when this weight has been matched or exceeded.
	 */
	public FeedModel(IntervalData startingConditions, double finishWeight) {
		firstInterval = startingConditions;
		desiredWeight = finishWeight;
		startingMonth = startingConditions.getMonthName();
		modelCage = startingConditions.getCageSnapshot().clone();
		aFish = startingConditions.getFishSnapshot().clone();
	}
	
	// Models a single month.  Returns an IntervalData object for this month.  The
	// fish mortality is applied after the amount of food is calculated for the month
	// using the number of fish at the beginning of the month.
	private IntervalData modelInterval(Month month) {
		int numDays = month.getNumDays();
		double temperature = month.getTemperature();
		aFish.increaseWeight(numDays, temperature);
		double maintenanceEnergy = aFish.getMaintenanceEnergy(numDays, temperature);
		double retainedEnergy = aFish.getRetainedEnergy();
		double digestionEnergy = 0.2 * (maintenanceEnergy + retainedEnergy);
		double nonFecalEnergyLoss = 0.1 * (maintenanceEnergy + retainedEnergy + digestionEnergy);
		double totalEnergyPerFish = maintenanceEnergy + retainedEnergy + digestionEnergy +
				nonFecalEnergyLoss;
		double foodForInterval = totalEnergyPerFish * modelCage.getNumFish() / Food.FOOD_ENERGY_CONTENT;
		modelCage.reduceNumFish(numDays);
		return new IntervalData(month, aFish, modelCage, foodForInterval / 1000);
	}
	
	/**
	 * Runs the model described in the assignment 1 statement. The model uses the starting conditions
	 * supplied to the constructor and stops when the desired final weight has been matched
	 * or exceeded.
	 * @return An ArrayList of {@link IntervalData} objects, where there is one object for each
	 * month modeled.
	 */
	public ArrayList<IntervalData> runModel() {
		ArrayList<IntervalData> data = new ArrayList<>();
		data.add(firstInterval);
		modelCage.setStartMonth(startingMonth);
		Month currentMonth = modelCage.getCurrentMonth();
		while (aFish.getWeight() < desiredWeight) {
			data.add(modelInterval(currentMonth));
			currentMonth = modelCage.nextMonth();
		}
		return data;
	}
	
} // end FeedModel class