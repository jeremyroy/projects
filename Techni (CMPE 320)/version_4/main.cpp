#include "techni.h"
#include "canvas.h"
#include <QApplication>
#include <stdio.h>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    Techni myTechni;
    myTechni.show();
    return a.exec();
}
