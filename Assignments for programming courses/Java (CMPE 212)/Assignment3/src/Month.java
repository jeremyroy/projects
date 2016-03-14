
public class Month {
	private String name;
	private double temp;
	
	public Month(String monthName, double waterTemperature){
		setMonthName(monthName.toLowerCase());
		setWaterTemp(waterTemperature);
	}//end constructor
	
	private void setMonthName(String monthName){
		name = monthName;
	}//end setMonthName()
	
	private void setWaterTemp(double waterTemp){
		temp = waterTemp;
	}//end setWaterTemp()
	
	public String getName(){
		return name.substring(0,1).toUpperCase() + name.substring(1);
	}//end getName()
	
	public int getNumDays(){
		if (name.equals("january") || name.equals("march")
				|| name.equals("may") || name.equals("july") || name.equals("august")
				|| name.equals("october") || name.equals("december"))
				return 31;
		else if (name.equals("april") || name.equals("june")
				|| name.equals("september") || name.equals("november"))
				return 30;
		else
			return 28;
	}//end getNumDays()
	
	public double getTemperature(){
		return temp;
	}//end getTemperature()
	
	@Override
	public Month clone(){
		return new Month(name, temp);
	}//end clone()
		
}//end class
