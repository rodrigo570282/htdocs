# -*- coding: utf-8 -*-

################################################################################
## Form generated from reading UI file 'LoginIhUmlJ.ui'
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
from PySide6.QtWidgets import (QApplication, QFrame, QLabel, QLineEdit,
    QPushButton, QSizePolicy, QWidget)
import icon_rc

class Ui_Form(object):
    def setupUi(self, Form):
        if not Form.objectName():
            Form.setObjectName(u"Form")
        Form.resize(556, 571)
        self.frame = QFrame(Form)
        self.frame.setObjectName(u"frame")
        self.frame.setGeometry(QRect(20, 20, 491, 471))
        self.frame.setStyleSheet(u"background-color: rgba(0, 0, 0,0.2);")
        self.frame.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame.setFrameShadow(QFrame.Shadow.Raised)
        self.label = QLabel(self.frame)
        self.label.setObjectName(u"label")
        self.label.setGeometry(QRect(90, 30, 291, 201))
        self.label.setMinimumSize(QSize(291, 0))
        self.label.setScaledContents(True)
        self.frame_2 = QFrame(self.frame)
        self.frame_2.setObjectName(u"frame_2")
        self.frame_2.setGeometry(QRect(150, 250, 161, 41))
        self.frame_2.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame_2.setFrameShadow(QFrame.Shadow.Raised)
        self.txt_user = QLineEdit(self.frame_2)
        self.txt_user.setObjectName(u"txt_user")
        self.txt_user.setGeometry(QRect(30, 10, 113, 21))
        font = QFont()
        font.setPointSize(11)
        self.txt_user.setFont(font)
        self.txt_user.setStyleSheet(u"\n"
"background-color: rgb(255, 255, 255);")
        self.txt_user.setAlignment(Qt.AlignmentFlag.AlignCenter)
        self.frame_3 = QFrame(self.frame)
        self.frame_3.setObjectName(u"frame_3")
        self.frame_3.setGeometry(QRect(150, 300, 161, 41))
        self.frame_3.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame_3.setFrameShadow(QFrame.Shadow.Raised)
        self.txt_password = QLineEdit(self.frame_3)
        self.txt_password.setObjectName(u"txt_password")
        self.txt_password.setGeometry(QRect(30, 10, 113, 21))
        self.txt_password.setFont(font)
        self.txt_password.setStyleSheet(u"background-color: rgb(255, 255, 255);")
        self.txt_password.setEchoMode(QLineEdit.EchoMode.Password)
        self.txt_password.setAlignment(Qt.AlignmentFlag.AlignCenter)
        self.frame_4 = QFrame(self.frame)
        self.frame_4.setObjectName(u"frame_4")
        self.frame_4.setGeometry(QRect(150, 350, 161, 81))
        self.frame_4.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame_4.setFrameShadow(QFrame.Shadow.Raised)
        self.pushButton_2 = QPushButton(self.frame_4)
        self.pushButton_2.setObjectName(u"pushButton_2")
        self.pushButton_2.setGeometry(QRect(50, 10, 75, 24))
        self.pushButton_2.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        self.pushButton_2.setStyleSheet(u"QPushButton{\n"
"\n"
"	background-color: rgb(0, 0, 0);\n"
"	color: rgb(255, 255, 255);\n"
"	border-radius:10px\n"
"\n"
"}\n"
"QPushButton:hover{\n"
"	background-color: rgb(255, 255, 255);\n"
"	color: rgb(0, 0, 0);\n"
"}")
        self.pushButton = QPushButton(self.frame_4)
        self.pushButton.setObjectName(u"pushButton")
        self.pushButton.setGeometry(QRect(50, 40, 75, 24))
        self.pushButton.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        self.pushButton.setStyleSheet(u"QPushButton{\n"
"\n"
"	background-color: rgb(0, 0, 0);\n"
"	color: rgb(255, 255, 255);\n"
"	border-radius:10px\n"
"\n"
"}\n"
"QPushButton:hover{\n"
"	background-color: rgb(255, 255, 255);\n"
"	color: rgb(0, 0, 0);\n"
"}")
        self.frame_3.raise_()
        self.label.raise_()
        self.frame_2.raise_()
        self.frame_4.raise_()
        QWidget.setTabOrder(self.txt_user, self.txt_password)
        QWidget.setTabOrder(self.txt_password, self.pushButton)

        self.retranslateUi(Form)

        QMetaObject.connectSlotsByName(Form)
    # setupUi

    def retranslateUi(self, Form):
        Form.setWindowTitle(QCoreApplication.translate("Form", u"Form", None))
        self.label.setText(QCoreApplication.translate("Form", u"<html><head/><body><p align=\"center\"><img src=\":/icon/login.png\"/></p></body></html>", None))
        self.txt_user.setPlaceholderText(QCoreApplication.translate("Form", u"EMAIL", None))
        self.txt_password.setPlaceholderText(QCoreApplication.translate("Form", u"SENHA", None))
        self.pushButton_2.setText(QCoreApplication.translate("Form", u"CADASTRAR", None))
        self.pushButton.setText(QCoreApplication.translate("Form", u"ENTRAR", None))
    # retranslateUi

