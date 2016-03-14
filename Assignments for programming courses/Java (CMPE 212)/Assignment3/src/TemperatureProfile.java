import java.util.StringTokenizer;

/**
 * This class is designed to build and hold a cage's temperature/time profile in an
 * array of {@link Month} objects.  The profile is loaded from a text file whose name is
 * supplied to the constructor.
 * @author Alan McLeod
 * @version 1.0
 */
public class TemperatureProfile {

	private Month[] tempProfile;

	/**
	 * Loads a temperature time profile from the supplied filename.  The profile
	 * consists of an array of {@link Month} objects each of which contains the name
	 * of the month and the temperature, assumed to be constant for that month.
	 * @param filename A comma delimited text file with one line per month where
	 * the name of the month comes first followed by the temperature in degrees
	 * Centigrate assumed to be constant for that month. The file should contain all
	 * 12 months even if they might not be needed for the model.
	 * @throws FeedModelException If the file cannot be opened or is empty or is not
	 * in the assumed format.
	 */
	public TemperatureProfile(String filename) throws FeedModelException {
		String[] contents = IOHelper.readText(filename);
		String monthName;
		double temperature;
		int lineCount = 0;
		if (contents == null || contents.length == 0)
			throw new FeedModelException("Temperature profile not available!");
		tempProfile = new Month[contents.length];
		for (String line : contents) {
			StringTokenizer tokens = new StringTokenizer(line, ",\n");
			monthName = tokens.nextToken();
			try {
				temperature = Double.parseDouble(tokens.nextToken());
			} catch (NumberFormatException e) {
				throw new FeedModelException("Profile data not in correct format!");
			}
			tempProfile[lineCount++] = new Month(monthName, temperature);
		}
	}
	
	/**
	 * An accessor for the array of {@link Month} objects that represent a
	 * temperature/time profile. The array is returned as a deep copy of the
	 * stored array, so nothing remains aliased.
	 * @return An array of {@link Month} objects representing the temperature
	 * time profile loaded from the supplied file.
	 */
	public Month[] getTemperatureProfile() {
		Month[] cloneProfile = new Month[tempProfile.length];
		for (int i = 0; i < tempProfile.length; i++)
			cloneProfile[i] = tempProfile[i].clone();
		return cloneProfile;
	}
	
} // end TemperatureProfile class