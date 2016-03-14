
public abstract class Fish {
	
	private double startingWeight;
	private double currentWeight;
	private double prevWeight;
	
	public Fish(double startWeight){
		startingWeight = startWeight;
		setWeight(startWeight);
	}//end Fish() constructor
	
	@Override
	public abstract Fish clone(); //end clone()
	
	public double getMaintenanceEnergy(int time, double temp){
		return (-0.0104 + 3.26 * temp - 0.05 * Math.pow(temp,2)) 
				* Math.pow(currentWeight / 1000, 0.824) * time;
	}//end getMaintenanceEnergy()
	
	public abstract double getRetainedEnergy(); //end getRetainedEnergy()
	
	public double getStartWeight(){
		return startingWeight;
	}//end getStartWeight()
	
	public double getWeight(){
		return currentWeight;
	}//end getWeight()
	
	public double getPrevWeight(){
		return prevWeight;
	}//end getPrevWeight()
	
	public abstract void increaseWeight(int numDays, double temperature); //end increaseWeight
	
	public void setWeight(double weight){
		currentWeight = weight;
	}//end setWeight()
	
	public void setPrevWeight(double weight){
		prevWeight = weight;
	}//end setPreWeight
	
	
}//end class
