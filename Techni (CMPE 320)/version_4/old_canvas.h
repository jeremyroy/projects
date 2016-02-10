#ifndef CANVAS_H
#define CANVAS_H

#include <vector>
#include <QColor>
#include <QGraphicsScene>
#include <QGraphicsItem>
#include <QList>
#include <QListWidgetItem>
#include <QGraphicsTextItem>
#include <QMainWindow>
#include <QGraphicsView>

	//declare enums - add more options as they become available
	enum MyShape {LINE, ARC, RECTANGLE, ELLIPSE};
    enum Tool {FREEHAND, SHAPE, BUCKET, EYEDROPPER, ERASER, TEXT};
    enum BrushType {PENCIL, BRUSH};

class Canvas : public QGraphicsView
{
	Q_OBJECT
public:
    explicit Canvas(QWidget *parent = 0);
    int x_init, y_init, x_end, y_end, width, height;

	//Mutators
    void setBrushType(BrushType);
    void setBrushThickness(int);
    void setColor(QColor);
    void setTool(Tool);
    void setShape(MyShape);
    void setScene(QGraphicsScene*);
    void setLayerMode(bool);
	//Accessors
    BrushType getBrushType();
    int getBrushThickness();
    QColor getColor();
    Tool getTool();
    MyShape getShape();
    bool getLayerMode();
    std::vector<QGraphicsItemGroup*> getLayers();
    void drawToCanvas(int, int, int, int);
    void createAction();
    void createLayer();
    void finishLayer(int);
    void zoomIn(int);
    void zoomOut(int);
    void recorderLayers(int, int);
    // layers
    void initalizeLayer();
    void addToItemBuffer(QGraphicsItem*);
    bool finishLayer();
    // adding graphics to scene
    QGraphicsItem *addItemToScene(int, int, int, int, QPen, QBrush);
    void addTextToScene(QGraphicsTextItem*);
    // Store cursor positions and variables for drawing items

signals:
	
public slots:
    void mousePressEvent(QMouseEvent * e);
    void mouseReleaseEvent(QMouseEvent * e);
    // void mouseDoubleClickEvent(QMouseEvent * e);
    void mouseMoveEvent(QMouseEvent * e);
	
private:
	BrushType currentBrush;
	int currentThickness; //brush/line/shape thickness
    QColor currentColor; //Change to hex colour in future
	int zoom; //percentage of zoom
	int selectedLayer; //number of layer
	MyShape currentShape; //Stores what shape is selected
    Tool currentTool; //stores tool selected by user
 
    
    QGraphicsScene *scene; // scene, placed on the view for drawing
    std::vector<QGraphicsItemGroup*> layers; // storing user layers
    bool layerMode = false; // Is a layer currently being made?
    QList<QGraphicsItem*> itemsBuffer; // storing buffer objects
};

#endif // CANVAS_H
