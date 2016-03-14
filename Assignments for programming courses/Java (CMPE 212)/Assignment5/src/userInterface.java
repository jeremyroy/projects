import java.awt.*;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.awt.event.MouseMotionListener;
import java.awt.image.BufferedImage;

import javax.swing.*;
import javax.swing.event.ChangeEvent;
import javax.swing.event.ChangeListener;

public class userInterface extends JFrame{
	
	private final double xMaxOrig = 2.26;
	private final double yMaxOrig = 2.26;
	private final double xMinOrig = -2.24;
	private final double yMinOrig = -2.26;
	
	private double xMax = xMaxOrig;
	private double yMax = yMaxOrig;
	private double xMin = xMinOrig;
	private double yMin = yMinOrig;
	public static final int MAX_ITERATIONS = 32;
	public static final double ESCAPE_MODULUS = 2.0;
	
	JSlider zoom;
	JSpinner zoomPrecise;
	JPanel drawingZone;
	
	public static void main(String[] args){
		userInterface window = new userInterface();
		window.setVisible(true);
	}//end main
	
	public userInterface(){
		super();
		
		setSize(700,667);
		setResizable(false);
		setTitle("Jeremy's Mandelbrot Plot");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setLocation(200,200);
		Font f = new Font("Calibri", Font.PLAIN, 24);
		setLayout(new BorderLayout());
		
		JPanel sidePanel = new JPanel(new BorderLayout());
		//Box sidePanel = Box.createVerticalBox();
		JLabel zoomLabel = new JLabel("Zoom:");
		zoomLabel.setFont(new Font("Arial", Font.BOLD, 14));
		
		zoom = new JSlider(JSlider.VERTICAL, 0, 10000, 1);
		zoom.setMajorTickSpacing(1000);
		zoom.setMinorTickSpacing(100);
		zoom.setPaintLabels(true);
		zoom.setPaintTicks(true);
		zoom.setToolTipText("0");
		zoom.setFont(new Font("Arial", Font.PLAIN, 12));
		zoom.addChangeListener(new ZoomListener());
		
		SpinnerModel zoomModel = new SpinnerNumberModel(1, 1, 10000, 1);
		zoomPrecise = new JSpinner(zoomModel);
		zoomPrecise.addChangeListener(new ZoomSpinner());
		
		JButton exitButton = new JButton("Exit");
		exitButton.addActionListener(even -> System.exit(0));
		
		Box buttonBox = Box.createVerticalBox();
		buttonBox.add(zoomPrecise);
		buttonBox.createVerticalGlue();
		buttonBox.add(exitButton);
		
		JButton draw = new JButton("Draw");
		draw.addActionListener(event -> drawingZone.setBackground(Color.RED));
		
		sidePanel.add(zoomLabel, BorderLayout.NORTH);
		sidePanel.add(zoom, BorderLayout.CENTER);
		sidePanel.add(buttonBox, BorderLayout.SOUTH);
		
		drawingZone = new DrawPlot();
		drawingZone.addMouseListener( new clickForCenter());
		
		add(sidePanel, BorderLayout.EAST);
		add(drawingZone, BorderLayout.CENTER);
	}//end userInterface()
	
	private class DrawPlot extends JPanel{
		public DrawPlot(){
			super();
		}//end DrawPlot()
		
		public void paint (Graphics g){
			super.paint(g);
			drawMandelbrot(g);
		}//end paint()
	}//end DrawPlot class
	
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
        System.out.println("height: " + height + "\nwidth: " + width);
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
                if (escaped) 
                    desiredColour = setEscapeColour(iterations);
                else
                    desiredColour = setColour(modulus);
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
	
    private void adjustZoom(int magnifier){
		double xMagMax, xMagMin, yMagMax, yMagMin;
		double xCenter, yCenter;
		//adjust horizontal zoom
		xCenter = (xMax + xMin) / 2;
		xMagMax = 2.26 / magnifier;
		xMagMin = -2.26 / magnifier;
		xMax = xCenter + xMagMax;
		xMin = xCenter + xMagMin;
		//adjust vertical zoom
		yCenter = (yMax + yMin) / 2;
		yMagMax = 2.26 / magnifier;
		yMagMin = -2.26 / magnifier;
		yMax = yCenter + yMagMax;
		yMin = yCenter + yMagMin;
		drawingZone.repaint();
    }//end adjustZoom()
    
	private class ZoomListener implements ChangeListener{
		public void stateChanged(ChangeEvent e){
			int magnifier = zoom.getValue();
			if(magnifier <= 0){
				zoom.setValue(1);
				magnifier = 1;
			}//end if
			zoomPrecise.setValue(magnifier);
			adjustZoom(magnifier);
		}//end stateChanged
	}//end ZoomListener class
	
	private class ZoomSpinner implements ChangeListener{
		@Override
		public void stateChanged(ChangeEvent e) {
			int magnifier = (int)(zoomPrecise.getValue());
			zoom.setValue(magnifier);
			adjustZoom(magnifier);
		}//end stateChanged()
	}//end ZoomSpinner class
	
	private class clickForCenter implements MouseListener, MouseMotionListener{

		@Override
		public void mouseClicked(MouseEvent e) {
			double xpos = e.getX();
			double ypos = e.getY();
			int xsize = drawingZone.getWidth();
			int ysize = drawingZone.getHeight();
			double xFraction, yFraction;
			double xMag, yMag;
			double xNewMidOffset, yNewMidOffset;
			double xNewMid, yNewMid;
			
			xFraction = xpos / xsize;
			yFraction = 1 - ypos / ysize;
			xMag = xMax - xMin;
			yMag = yMax - yMin;
			
			xNewMidOffset = xMag - xMag * xFraction;
			xNewMid = xMax - xNewMidOffset;
			xMax = xNewMid + (xMag / 2);
			xMin = xNewMid - (xMag / 2);
			
			yNewMidOffset = yMag - yMag * yFraction;
			yNewMid = yMax - yNewMidOffset;
			yMax = yNewMid + (yMag / 2);
			yMin = yNewMid - (yMag / 2);
			
			/*if (xFraction < 0.5)
				xNewMid = xCurrMid - (xFraction * xMag);
			else
				xNewMid = xMag - (xFraction * xMag);
			xMax = xNewMid + (xMag / 2);
			xMin = xNewMid - (xMag / 2);
			if (yFraction < 0.5)
				yNewMid = yCurrMid + yFraction * yMag;
			else
				yNewMid = (yFraction * yMag);
			yMax = yNewMid + (yMag / 2);
			yMin = yNewMid - (yMag / 2);*/
			/*yMax = yCurrMid - (yFraction * yMag);
			yMin = yMax + yMag;*/ 
			drawingZone.repaint();
			System.out.println("xClick: " + xFraction + "\nyClick: " + yFraction);
		} 

		@Override
		public void mouseEntered(MouseEvent e) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void mouseExited(MouseEvent e) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void mousePressed(MouseEvent e) {
			setCursor (Cursor.getPredefinedCursor(Cursor.MOVE_CURSOR));
		}

		@Override
		public void mouseReleased(MouseEvent e) {
			setCursor (Cursor.getPredefinedCursor(Cursor.DEFAULT_CURSOR));
		}

		@Override
		public void mouseDragged(MouseEvent e) {
			// TODO Auto-generated method stub
		}
		
		@Override
		public void mouseMoved(MouseEvent arg0) {
			// TODO Auto-generated method stub
			
		}
		
	}
}//end class
