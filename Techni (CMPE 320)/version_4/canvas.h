#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QGraphicsView>

//declare enums - add more options as they become available
enum MyShape {LINE, ARC, RECTANGLE, ELLIPSE};
enum Tool {SELECT, FREEHAND, SHAPE, EYEDROPPER, ERASER, TEXT};
enum BrushType {PENCIL, BRUSH};

namespace Ui {
class Canvas;
}

class Canvas : public QGraphicsView
{
    Q_OBJECT
public:
    explicit Canvas(QWidget *parent = 0);
    //Mutators
    void setBrushType(BrushType);
    void setBrushThickness(int);
    void setColor(QColor);
    void setTool(Tool);
    void setShape(MyShape);
    void setLayerMode(bool);
    //Accessors
    BrushType getBrushType();
    int getBrushThickness();
    QColor getColor();
    Tool getTool();
    MyShape getShape();
    bool getLayerMode();
    std::vector<QGraphicsItemGroup*> getLayers();
    QGraphicsScene* getScene();
    // layers
    void initalizeLayer();
    void addToItemBuffer(QGraphicsItem*);
    bool finishLayer();
    // adding graphics to scene
    QGraphicsItem *addItemToScene(int, int, int, int, QPen, QBrush);
    void addTextToScene(QGraphicsTextItem*);
    void changeSelectedItemColorAndThickness(); // Store cursor positions and variables for drawing items
    // Store cursor positions and variables for drawing items
    void changeZValues(int, int);
signals:
    void selectButton();
    void colorSampled();
public slots:
    void mousePressEvent(QMouseEvent * e);
    void mouseReleaseEvent(QMouseEvent * e);
    void mouseDoubleClickEvent(QMouseEvent * e);
    void mouseMoveEvent(QMouseEvent * e);
private:
    //Functions linked with drawing
    QGraphicsScene * scene;
    int x_init, y_init, x_end, y_end, width, height;

    BrushType currentBrush;
    int currentThickness; //brush/line/shape thickness
    QColor currentColor; //Change to hex colour in future
    int zoom; //percentage of zoom
    int selectedLayer; //number of layer
    MyShape currentShape; //Stores what shape is selected
    Tool currentTool; //stores tool selected by user
    bool mousePressed; //keeps track if mouse if pressed

    std::vector<QGraphicsItemGroup*> layers; // storing user layers
    bool layerMode = false; // Is a layer currently being made?
    QList<QGraphicsItem*> itemsBuffer; // storing buffer objects
    QList<QGraphicsItem*> freehandBuffer; // storing points for freehand drawing
};

#endif // MAINWINDOW_H

