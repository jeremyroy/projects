#include "techni.h"
#include "ui_techni.h"
#include "canvas.h"
#include <stdio.h>
#include <QShortcut>
// ------
// ------
// ------
#include <QDebug>
#include <QListWidgetItem>
// ------
// ------
// ------

Techni::Techni(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::Techni)
{
    ui->setupUi(this);

    myCanvas = ui->myCanvas;

    connectButtons(); //connect all buttons to their respective slots
    initTooltips();
    ui->selectButton->setChecked(true); //"Select" button is selected by default at startup
    setShortcuts(); //Set up shortcuts
    initColor(); //initialize colour to black and set pallet display to black
    //Paint the colour selection buttons with their respective colors
    setButtonColours();
    setSchemeColours();
}
Techni::~Techni()
{
    delete ui;
}

//series of functions that take care of GUI button selection
void Techni::uncheckTools(){
    ui->brushButton->setChecked(false);
    ui->selectButton->setChecked(false);
    ui->eraserButton->setChecked(false);
    ui->eyeDropperbutton->setChecked(false);
    ui->pencilButton->setChecked(false);
    ui->textButton->setChecked(false);
}

void Techni::uncheckShapes(){
    ui->arcButton->setChecked(false);
    ui->ellipseButton->setChecked(false);
    ui->lineButton->setChecked(false);
    ui->rectanglebutton->setChecked(false);
}

void Techni::uncheckOthers(QString identity){
    uncheckTools();
    uncheckShapes();
    if (identity == "arcButton")
        ui->arcButton->setChecked(true);
    else if (identity == "brushButton")
        ui->brushButton->setChecked(true);
    else if (identity == "selectButton")
        ui->selectButton->setChecked(true);
    else if (identity == "ellipseButton")
        ui->ellipseButton->setChecked(true);
    else if (identity == "eraserButton")
        ui->eraserButton->setChecked(true);
    else if (identity == "eyeDropperButton")
        ui->eyeDropperbutton->setChecked(true);
    else if (identity == "lineButton")
        ui->lineButton->setChecked(true);
    else if (identity == "pencilButton")
        ui->pencilButton->setChecked(true);
    else if (identity == "rectangleButton")
        ui->rectanglebutton->setChecked(true);
    else if (identity == "textButton")
        ui->textButton->setChecked(true);
}

//Sets colour to black and shows it on pallet
void Techni::initColor(){
    QColor newColor;
    newColor.setRgb(0,0,0); // black
    myCanvas->setColor(newColor);
    QPalette pal = ui->display->palette();
    pal.setColor(QPalette::Window, newColor);
    ui->display->setPalette(pal);
}

void Techni::setButtonColours(){
    // set button colours - so when button is clicked pen will get the colour
    ui->colour1->setStyleSheet("background-color: rgb(0,0,0)"); // black
    ui->colour2->setStyleSheet("background-color: rgb(127,127,127)"); // grey
    ui->colour3->setStyleSheet("background-color: rgb(255,255,255)"); // white
    ui->colour4->setStyleSheet("background-color: rgb(255,0,0)"); // red
    ui->colour5->setStyleSheet("background-color: rgb(255,255,0)"); // yellow
    ui->colour6->setStyleSheet("background-color: rgb(0,150,0)"); // green
    ui->colour7->setStyleSheet("background-color: rgb(0,61,255)"); // blue
    ui->colour8->setStyleSheet("background-color: rgb(145,0,145)"); // purple
}

void Techni::setSchemeColours(){
    // set scheme colours
    // SCHEME 1
    ui->scheme1_1->setStyleSheet("background-color: rgb(85,68,68)"); // brown
    ui->scheme1_2->setStyleSheet("background-color: rgb(255,136,51)"); // orange
    ui->scheme1_3->setStyleSheet("background-color: rgb(0,136,136)"); // teal
    ui->scheme1_4->setStyleSheet("background-color: rgb(17,51,68)"); // navy

    // SCHEME 2
    ui->scheme2_1->setStyleSheet("background-color: rgb(238,129,145)"); // pink
    ui->scheme2_2->setStyleSheet("background-color: rgb(255,232,244)"); // light pink
    ui->scheme2_3->setStyleSheet("background-color: rgb(176,226,212)"); // mint
    ui->scheme2_4->setStyleSheet("background-color: rgb(111,218,236)"); // light blue
}

//// set layer mode
//myCanvas.setLayerMode(!myCanvas.getLayerMode());

