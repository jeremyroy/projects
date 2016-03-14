/**
 * A general purpose exception object to be used by all classes in the assignment 3
 * project.
 * @author Alan McLeod
 * @version 1.0
 */
@SuppressWarnings("serial")
public class FeedModelException extends Exception {

	public FeedModelException(String message) {
		super(message);
	}
	
} // end FeedModelException class