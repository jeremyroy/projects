#include "canvas.h"
#include "ui_techni.h"
#include <QColor>
#include <QGraphicsItem>
#include <QGraphicsItemGroup>
#include <QDebug>
#include <QListWidgetItem>
#include <QPointF>
#include <QGraphicsView>
#include <QMouseEvent>
#include <QGraphicsRectItem>

QGraphicsItem *ellipse; //temporary item used during sizing animation of original drawing.

Canvas::Canvas(QWidget *parent) :
    QGraphicsView(parent)
{
    scene = new QGraphicsScene();
    this->setGeometry(160, 10, 871, 771);
    this->setSceneRect(160, 10, 871, 771);
    this->setScene(scene);
}

/*start Mutator - Accessor pairs*/
	//Brush Type
	void Canvas::setBrushType(BrushType selectedBrush){currentBrush = selectedBrush;}
    BrushType Canvas::getBrushType(){return currentBrush;}

	//Brush Thickness
	void Canvas::setBrushThickness(int thickness){currentThickness = thickness;}
    int Canvas::getBrushThickness(){return currentThickness;}
		
	//Colour
    void Canvas::setColor(QColor selectedColor){currentColor = selectedColor;}
    QColor Canvas::getColor(){return currentColor;}
	
	//Painting Tool
    void Canvas::setTool(Tool selectedTool){currentTool = selectedTool;}
    Tool Canvas::getTool(){return currentTool;}

	//Drawing Shape
    void Canvas::setShape(MyShape selectedShape){currentShape = selectedShape;}
    MyShape Canvas::getShape(){return currentShape;}

    // layer mode
    void Canvas::setLayerMode(bool state) { layerMode = state; }
    bool Canvas::getLayerMode() { return layerMode; }
/*end Mutator - Accessor pairs*/
	
// setting scene
void Canvas::setScene(QGraphicsScene *newScene) {
	scene = newScene;
}

// get current layers
std::vector<QGraphicsItemGroup*> Canvas::getLayers() { return layers; }

// create a layer
void Canvas::initalizeLayer() {
	// new layer group
	QGraphicsItemGroup *group;
	// push group on to layers
	layers.push_back(group);
	// remove all objects on the buffer
	itemsBuffer.clear();
}

// finish a layer
bool Canvas::finishLayer() {
	// if no items in buffer
	if (!itemsBuffer.size())
		return false;
	// there are items in buffer
	QGraphicsItemGroup *group = layers.back();
	group = scene->createItemGroup(itemsBuffer);
	// set group attributes
	group->setFlag(QGraphicsItemGroup::ItemIsSelectable, true);
	group->setFlag(QGraphicsItemGroup::ItemIsMovable, true);
	return true;
}

// add object to a buffer that will be added
void Canvas::addToItemBuffer(QGraphicsItem *item) { itemsBuffer.append(item); }

// add item to scene
QGraphicsItem* Canvas::addItemToScene(int w, int x, int y, int z, QPen pen, QBrush brush) {
    return scene->addRect(w, x, y, z, pen, brush);
}

// add text to scene
void Canvas::addTextToScene(QGraphicsTextItem *item) {
    return scene->addItem(item);
}

/*void Canvas::drawToCanvas(int init_x, int init_y, int x, int y){
    //Create the item when the user originally presses
    //if (initItem){
        if (currentTool == SHAPE && currentShape == ELLIPSE){
            QGraphicsItem *ellipse;
            if (initItem){
                ellipse = scene->addEllipse(init_x, init_y, 10, 10, QPen(currentColor), QBrush(currentColor));
                ellipse->setFlag(QGraphicsItem::ItemIsMovable);
                ellipse->setFlag(QGraphicsItem::ItemIsSelectable);
                // if in layer mode
                if (layerMode) {
                    // add to buffer
                    itemsBuffer.append(ellipse);
                }
            }
        }
        if (currentTool == SHAPE && currentShape == RECTANGLE){
            // new rectangle
            QGraphicsItem *rectangle = scene->addRect(init_x, init_y, 80, 100, QPen(currentColor), QBrush(currentColor));
            // set item attributes
            rectangle->setFlag(QGraphicsItem::ItemIsMovable);
            rectangle->setFlag(QGraphicsItem::ItemIsSelectable);
            // if in layer mode
            if (layerMode) {
                // add to buffer
                itemsBuffer.append(rectangle);
            }
        }
        if (currentTool == SHAPE && currentShape == LINE){
            // new rectangle
            QGraphicsItem *line = scene->addLine(init_x, init_y, 80, 100, QPen(currentColor));
            // set item attributes
            line->setFlag(QGraphicsItem::ItemIsMovable);
            line->setFlag(QGraphicsItem::ItemIsSelectable);
            // if in layer mode
            if (layerMode) {
                // add to buffer
                itemsBuffer.append(line);
            }
        }
    //}
    //else{ //resize the item to the position of the user's cursor until the user 'unclicks'

    //}
}*/

/*Start mouse event handler arguments*/
void Canvas::mousePressEvent(QMouseEvent * e)
    {
        QPointF pt = mapToScene(e->pos());
        x_init = pt.x();
        y_init = pt.y();
    }

    void Canvas::mouseMoveEvent(QMouseEvent * e)
    {
        scene->removeItem(ellipse); //don't keep previous rectangle when dragging cursor
        QPointF pt = mapToScene(e->pos());

        width = pt.x() - x_init;
        height = pt.y() - y_init;

        //now draw the rectangle
        QRectF rect(x_init, y_init, width, height); //ellipse is drawn in rectangular box, so we create a rectangle
        ellipse = scene->addEllipse(rect,
                       QPen(), QBrush(Qt::SolidPattern));
    }

    void Canvas::mouseReleaseEvent(QMouseEvent * e)
    {
        //Create and draw permanant rectangle
        QRectF permaEllipse = ellipse->boundingRect();
        QGraphicsItem *newItem = scene->addEllipse(permaEllipse,
                                    QPen(), QBrush(Qt::SolidPattern));

        //now remove temporary rectangle
        scene->removeItem(ellipse);
    }
/*End mouse event handler arguments*/
