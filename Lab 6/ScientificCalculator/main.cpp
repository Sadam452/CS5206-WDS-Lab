#include "mainwindow.h"
#include<qtextbrowser.h>
#include<QVBoxLayout>

#include <QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    MainWindow w;
    w.show();
    w.setWindowTitle("Scientific Calculator");
    return a.exec();
}
