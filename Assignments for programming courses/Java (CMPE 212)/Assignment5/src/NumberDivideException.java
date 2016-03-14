
@SuppressWarnings("serial")
public class NumberDivideException extends Exception {

    public NumberDivideException() {
        super("Illegal complex number operation!");
    }

    public NumberDivideException(String s) {
        super(s);
    }
} // end NumberDivideException