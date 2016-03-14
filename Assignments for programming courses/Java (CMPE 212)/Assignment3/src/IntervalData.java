
public class IntervalData {
	Month daMonth;
	Fish fishClone;
	Cage cageClone;
	double foodUsed;
	
	public IntervalData(Month month, Fish fish, Cage cage, double foodAmount){
		daMonth = month.clone();
		fishClone = fish.clone();
		cageClone = cage.clone();
		foodUsed = foodAmount;
	}//end constructor 1
	
	public IntervalData(String monthName, Fish fish, Cage cage){
		setInitMonth(monthName,cage);
		fishClone = fish;
		cageClone = cage;
		foodUsed = 0; //calculate it using the assignment 1 stuff?????
	}
	
	private void setInitMonth(String name, Cage cage){
		cage.setStartMonth(name);
		daMonth = cage.getStartMonth();
	}
	
	public Fish getFishSnapshot(){
		return fishClone.clone();
	}
	
	public Cage getCageSnapshot(){
		return cageClone.clone();
	}
	
	public double getFoodAmount(){
		return foodUsed;
	}
	
	public String getMonthName(){
		return daMonth.getName();
	}
	
	public String toString(){
		//if (foodUsed == 0) //Print differently if it's the Starting month
			//return "-" + String.format("%" + 5 + "s", "-"); 
		return String.format("%-9s", daMonth.getName()) 
				+ String.format("%6.1f", daMonth.getTemperature()) 
				+ String.format("%9d", cageClone.getNumFish())
				+ String.format("%7.0f", fishClone.getWeight())
				+ String.format("%8.0f", foodUsed);
	}
	
}//end class