void Techni::on_pushButton_clicked()
{
    // if already in layer mode
    if (myCanvas->getLayerMode()) {
        // set start button
        ui->pushButton->setText("Start");
        // finish creating the new item
        if (myCanvas->finishLayer()) {
            // new list widget item
            ui->listWidget->insertItem(0, "Layer " + QString::number(myCanvas->getLayers().size()));
        }
    } else {
        // set cancel button
        ui->pushButton->setText("Finish");
        // initialize a new layer
        myCanvas->initalizeLayer();
    }

    // set layer mode
    myCanvas->setLayerMode(!myCanvas->getLayerMode());
}

void Techni::on_pushButton_2_clicked()
{
    // only if in layer mode
    if (myCanvas->getLayerMode()) {
        // set layer mode off
        myCanvas->setLayerMode(false);
        // reset start button
        ui->pushButton->setText("Start");
    }
}

void Techni::setShortcuts(){
    //Initialize shortcuts
    //Quit program
    QShortcut *shortcutQuit = new QShortcut(tr("Ctrl+q"), this);
    //Open Color selector
    QShortcut *shortcutColorSelector = new QShortcut(tr("Ctrl+Alt+C"), this);
    //Select colours (general)
    QShortcut *shortcutBlack = new QShortcut(tr("F1"), this); //select black
    QShortcut *shortcutGrey = new QShortcut(tr("F2"), this); //select grey
    QShortcut *shortcutRed = new QShortcut(tr("F3"), this); //select red
    QShortcut *shortcutYellow = new QShortcut(tr("F4"), this); //select yellow
    QShortcut *shortcutWhite = new QShortcut(tr("F5"), this); //select white
    QShortcut *shortcutGreen = new QShortcut(tr("F6"), this); //select green
    QShortcut *shortcutBlue = new QShortcut(tr("F7"), this); //select blue
    QShortcut *shortcutPurple = new QShortcut(tr("F8"), this); //select purple
    //Select colours from Scheme
    QShortcut *shortcutScheme1_1 = new QShortcut(tr("Ctrl+F1"), this);
    QShortcut *shortcutScheme1_2 = new QShortcut(tr("Ctrl+F2"), this);
    QShortcut *shortcutScheme1_3 = new QShortcut(tr("Ctrl+F3"), this);
    QShortcut *shortcutScheme1_4 = new QShortcut(tr("Ctrl+F4"), this);
    QShortcut *shortcutScheme2_1 = new QShortcut(tr("Ctrl+F5"), this);
    QShortcut *shortcutScheme2_2 = new QShortcut(tr("Ctrl+F6"), this);
    QShortcut *shortcutScheme2_3 = new QShortcut(tr("Ctrl+F7"), this);
    QShortcut *shortcutScheme2_4 = new QShortcut(tr("Ctrl+F8"), this);
    //Select tool
    QShortcut *shortcutToolSelect = new QShortcut(tr("Ctrl+1"), this);
    QShortcut *shortcutToolText = new QShortcut(tr("Ctrl+2"), this);
    QShortcut *shortcutToolPencil = new QShortcut(tr("Ctrl+3"), this);
    QShortcut *shortcutToolBrush = new QShortcut(tr("Ctrl+4"), this);
    QShortcut *shortcutToolEraser = new QShortcut(tr("Ctrl+5"), this);
    QShortcut *shortcutToolEyeDropper = new QShortcut(tr("Ctrl+6"), this);
    //Select shape
    QShortcut *shortcutShapeLine = new QShortcut(tr("Alt+1"), this);
    QShortcut *shortcutShapeArc = new QShortcut(tr("Alt+2"), this);
    QShortcut *shortcutShapeRect = new QShortcut(tr("Alt+3"), this);
    QShortcut *shortcutShapeEllipse = new QShortcut(tr("Alt+4"), this);
    //Delete item from Canvas
    QShortcut *shortcutDeleteItem = new QShortcut(Qt::Key_Delete, this);
    //Save Canvas
    QShortcut *shortcutSave = new QShortcut(tr("Ctrl+s"), this);
    //Open Image
    QShortcut *shortcutOpen = new QShortcut(tr("Ctrl+o"), this);

    //Connect shortcuts to slots
    //Quit program
    connect(shortcutQuit, SIGNAL(activated()), SLOT(close()));
    //Open colour selector
    connect(shortcutColorSelector, SIGNAL(activated()), SLOT(slotColourSelectorButton()));
    //Colour selection (general)
    connect(shortcutBlack, SIGNAL(activated()), SLOT(slotHandleButton1()));
    connect(shortcutGrey, SIGNAL(activated()), SLOT(slotHandleButton2()));
    connect(shortcutRed, SIGNAL(activated()), SLOT(slotHandleButton4()));
    connect(shortcutYellow, SIGNAL(activated()), SLOT(slotHandleButton5()));
    connect(shortcutWhite, SIGNAL(activated()), SLOT(slotHandleButton3()));
    connect(shortcutGreen, SIGNAL(activated()), SLOT(slotHandleButton6()));
    connect(shortcutBlue, SIGNAL(activated()), SLOT(slotHandleButton7()));
    connect(shortcutPurple, SIGNAL(activated()), SLOT(slotHandleButton8()));
    //Colour selection from Scheme
    connect(shortcutScheme1_1, SIGNAL(activated()), SLOT(slotHandleScheme11()));
    connect(shortcutScheme1_2, SIGNAL(activated()), SLOT(slotHandleScheme12()));
    connect(shortcutScheme1_3, SIGNAL(activated()), SLOT(slotHandleScheme13()));
    connect(shortcutScheme1_4, SIGNAL(activated()), SLOT(slotHandleScheme14()));
    connect(shortcutScheme2_1, SIGNAL(activated()), SLOT(slotHandleScheme21()));
    connect(shortcutScheme2_2, SIGNAL(activated()), SLOT(slotHandleScheme22()));
    connect(shortcutScheme2_3, SIGNAL(activated()), SLOT(slotHandleScheme23()));
    connect(shortcutScheme2_4, SIGNAL(activated()), SLOT(slotHandleScheme24()));
    //Select tool
    connect(shortcutToolPencil, SIGNAL(activated()), SLOT(slotPencilButton()));
    connect(shortcutToolBrush, SIGNAL(activated()), SLOT(slotBrushButton()));
    connect(shortcutToolSelect, SIGNAL(activated()), SLOT(slotSelectButton()));
    connect(shortcutToolEraser, SIGNAL(activated()), SLOT(slotEraserButton()));
    connect(shortcutToolEyeDropper, SIGNAL(activated()), SLOT(slotEyeDropperButton()));
    connect(shortcutToolText, SIGNAL(activated()), SLOT(slotTextButton()));
    //Select shape
    connect(shortcutShapeLine, SIGNAL(activated()), SLOT(slotLineButton()));
    connect(shortcutShapeArc, SIGNAL(activated()), SLOT(slotArcButton()));
    connect(shortcutShapeRect, SIGNAL(activated()), SLOT(slotRectangleButton()));
    connect(shortcutShapeEllipse, SIGNAL(activated()), SLOT(slotEllipseButton()));
    //Delete item from Canvas
    connect(shortcutDeleteItem, SIGNAL(activated()), SLOT(slotDeleteItem()));
    //Save canvas
    connect(shortcutSave, SIGNAL(activated()), SLOT(slotSaveCanvas()));
    //Open image
    connect(shortcutOpen, SIGNAL(activated()), SLOT(slotOpenImage()));
    //Color sampler
    connect(myCanvas, SIGNAL(colorSampled()), SLOT(slotColorSampled()));
}

