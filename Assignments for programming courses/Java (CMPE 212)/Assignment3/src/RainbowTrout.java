
public class RainbowTrout extends Fish{
	
	public RainbowTrout(double startWeight){
		super(startWeight);
	}//end constructor
	
	public RainbowTrout clone(){
		RainbowTrout cloned = new RainbowTrout(getStartWeight());
		cloned.setWeight(getWeight());
		cloned.setPrevWeight(getPrevWeight());
		return cloned;
	}//end clone()
	
	public double getRetainedEnergy(){
		double weight = getWeight();
		return (5.0 + 0.005 * weight) * (weight - getPrevWeight());
	}//end getRetainedEnergy
	
	public void increaseWeight(int numDays, double temperature){
		setPrevWeight(getWeight());
		double newWeight = Math.pow((Math.cbrt(getWeight()) + (0.191 * numDays * temperature) / 100), 3);
		setWeight(newWeight);
	}//end increaseWeight
	
}//end class
