#ifndef TECHNI_H
#define TECHNI_H

#include <QPen>
#include <QPainter>
#include <QMouseEvent>
#include <QEvent>
#include <QDialog>
#include <QColor>
#include <QColorDialog>
#include <QGraphicsScene>
#include <QGraphicsTextItem>
#include <QFontDialog>
#include "canvas.h"

namespace Ui {
class Techni;
}

class Techni : public QDialog
{
    Q_OBJECT

public:
    explicit Techni(QWidget *parent = 0);
    ~Techni();

    void uncheckTools();
    void uncheckShapes();
    void uncheckOthers(QString);
    void setButtonColours();
    void setSchemeColours();
    void initColor();
    void connectButtons();
    void setShortcuts();
    void initTooltips();
	
    Canvas *myCanvas;

protected:

private:
    Ui::Techni *ui;

private slots:
    void slotArcButton();
    void slotBrushButton();
    void slotBrushThickness();
    void slotSelectButton();
    void slotEllipseButton();
    void slotEyeDropperButton();
    void slotEraserButton();
    void slotLineButton();
    void slotPencilButton();
    void slotRectangleButton();
   // void slotSelectColor();
    void slotTextButton();
    void slotColourSelectorButton();
    void slotHandleButton1();
    void slotHandleButton2();
    void slotHandleButton3();
    void slotHandleButton4();
    void slotHandleButton5();
    void slotHandleButton6();
    void slotHandleButton7();
    void slotHandleButton8();
    void slotHandleScheme11();
    void slotHandleScheme12();
    void slotHandleScheme13();
    void slotHandleScheme14();
    void slotHandleScheme21();
    void slotHandleScheme22();
    void slotHandleScheme23();
    void slotHandleScheme24();
    void on_pushButton_clicked();
    void on_pushButton_2_clicked();
    void slotDeleteItem();
    void slotColorSampled();
    void slotSaveCanvas();
    void slotOpenImage();
    void slotLayerUp();
    void slotLayerDown();
};

#endif // TECHNI_H
