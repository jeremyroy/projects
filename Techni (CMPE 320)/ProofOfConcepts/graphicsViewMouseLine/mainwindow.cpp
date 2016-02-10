#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QPointF>
#include <QGraphicsView>
#include <QMouseEvent>
#include <QGraphicsRectItem>

QGraphicsItem *tempLine; //temporary item used during sizing animation of original drawing.

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

void MainWindow::mouseMoveEvent(QMouseEvent * e)
{
    scene->removeItem(tempLine); //don't keep previous rectangle when dragging cursor
    QPointF pt = mapToScene(e->pos());

    x_end = pt.x();
    y_end = pt.y();

    QLineF line(x_init, y_init, x_end, y_end);

    //now draw the rectangle
    tempLine = scene->addLine(line,
                   QPen(Qt::black));
}

void MainWindow::mouseReleaseEvent(QMouseEvent * e)
{
    //Create and draw permanant rectangle
    QLineF permaLine(x_init, y_init, x_end, y_end);
    QGraphicsItem *newItem = scene->addLine(permaLine,
                                QPen(Qt::black));

    //now remove temporary rectangle
    scene->removeItem(tempLine);
}