void Techni::connectButtons(){
    // Connect button signal to appropriate slot - handlesButton when the button is released
    connect(ui->colour1, SIGNAL (released()), this, SLOT (slotHandleButton1()));
    connect(ui->colour2, SIGNAL (released()), this, SLOT (slotHandleButton2()));
    connect(ui->colour3, SIGNAL (released()), this, SLOT (slotHandleButton3()));
    connect(ui->colour4, SIGNAL (released()), this, SLOT (slotHandleButton4()));
    connect(ui->colour5, SIGNAL (released()), this, SLOT (slotHandleButton5()));
    connect(ui->colour6, SIGNAL (released()), this, SLOT (slotHandleButton6()));
    connect(ui->colour7, SIGNAL (released()), this, SLOT (slotHandleButton7()));
    connect(ui->colour8, SIGNAL (released()), this, SLOT (slotHandleButton8()));

    // handle colour schemes
    connect(ui->scheme1_1, SIGNAL (released()), this, SLOT (slotHandleScheme11()));
    connect(ui->scheme1_2, SIGNAL (released()), this, SLOT (slotHandleScheme12()));
    connect(ui->scheme1_3, SIGNAL (released()), this, SLOT (slotHandleScheme13()));
    connect(ui->scheme1_4, SIGNAL (released()), this, SLOT (slotHandleScheme14()));
    connect(ui->scheme2_1, SIGNAL (released()), this, SLOT (slotHandleScheme21()));
    connect(ui->scheme2_2, SIGNAL (released()), this, SLOT (slotHandleScheme22()));
    connect(ui->scheme2_3, SIGNAL (released()), this, SLOT (slotHandleScheme23()));
    connect(ui->scheme2_4, SIGNAL (released()), this, SLOT (slotHandleScheme24()));

    // set colourSelector button signal to handleColourSelector when button is pressed
    connect(ui->colourSelector, SIGNAL (released()), this, SLOT (slotColourSelectorButton()));

    //Adding signal-slot button handling:
    connect(ui->arcButton, SIGNAL(clicked(bool)), SLOT(slotArcButton()));
    connect(ui->brushButton, SIGNAL(clicked(bool)), SLOT(slotBrushButton()));
    connect(ui->selectButton, SIGNAL(clicked(bool)), SLOT(slotSelectButton()));
    connect(ui->ellipseButton, SIGNAL(clicked(bool)), SLOT(slotEllipseButton()));
    connect(ui->eraserButton, SIGNAL(clicked(bool)), SLOT(slotEraserButton()));
    connect(ui->eyeDropperbutton, SIGNAL(clicked(bool)), SLOT(slotEyeDropperButton()));
    connect(ui->lineButton, SIGNAL(clicked(bool)), SLOT(slotLineButton()));
    connect(ui->pencilButton, SIGNAL(clicked(bool)), SLOT(slotPencilButton()));
    connect(ui->rectanglebutton, SIGNAL(clicked(bool)), SLOT(slotRectangleButton()));
    connect(ui->setThickness, SIGNAL(valueChanged(int)), SLOT(slotBrushThickness()));
    connect(ui->textButton, SIGNAL(clicked(bool)), SLOT(slotTextButton()));

    connect(myCanvas, SIGNAL(selectButton()), SLOT(slotSelectButton()));

    //Layer up, down
    connect(ui->pushButton_3, SIGNAL(clicked(bool)), SLOT(slotLayerUp()));
    connect(ui->pushButton_4, SIGNAL(clicked(bool)), SLOT(slotLayerDown()));
}

