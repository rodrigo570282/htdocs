# -*- coding: utf-8 -*-

################################################################################
## Form generated from reading UI file 'LOGIN OKDPAOED.ui'
##
## Created by: Qt User Interface Compiler version 6.7.2
##
## WARNING! All changes made in this file will be lost when recompiling UI file!
################################################################################

from PySide6.QtCore import (QCoreApplication, QDate, QDateTime, QLocale,
    QMetaObject, QObject, QPoint, QRect,
    QSize, QTime, QUrl, Qt)
from PySide6.QtGui import (QBrush, QColor, QConicalGradient, QCursor,
    QFont, QFontDatabase, QGradient, QIcon,
    QImage, QKeySequence, QLinearGradient, QPainter,
    QPalette, QPixmap, QRadialGradient, QTransform)
from PySide6.QtWidgets import (QApplication, QFrame, QMainWindow, QSizePolicy,
    QStatusBar, QTextEdit, QWidget)

class Ui_loginOk(object):
    def setupUi(self, loginOk):
        if not loginOk.objectName():
            loginOk.setObjectName(u"loginOk")
        loginOk.resize(458, 391)
        self.centralwidget = QWidget(loginOk)
        self.centralwidget.setObjectName(u"centralwidget")
        self.frame = QFrame(self.centralwidget)
        self.frame.setObjectName(u"frame")
        self.frame.setGeometry(QRect(30, 80, 391, 241))
        self.frame.setStyleSheet(u"background-color: rgb(148, 148, 148);")
        self.frame.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame.setFrameShadow(QFrame.Shadow.Raised)
        self.textEdit = QTextEdit(self.frame)
        self.textEdit.setObjectName(u"textEdit")
        self.textEdit.setGeometry(QRect(30, 90, 331, 31))
        self.textEdit.setStyleSheet(u"background-color: rgb(255, 255, 255);")
        self.textEdit.setTabChangesFocus(False)
        loginOk.setCentralWidget(self.centralwidget)
        self.statusbar = QStatusBar(loginOk)
        self.statusbar.setObjectName(u"statusbar")
        loginOk.setStatusBar(self.statusbar)

        self.retranslateUi(loginOk)

        QMetaObject.connectSlotsByName(loginOk)
    # setupUi

    def retranslateUi(self, loginOk):
        loginOk.setWindowTitle(QCoreApplication.translate("loginOk", u"MainWindow", None))
        self.textEdit.setHtml(QCoreApplication.translate("loginOk", u"<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0//EN\" \"http://www.w3.org/TR/REC-html40/strict.dtd\">\n"
"<html><head><meta name=\"qrichtext\" content=\"1\" /><meta charset=\"utf-8\" /><style type=\"text/css\">\n"
"p, li { white-space: pre-wrap; }\n"
"hr { height: 1px; border-width: 0; }\n"
"li.unchecked::marker { content: \"\\2610\"; }\n"
"li.checked::marker { content: \"\\2612\"; }\n"
"</style></head><body style=\" font-family:'Segoe UI'; font-size:9pt; font-weight:400; font-style:normal;\">\n"
"<p align=\"center\" style=\" margin-top:0px; margin-bottom:0px; margin-left:0px; margin-right:0px; -qt-block-indent:0; text-indent:0px;\"><span style=\" font-weight:700;\">LOGIN BEM SUCEDIDO!</span></p></body></html>", None))
    # retranslateUi

