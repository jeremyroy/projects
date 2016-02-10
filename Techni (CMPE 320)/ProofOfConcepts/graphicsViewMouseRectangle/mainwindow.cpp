#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QPointF>
#include <QGraphicsView>
#include <QMouseEvent>
#include <QGraphicsRectItem>

QGraphicsItem *rectangle; //temporary item used during sizing animation of original drawing.

MainWindow::MainWindow(QWidget *parent) :
    QGraphicsView(parent)
{
    scene = new QGraphicsScene();
    this->setSceneRect(50, 50, 350, 350);
    this->setScene(scene);
}

void MainWindow::mousePressEvent(QMouseEvent * e)
{
    QPointF pt = mapToScene(e->pos());
    x_init = pt.x();
    y_init = pt.y();
}


void swapNums(int& num1, int& num2){
    int temp = num1;
    num1 = num2;
    num2 = temp;
}

void MainWindow::mouseMoveEvent(QMouseEvent * e)
{
    int x_1; //x_1 holds leftmost position
    int y_1; //y_1 holds upmost position
    scene->removeItem(rectangle); //don't keep previous rectangle when dragging cursor
    QPointF pt = mapToScene(e->pos());

    // The scene->addRect function is kinda messed up.  Pretty much it doesn't draw
    // a rectangle that has negative width (while addEllipse does...)
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
    rectangle = scene->addRect(rect,
                   QPen(), QBrush(Qt::SolidPattern));
}

void MainWindow::mouseReleaseEvent(QMouseEvent * e)
{
    //Create and draw permanant rectangle
    QRectF permaRect = rectangle->boundingRect();
    QGraphicsItem *newItem = scene->addRect(permaRect,
                                QPen(), QBrush(Qt::SolidPattern));

    //now remove temporary rectangle
    scene->removeItem(rectangle);
}

