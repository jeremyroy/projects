
public class Cage {
	
	private int numFishStart;
	private int numFish;
	private int startMonthIndex;
	private Month[] tempProfile;
	private int currentMonthIndex;
	
	public Cage(int startNumFish, Month[] temperatureProfile){
		setStartNumFish(startNumFish);
		setNumFish(startNumFish);
		setTempProfile(temperatureProfile);
		setCurrentMonthIndex(0);
	}//end Cage() constructor
	
	@Override
	public Cage clone(){
		Cage cloned = new Cage(numFishStart, tempProfile);
		cloned.setNumFish(numFish);
		return cloned;
	}//end clone()
	
	private void setStartNumFish(int startNumFish){
		numFishStart = startNumFish;
	}
	
	private void setNumFish(int currNumFish){
		numFish = currNumFish;
	}//end setNumFish
	
	private void setTempProfile(Month[] temperatureProfile){
		tempProfile = temperatureProfile;
	}
	
	private void setCurrentMonthIndex(int month){
		currentMonthIndex = month;
	}//end setCurrentMontIndex
	
	public void setStartMonth(String monthName){
		for (int i = 0; i < tempProfile.length; i++){
			if (tempProfile[i].getName().toLowerCase().equals(monthName.toLowerCase())){
				startMonthIndex = i;
				currentMonthIndex = i;//Set this here because don't know start month beforehand...
				return;
			}
			else
				startMonthIndex = 20; //shouldn't get here because prof said he did error checking in main()
		}//end for
	}//end setStartMonth()
	
	public Month getCurrentMonth(){
		return tempProfile[currentMonthIndex];
	}//end clone()
	
	public Month getStartMonth(){
		return tempProfile[startMonthIndex];
	}
	
	public int getNumFishStart(){
		return numFishStart;
	}//end getNumFishStart()
	
	public int getNumFish(){
		return numFish;
	}//end getNumFish()
	
	public Month nextMonth(){
		currentMonthIndex++;
		if (currentMonthIndex >= tempProfile.length){
			currentMonthIndex = 0;
		}//end if
		return tempProfile[currentMonthIndex];
	}//end nextMonth()
	
	public void reduceNumFish(int numDays){
		numFish -= (int) (numFish * 0.00022 * numDays);
	}//end reduceNumFish()
	
	
}//end class
