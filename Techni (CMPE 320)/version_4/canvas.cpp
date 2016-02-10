#include "canvas.h"
#include "ui_techni.h"
#include <QPointF>
#include <QGraphicsView>
#include <QGraphicsScene>
#include <QGraphicsItem>
#include <QMouseEvent>
#include <QGraphicsRectItem>
#include <QGraphicsTextItem>
#include <QFontDialog>

Canvas::Canvas(QWidget *parent) :
    QGraphicsView(parent)
{
    scene = new QGraphicsScene();
    this->setScene(scene);
    //this->setGeometry(160, 10, 871, 771);
    //this->setSceneRect(0, 0, 871-160, 771-10);
    this->setHorizontalScrollBarPolicy(Qt::ScrollBarAlwaysOff); //turn off horizontal scroll bar
    this->setVerticalScrollBarPolicy(Qt::ScrollBarAlwaysOff); //turn off vertical scroll bar
    this->setSceneRect(this->frameGeometry()); //set geometry of the graphics view
    currentThickness = 1;
    currentTool = SELECT;
}

void Canvas::mousePressEvent(QMouseEvent * e)
{
    QGraphicsView::mousePressEvent(e); //override the parent's fuction
    QPointF pt = mapToScene(e->pos());
    mousePressed = true;
    x_init = pt.x();
    y_init = pt.y();
    x_end = x_init;
    y_end = y_init;
    width = 0;
    height = 0;
    //check for right-click event
    if(e->button() == Qt::RightButton){
        if (scene->focusItem()){ //checks if an item is in focus
            //try to set new font by right clicking textbox:
            if (QGraphicsTextItem* textbox = dynamic_cast<QGraphicsTextItem*>(scene->focusItem())){
                bool ok;
                QFont font = QFontDialog::getFont(&ok);
                if(!ok)
                    return;
                textbox->setFont(font);
            }
        }
    }
    else{
        //place text box
        if (currentTool == TEXT){
            QGraphicsTextItem* textbox = new QGraphicsTextItem("TEXT");
            textbox->setPos(x_init, y_init);
            textbox->setTextInteractionFlags(Qt::TextEditorInteraction); // allows user to edit text box
            textbox->setFlags(QGraphicsItem::ItemIsFocusable | QGraphicsItem::ItemIsMovable | QGraphicsItem::ItemIsSelectable | textbox->flags());
            // set font
            QFont font;
            bool ok;
            font = QFontDialog::getFont(&ok);
            if(!ok) // user has closed font selector
               return;
            textbox->setFont(font); // set font to the user's desired choice
            textbox->setDefaultTextColor(currentColor); // set the font to that colour
            scene->addItem(textbox); // add text editor to the scene
            if (layerMode) {
                itemsBuffer.append(textbox); // add to buffer
            }//end layer check
            emit selectButton(); //Only draw once per button select
        }
        else if (currentTool == ERASER){
            for (int i = 0; i < scene->selectedItems().length(); i++)
                scene->removeItem(scene->selectedItems().at(i));
        }
        else if (currentTool == EYEDROPPER){
            QPixmap pixMap = QPixmap::grabWidget(this);
            QImage image = pixMap.toImage();
            currentColor = QColor(image.pixel(x_init + 385, y_init + 350));
            emit colorSampled();
        }
    }
}//end mousePressEvent

void Canvas::mouseDoubleClickEvent(QMouseEvent * e){
    QGraphicsView::mouseDoubleClickEvent(e); //override the parent's fuction
    if (QGraphicsTextItem* textbox = dynamic_cast<QGraphicsTextItem*>(scene->focusItem())){ //try to set new font by double clicking
        bool ok;
        QFont font = QFontDialog::getFont(&ok);
        if(!ok)
            return;
        textbox->setFont(font);
    }
}

QGraphicsItem *tempItem; //temporary item used during sizing animation of drawing.