void Techni::initTooltips(){
    ui->lineButton->setToolTip("Line (Alt+1)");
    ui->arcButton->setToolTip("ARC (Alt+2)");
    ui->rectanglebutton->setToolTip("Rectangle (Alt+3)");
    ui->ellipseButton->setToolTip("Ellipse (Alt+4)");

    ui->selectButton->setToolTip("Select items (Ctrl+1)");
    ui->textButton->setToolTip("Text (Ctrl+2)");
    ui->pencilButton->setToolTip("Pencil (Ctrl+3)");
    ui->brushButton->setToolTip("Brush (Ctrl+4)");
    ui->eraserButton->setToolTip("Eraser (Ctrl+5)");
    ui->eyeDropperbutton->setToolTip("Eye Dropper (Ctrl+6)");

    ui->colour1->setToolTip("Black (F1)");
    ui->colour2->setToolTip("Grey (F2)");
    ui->colour3->setToolTip("White (F5)");
    ui->colour4->setToolTip("Red (F3)");
    ui->colour5->setToolTip("Yellow (F4)");
    ui->colour6->setToolTip("Green (F6)");
    ui->colour7->setToolTip("Blue (F7)");
    ui->colour8->setToolTip("Purple (F8)");

    ui->scheme1_1->setToolTip("Brown (Ctrl+F1)");
    ui->scheme1_2->setToolTip("Orange (Ctrl+F2)");
    ui->scheme1_3->setToolTip("Teal (Ctrl+F3)");
    ui->scheme1_4->setToolTip("Dark Teal (Ctrl+F4)");
    ui->scheme2_1->setToolTip("Pink (Ctrl+F5)");
    ui->scheme2_2->setToolTip("Light Pink (Ctrl+F6)");
    ui->scheme2_3->setToolTip("Mint Green (Ctrl+F7)");
    ui->scheme2_4->setToolTip("Light Blue (Ctrl+F8)");

    ui->colourSelector->setToolTip("Colour Selector (Ctrl+Alt+C)");
}

