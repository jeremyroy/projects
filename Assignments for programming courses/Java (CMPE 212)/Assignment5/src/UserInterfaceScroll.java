import java.awt.*;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.awt.image.BufferedImage;

import javax.swing.*;
import javax.swing.event.ChangeEvent;
import javax.swing.event.ChangeListener;

public class UserInterfaceScroll extends JFrame{
	
	
	private double xMax = 2.26;
	private double yMax = 2.26;
	private double xMin = -2.24;
	private double yMin = -2.26;
	public static final int MAX_ITERATIONS = 32;
	public static final double ESCAPE_MODULUS = 2.0;
	
	JSlider zoom;
	JPanel drawingZone;
	
	public static void main(String[] args){
		UserInterfaceScroll window = new UserInterfaceScroll();
		window.setVisible(true);
	}//end main
	
	public UserInterfaceScroll(){
		super();
		
		setSize(700,500);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setLocation(200,200);
		Font f = new Font("Calibri", Font.PLAIN, 24);
		setLayout(new BorderLayout());
		
		JPanel sidePanel = new JPanel(new BorderLayout());
		//Box sidePanel = Box.createVerticalBox();
		JLabel zoomLabel = new JLabel("Zoom:");
		zoomLabel.setFont(new Font("Arial", Font.BOLD, 14));
		
		zoom = new JSlider(JSlider.VERTICAL, 0, 50, 1);
		zoom.setMajorTickSpacing(5);
		zoom.setMinorTickSpacing(1);
		zoom.setPaintLabels(true);
		zoom.setPaintTicks(true);
		zoom.setToolTipText("0");
		zoom.setFont(new Font("Arial", Font.PLAIN, 12));
		zoom.addChangeListener(new ZoomListener());
		
		JButton draw = new JButton("Draw");
		draw.addActionListener(event -> drawingZone.setBackground(Color.RED));
		
		sidePanel.add(zoomLabel, BorderLayout.NORTH);
		sidePanel.add(zoom, BorderLayout.CENTER);
		//sidePanel.add(draw, BorderLayout.SOUTH);
		add(sidePanel, BorderLayout.EAST);
		
		drawingZone = new DrawPlot();
		
		//JPanel bottomPanel = new JPanel(new FlowLayout(FlowLayout.RIGHT));
		JButton exitButton = new JButton("Exit");
		exitButton.addActionListener(even -> System.exit(0));
		sidePanel.add(exitButton, BorderLayout.SOUTH);
		//bottomPanel.add(exitButton);
		
		//add(bottomPanel, BorderLayout.SOUTH);
		add(drawingZone, BorderLayout.CENTER);
	}//end userInterface()
	
	private class DrawPlot extends JPanel{
		public DrawPlot(){
			super();
		}
		
		public void paint (Graphics g){
			super.paint(g);
			drawMandelbrot(g);
			/*g.clearRect(0, 0, 400, 400);
			g.setColor(Color.RED);
			g.fillRect(20, 20, 260, 260);*/
		}
	}
	
	private void drawMandelbrot(Graphics g) {
        int row, col;
        double xPos, yPos;
        ComplexNumber c, z;
        double modulus = 0;
        boolean escaped = false;
        int iterations = 0;
        int desiredColour;
        // Calculate the scale factor to go from pixels to actual units
        int height = drawingZone.getHeight();   // drawingZone is the JPanel drawing area
        int width = drawingZone.getWidth();
        System.out.println("height: " + drawingZone.getHeight());
        double xScale = (xMax - xMin) / width;  // These are min and max values in actual
        double yScale = (yMax - yMin) / height; // coordinates.
        
        Graphics2D g2D = (Graphics2D)g;
        
        BufferedImage pretty = new BufferedImage(width, height, 
					BufferedImage.TYPE_3BYTE_BGR);
        
        // Iterate through the entire panel, pixel by pixel
        for (row = 0; row < height; row++) {
            // Calculate the actual y position
            yPos = yMax - row * yScale;
            for (col = 0; col < width; col++) {
                // Calculate the actual x position
                xPos = xMin + col * xScale;
                // Create the complex number for this position
                c = new ComplexNumber(xPos, yPos);
                z = new ComplexNumber(0, 0);
                iterations = 0;
                // Iterate the fractal equation z = z*z + c
                // until z either escapes or the maximum number of iterations
                // is reached
                do {
                    z = (z.multiply(z)).add(c);
                    modulus = z.abs();
                    escaped = modulus > ESCAPE_MODULUS;
                    iterations++;
                } while (iterations < MAX_ITERATIONS && !escaped);
                // Set the colour according to what stopped the above loop
                if (escaped) {
                    desiredColour = setEscapeColour(iterations);
                } else {
                    desiredColour = setColour(modulus);
                }
                pretty.setRGB(col, row, desiredColour);
                
            } // end for
        } // end for
        g2D.drawImage(pretty, null, 0, 0);
    
    } // end drawMandelbrot
	
	 // Sets gray level for escape situation
    private static int setEscapeColour(int numIterations) {
        float grayLevel = 1.0F - (float) numIterations / MAX_ITERATIONS;
        grayLevel = Math.max(grayLevel, 0.1F);
        return new Color(grayLevel, grayLevel, grayLevel).getRGB();
    } // end setEscapeColour

    // Sets colour level for interior situation
    // The algorithm used here is *totally* empirical!
    private static int setColour(double modulus) {
        float factor = (float) (modulus / ESCAPE_MODULUS);
        float incr = (float) Math.log10(factor * 3.5);
        float b = Math.min(Math.abs(0.5F * factor + incr), 1.0F);
        float r = Math.min(Math.abs(8.0F * incr) * factor, 1.0F);
        float g = Math.min(Math.abs(6.0F * incr) * factor, 1.0F);
        return new Color(r, g, b).getRGB();
    } // end setColour
	
	private class ZoomListener implements ChangeListener{
		public void stateChanged(ChangeEvent e){
			int magnifier = zoom.getValue();
			if(magnifier <= 0)
				zoom.setValue(1);
			setTitle("" + zoom.getValue());
			xMax = 2.26 / magnifier;
			yMax = 2.26 / magnifier;
			xMin = -2.24 / magnifier;
			yMin = -2.26 / magnifier;
			drawingZone.repaint();
		}//end stateChanged
	}//end ZoomListener class

}//end class