void Canvas::mouseMoveEvent(QMouseEvent * e)
{
    QGraphicsView::mouseMoveEvent(e); //override the parent's fuction
    if (mousePressed){
        QPointF pt = mapToScene(e->pos());
        //don't keep previous item when dragging cursor
        if(currentTool==SHAPE)
        	scene->removeItem(tempItem);
        //set up needed variables
        x_end = pt.x(); //stores current/end position of cursor
        y_end = pt.y(); //stores current/end position of cursor
        width = pt.x() - x_init; //stores displacement of cursor
        height = pt.y() - y_init; //stores displacement of cursor
        //Draw selected item
        if (currentTool == SHAPE && currentShape == ELLIPSE){
            //now draw the rectangle
            QRectF rect(x_init, y_init, width, height); //ellipse is drawn in rectangular box, so we create a rectangle
            tempItem = scene->addEllipse(rect, QPen(currentColor), QBrush(currentColor));
        }
        else if (currentTool == SHAPE && currentShape == RECTANGLE){
            // The scene->addRect function is kinda messed up.  Pretty much it doesn't draw
            // a rectangle that has negative width (while addEllipse does...)
            int x_1; //x_1 holds leftmost position
            int y_1; //y_1 holds upmost position
            if (pt.x() < x_init){
                x_1 = pt.x();
                width = abs(pt.x() - x_init);
            }
            else{
                x_1 = x_init;
                width = pt.x() - x_init;
            }
            //Now do the same thing but for y axis
            if (pt.y() < y_init){
                y_1 = pt.y();
                height = abs(pt.y() - y_init);
            }
            else{
                y_1 = y_init;
                height = pt.y() - y_init;
            }
            //now draw the rectangle
            QRect rect(x_1, y_1, width, height);
            tempItem = scene->addRect(rect, QPen(currentColor), QBrush(currentColor));
        }
        else if (currentTool == SHAPE && currentShape == LINE){
            QLineF line(x_init, y_init, x_end, y_end);
            QPen pen(currentColor);
            pen.setWidth(currentThickness);
            tempItem = scene->addLine(line, pen);
        }
        else if (currentTool == SHAPE && currentShape == ARC){
            QPainterPath* path = new QPainterPath();
            path->arcMoveTo(x_init,y_init, width, height,0); // moves arc (so it doesn't start at a specific location)
            path->arcTo(x_init,y_init, width, height, 0, 180); // creates arc
            QPen pen(currentColor);
            pen.setWidth(currentThickness);
            tempItem = scene->addPath(*path, pen); // set path item to path so it can be removed - older versions of arc deleted
        }
        else if (currentTool == FREEHAND && currentBrush == PENCIL){
                QLineF line(x_init, y_init,x_end, y_end);
                QPen pen(currentColor);
                pen.setWidth(currentThickness);
                QGraphicsItem *point = scene->addLine(line, pen);
                freehandBuffer.append(point); //group the points
                x_init = x_end;
                y_init = y_end;
            }
        else if (currentTool == FREEHAND && currentBrush == BRUSH){
                QLineF line(x_init, y_init,x_end, y_end);
                QPen pen(QBrush(currentColor, Qt::Dense3Pattern), currentThickness, Qt::SolidLine, Qt::RoundCap, Qt::RoundJoin); //only difference from PENCIL
                QGraphicsItem *point = scene->addLine(line, pen);
                freehandBuffer.append(point); //group the points
                x_init = x_end;
                y_init = y_end;
        }
    }//end check if mouse pressed
}//end mouse move event

