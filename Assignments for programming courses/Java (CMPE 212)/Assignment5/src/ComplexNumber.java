/*
 * A class to be used with the Mandelbrot program for assn 4.
 * by Alan McLeod
 */
public class ComplexNumber {
	
    private double re;
    private double im;

    public ComplexNumber() {
        re = 0;
        im = 0;
    }

    public ComplexNumber(double a) {
        re = a;
        im = 0;
    }

    public ComplexNumber(double a, double b) {
        re = a;
        im = b;
    }

    public double getReal() {
        return re;
    }

    public double getIm() {
        return im;
    }

    public ComplexNumber add(ComplexNumber z) {
        double x, y;
        x = re + z.re;
        y = im + z.im;
        return new ComplexNumber(x, y);
    }

    public ComplexNumber subtract(ComplexNumber z) {
        double x, y;
        x = re - z.re;
        y = im - z.im;
        return new ComplexNumber(x, y);
    }

    public ComplexNumber multiply(ComplexNumber z) {
        double x, y;
        x = re * z.re - im * z.im;
        y = re * z.im + im * z.re;
        return new ComplexNumber(x, y);
    }

    public ComplexNumber divide(ComplexNumber z) throws NumberDivideException {
        double x, y;
        if (z.re == 0 && z.im == 0) {
            throw new NumberDivideException("Attempt to divide by zero!");
        }
        x = (re * z.re + im * z.im) / (z.re * z.re + z.im * z.im);
        y = (z.re * im - z.im * re) / (z.re * z.re + z.im * z.im);
        return new ComplexNumber(x, y);
    }

    public double abs() {
        return Math.sqrt(re * re + im * im);
    }

    public String toString() {
        return re + " + " + im + "i";
    }
} // end ComplexNumber class