#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QPointF>
#include <QGraphicsView>
#include <QMouseEvent>
#include <QGraphicsPathItem>

QGraphicsItem *arc;//temporary item used during sizing animation of original drawing.
QGraphicsItem* pathItem; // only way to delete a path from a scene is to use a pathItem

mainWindow::mainWindow(QWidget *parent) :
    QGraphicsView(parent)
{
    scene = new QGraphicsScene();
    this->setSceneRect(-100,-100,300,300);
    this->setScene(scene);

    /*TEST - draw arc
    QPainterPath* path = new QPainterPath();
    path->arcMoveTo(20,20,50,50,20);
    path->arcTo(20,20,50,50,0,180);
    scene->addPath(*path) */
}

void mainWindow::mousePressEvent(QMouseEvent *e)
{
    QPointF pt = mapToScene(e->pos());
    x_init = pt.x();
    y_init = pt.y();
}

void mainWindow::mouseMoveEvent(QMouseEvent *e)
{
    scene->removeItem(pathItem); // don't keep previous arc when dragging cursor
    QPointF pt = mapToScene(e->pos());

    width = pt.x() - x_init;
    height = pt.y() - y_init;

    //now draw the arc
    QPainterPath* path = new QPainterPath();
    path->arcMoveTo(x_init,y_init, width, height,0); // moves arc (so it doesn't start at a specific location)
    path->arcTo(x_init,y_init, width, height, 0, 180); // creates arc
    pathItem = scene->addPath(*path); // set path item to path so it can be removed - older versions of arc deleted
}

void mainWindow::mouseReleaseEvent(QMouseEvent *e)
{
    //now draw the arc
    QPainterPath* newPath = new QPainterPath();
    newPath->arcMoveTo(x_init,y_init, width, height,0);
    newPath->arcTo(x_init,y_init, width, height, 0, 180);
    scene->addPath(*newPath);
}