void Canvas::mouseReleaseEvent(QMouseEvent * e)
{
    QGraphicsView::mouseReleaseEvent(e); //override the parent's fuction
    mousePressed = false;
    //remove temporary items
    if(currentTool==SHAPE)
        scene->removeItem(tempItem);
    //now, add new permanant item
    QGraphicsItem *newItem; //this will be the permanant item on the canvas
    if (currentTool == SHAPE && currentShape == ELLIPSE){
        //Create and draw permanant ellipse
        QRectF permaEllipse(x_init, y_init, width, height);
        newItem = scene->addEllipse(permaEllipse, QPen(currentColor), QBrush(currentColor));
        newItem->setFlag(QGraphicsItem::ItemIsMovable);
        newItem->setFlag(QGraphicsItem::ItemIsSelectable);
        if (layerMode) {
            itemsBuffer.append(newItem); // add to buffer
        }//end layer check
        emit selectButton(); //Only draw once per button select
    }
    else if (currentTool == SHAPE && currentShape == RECTANGLE){
        QRectF permaRect(x_init, y_init, width, height);
        newItem = scene->addRect(permaRect, QPen(currentColor), QBrush(currentColor));
        newItem->setFlag(QGraphicsItem::ItemIsMovable);
        newItem->setFlag(QGraphicsItem::ItemIsSelectable);
        if (layerMode) {
            itemsBuffer.append(newItem); // add to buffer
        }//end layer check
        emit selectButton(); //Only draw once per button select
    }
    else if (currentTool == SHAPE && currentShape == LINE){
        QLineF permaLine(x_init, y_init, x_end, y_end);        
        QPen pen(currentColor);
        pen.setWidth(currentThickness);
        newItem = scene->addLine(permaLine, pen);
        newItem->setFlag(QGraphicsItem::ItemIsMovable);
        newItem->setFlag(QGraphicsItem::ItemIsSelectable);
        if (layerMode) {
            itemsBuffer.append(newItem); // add to buffer
        }//end layer check
        emit selectButton(); //Only draw once per button select
    }
    else if (currentTool == SHAPE && currentShape == ARC){
        QPainterPath* newPath = new QPainterPath();
        newPath->arcMoveTo(x_init,y_init, width, height,0);
        newPath->arcTo(x_init,y_init, width, height, 0, 180);
        QPen pen(currentColor);
        pen.setWidth(currentThickness);
        newItem = scene->addPath(*newPath, pen);
        newItem->setFlag(QGraphicsItem::ItemIsMovable);
        newItem->setFlag(QGraphicsItem::ItemIsSelectable);
        if (layerMode) {
            itemsBuffer.append(newItem); // add to buffer
        }//end layer check
        emit selectButton(); //Only draw once per button select
    }
    else if (currentTool == FREEHAND){
        QGraphicsItemGroup *freehandGroup; //group all points for freehand drawing
        freehandGroup = scene->createItemGroup(freehandBuffer);
        freehandGroup->setFlag(QGraphicsItemGroup::ItemIsSelectable, true);
        freehandGroup->setFlag(QGraphicsItemGroup::ItemIsMovable, true);
        freehandBuffer.clear();
        if (layerMode) {
            itemsBuffer.append(freehandGroup); // add to buffer
        }//end layer check
        emit selectButton(); //Only draw once per button select
    }
    //Set new item to movable and selectable

    //ADD SIGNAL FOR "SELECT" BUTTON
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
    bool Canvas::getLayerMode() { return layerMode;}
    //scene
    QGraphicsScene* Canvas::getScene(){return scene;}
/*end Mutator - Accessor pairs*/

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
    layers.back() = scene->createItemGroup(itemsBuffer);
    // set group attributes
    QGraphicsItemGroup *group = layers.back();
    group->setFlag(QGraphicsItemGroup::ItemIsSelectable, true);
    group->setFlag(QGraphicsItemGroup::ItemIsMovable, true);
    group->setZValue(Canvas::getLayers().size());
    return true;
}

void Canvas::changeZValues(int i, int j) {
    // get both layers
    QGraphicsItemGroup *groupOne = layers.at(i);
    QGraphicsItemGroup *groupTwo = layers.at(j);
    // change z values
    int temp = groupTwo->zValue();
    groupTwo->setZValue(groupOne->zValue());
    groupOne->setZValue(temp);
    // change physical layers
    layers.at(i) = groupTwo;
    layers.at(j) = groupOne;
}

// add object to a buffer that will be added
void Canvas::addToItemBuffer(QGraphicsItem *item) { itemsBuffer.append(item); }

// add item to scene
QGraphicsItem* Canvas::addItemToScene(int w, int x, int y, int z, QPen pen, QBrush brush) {
    return scene->addRect(w, x, y, z, pen, brush);
}

void Canvas::changeSelectedItemColorAndThickness(){
    if (scene->selectedItems().length()){//check if item selected
        if (QGraphicsRectItem* currentItem = dynamic_cast<QGraphicsRectItem*>(scene->selectedItems().at(0))){
            currentItem->setBrush(currentColor);
            currentItem->setPen(currentColor);
        }
        if (QGraphicsEllipseItem* currentItem = dynamic_cast<QGraphicsEllipseItem*>(scene->selectedItems().at(0))){
            currentItem->setBrush(currentColor);
            currentItem->setPen(currentColor);
        }
        if (QGraphicsPathItem* currentItem = dynamic_cast<QGraphicsPathItem*>(scene->selectedItems().at(0))){
            QPen pen(currentColor);
            pen.setWidth(currentThickness);
            currentItem->setPen(pen);
        }
        if (QGraphicsLineItem* currentItem = dynamic_cast<QGraphicsLineItem*>(scene->selectedItems().at(0))){
            QPen pen(currentColor);
            pen.setWidth(currentThickness);
            currentItem->setPen(pen);
        }
        if (QGraphicsItemGroup* currentItem = dynamic_cast<QGraphicsItemGroup*>(scene->selectedItems().at(0))){
            QList<QGraphicsItem*> list = currentItem->childItems();  //get list of items in
            for (int i = 0; i < list.length(); i++){
                if (QGraphicsLineItem* pixel = dynamic_cast<QGraphicsLineItem*>(list.at(i))){
                    QPen pen = pixel->pen();
                    pen.setWidth(currentThickness);
                    pen.setBrush(QBrush(currentColor, pen.brush().style()));
                    pixel->setPen(pen);
                }
            }
        }
    }//end check if item selected
}//end changeSelectedItemColor()
