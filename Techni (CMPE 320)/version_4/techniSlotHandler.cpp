#include "techni.h"
#include "ui_techni.h"
#include "canvas.h"

void Techni::slotArcButton(){
    //set myCanvas attributes
    MyShape newShape = ARC;
    Tool newTool = SHAPE;
    myCanvas->setShape(newShape);
    myCanvas->setTool(newTool);
    uncheckOthers("arcButton");
}

void Techni::slotBrushButton(){
    //set myCanvas attributes
    BrushType newBrush = BRUSH;
    Tool newTool = FREEHAND;
    myCanvas->setBrushType(newBrush);
    myCanvas->setTool(newTool);
    uncheckOthers("brushButton");
}

void Techni::slotBrushThickness(){
    //set myCanvas attributes
    myCanvas->setBrushThickness(ui->setThickness->value());
    myCanvas->changeSelectedItemColorAndThickness(); //also changes thickness...
}

void Techni::slotSelectButton(){
    //set myCanvas attributes
    Tool newTool = SELECT;
    myCanvas->setTool(newTool);
    uncheckOthers("selectButton");
}

void Techni::slotEllipseButton(){
    //set myCanvas attributes
    MyShape newShape = ELLIPSE;
    Tool newTool = SHAPE;
    myCanvas->setShape(newShape);
    myCanvas->setTool(newTool);
    uncheckOthers("ellipseButton");
}

void Techni::slotEraserButton(){
    //set myCanvas attributes
    Tool newTool = ERASER;
    myCanvas->setTool(newTool);
    uncheckOthers("eraserButton");
}

void Techni::slotEyeDropperButton(){
    //set myCanvas attributes
    Tool newTool = EYEDROPPER;
    myCanvas->setTool(newTool);
    uncheckOthers("eyeDropperButton");
}

void Techni::slotLineButton(){
    //set myCanvas attributes
    MyShape newShape = LINE;
    Tool newTool = SHAPE;
    myCanvas->setShape(newShape);
    myCanvas->setTool(newTool);
    uncheckOthers("lineButton");
}

void Techni::slotPencilButton(){
    //set myCanvas attributes
    BrushType newBrush = PENCIL;
    Tool newTool = FREEHAND;
    myCanvas->setBrushType(newBrush);
    myCanvas->setTool(newTool);
    uncheckOthers("pencilButton");
}

void Techni::slotRectangleButton(){
    //set myCanvas attributes
    MyShape newShape = RECTANGLE;
    Tool newTool = SHAPE;
    myCanvas->setShape(newShape);
    myCanvas->setTool(newTool);
    uncheckOthers("rectangleButton");
}

void Techni::slotTextButton(){
    //set myCanvas attributes
    Tool newTool = TEXT;
    myCanvas->setTool(newTool);
    uncheckOthers("textButton");
}

// this function will open the QColorDialog box when the button is pressed
void Techni::slotColourSelectorButton(){
    myCanvas->setColor(QColorDialog::getColor(Qt::white,this));
    // show colour on palette
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, myCanvas->getColor());
    ui->display->setPalette(pal); // set display to colour chosen
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotDeleteItem(){
    QGraphicsScene *scene = myCanvas->getScene();
    for (int i = 0; i < scene->selectedItems().length(); i++)
        scene->removeItem(scene->selectedItems().at(i));
}

//----- HANDLE BUTTONS --------//
void Techni::slotHandleButton1(){
    QColor newColor;
    newColor.setRgb(0,0,0); // black
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotHandleButton2(){
    QColor newColor;
    newColor.setRgb(127,127,127); // grey
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotHandleButton3(){
    QColor newColor;
    newColor.setRgb(255,255,255); // white
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotHandleButton4(){
    QColor newColor;
    newColor.setRgb(255,0,0); // red
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotHandleButton5(){
    QColor newColor;
    newColor.setRgb(255,255,0); // yellow
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotHandleButton6(){
    QColor newColor;
    newColor.setRgb(0,150,0); // green
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotHandleButton7(){
    QColor newColor;
    newColor.setRgb(0,61,255); // blue
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotHandleButton8(){
    QColor newColor;
    newColor.setRgb(145,0,145); // purple
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

//---- COLOUR SCHEMES -------//
// SCHEME 1
void Techni::slotHandleScheme11(){
    QColor newColor;
    newColor.setRgb(86,68,68); // brown
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}
void Techni::slotHandleScheme12(){
    QColor newColor;
    newColor.setRgb(255,136,51); // orange
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}
void Techni::slotHandleScheme13(){
    QColor newColor;
    newColor.setRgb(0,136,136); // teal
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}
void Techni::slotHandleScheme14(){
    QColor newColor;
    newColor.setRgb(17,51,68); // navy
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

// SCHEME 2
void Techni::slotHandleScheme21(){
    QColor newColor;
    newColor.setRgb(238,129,145); // pink
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}
void Techni::slotHandleScheme22(){
    QColor newColor;
    newColor.setRgb(255,232,244); // light pink
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}
void Techni::slotHandleScheme23(){
    QColor newColor;
    newColor.setRgb(176,226,212); // mint green
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}
void Techni::slotHandleScheme24(){
    QColor newColor;
    newColor.setRgb(111,218,236); // light blue
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
    myCanvas->changeSelectedItemColorAndThickness();
}

void Techni::slotColorSampled(){
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, myCanvas->getColor());
    ui->display->setPalette(pal); // set display to colour chosen
}

void Techni::slotSaveCanvas(){
    QString fileName = "myCanvas.png";
    QPixmap pixMap = QPixmap::grabWidget(myCanvas);
    QImage image = pixMap.toImage();
    image.save(fileName);
}

void Techni::slotOpenImage(){
    QImage image("myCanvas.png");
    QPixmap pixMap;
    pixMap.fromImage(image);
    myCanvas->getScene()->addPixmap(pixMap);
}

void Techni::slotLayerUp(){
    // if more than one layer
    if (ui->listWidget->count() > 1) {
        // something selected
        if (ui->listWidget->selectedItems().size()) {
            // get layer indices
            int i = ui->listWidget->currentItem()->text().split(" ")[1].toInt();
            int rowi = ui->listWidget->row(ui->listWidget->currentItem());
            int rowj = rowi - 1;
            // as long as it's not the first layer on the list
            if (rowi > 0) {
                // get previous row
                int j = ui->listWidget->item(rowj)->text().split(" ")[1].toInt();
                // change text
                ui->listWidget->currentItem()->setText("Layer " + QString::number(j));
                ui->listWidget->item(rowj)->setText("Layer " + QString::number(i));
                // change z values
                myCanvas->changeZValues(i - 1, j - 1);
            }
        }
    }
}

void Techni::slotLayerDown(){
    // if more than one layer
    if (ui->listWidget->count() > 1) {
        // something selected
        if (ui->listWidget->selectedItems().size()) {
            // get layer indices
            int i = ui->listWidget->currentItem()->text().split(" ")[1].toInt();
            int rowi = ui->listWidget->row(ui->listWidget->currentItem());
            int rowj = rowi + 1;
            // as long as it's not the first layer on the list
            if (rowi < ui->listWidget->count() - 1) {
                // get next row
                int j = ui->listWidget->item(rowj)->text().split(" ")[1].toInt();
                // change text
                ui->listWidget->currentItem()->setText("Layer " + QString::number(j));
                ui->listWidget->item(rowj)->setText("Layer " + QString::number(i));
                // change z values
                myCanvas->changeZValues(j - 1, i - 1);
            }
        }
    }
}
