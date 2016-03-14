
public class LakeTrout extends Fish{
	public LakeTrout(double startWeight){
		super(startWeight);
	}//end constructor
	
	public LakeTrout clone(){
		LakeTrout cloned = new LakeTrout(getStartWeight());
		cloned.setWeight(getWeight());
		cloned.setPrevWeight(getPrevWeight());
		return cloned;
	}//end clone()
	
	public double getRetainedEnergy(){
		double weight = getWeight();
		return (4.5 + 0.006 * weight) * (weight - getPrevWeight());
	}//end getRetainedEnergy
	
	public void increaseWeight(int numDays, double temperature){
		setPrevWeight(getWeight());
		double newWeight = Math.pow((Math.cbrt(getWeight()) + (0.139 * numDays * temperature) / 100), 3);
		setWeight(newWeight);
	}//end increaseWeight
}
