#-------------------------------------------------
#
# Project created by QtCreator 2015-11-03T22:31:37
#
#-------------------------------------------------

QT       += core gui

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = Techni
TEMPLATE = app


SOURCES += main.cpp\
        techni.cpp \
    techniSlotHandler.cpp \
    canvas.cpp

HEADERS  += techni.h \
    canvas.h

FORMS    += techni.ui

RESOURCES += \
    image.qrc
