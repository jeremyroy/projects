#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QPointF>
#include <QGraphicsView>
#include <QMouseEvent>
#include <QGraphicsRectItem>

QGraphicsItem *ellipse; //temporary item used during sizing animation of original drawing.

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
    scene->removeItem(ellipse); //don't keep previous rectangle when dragging cursor
    QPointF pt = mapToScene(e->pos());

    width = pt.x() - x_init;
    height = pt.y() - y_init;

    //now draw the rectangle
    QRectF rect(x_init, y_init, width, height); //ellipse is drawn in rectangular box, so we create a rectangle
    ellipse = scene->addEllipse(rect,
                   QPen(), QBrush(Qt::SolidPattern));
}

void MainWindow::mouseReleaseEvent(QMouseEvent * e)
{
    //Create and draw permanant rectangle
    QRectF permaEllipse = ellipse->boundingRect();
    QGraphicsItem *newItem = scene->addEllipse(permaEllipse,
                                QPen(), QBrush(Qt::SolidPattern));

    //now remove temporary rectangle
    scene->removeItem(ellipse);
}

