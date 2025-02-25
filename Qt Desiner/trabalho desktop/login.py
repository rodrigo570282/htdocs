# -*- coding: utf-8 -*-

################################################################################
## Form generated from reading UI file 'LoginXQvwVz.ui'
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

import mysql.connector

# Função para conectar ao banco de dados
def conectar():
    return mysql.connector.connect(
        host="localhost",
        login="root",
        senha="",
        database="login.sql"
    )

# Função para adicionar um usuário
def adicionar_usuario(login, senha):
    conexao = conectar()
    cursor = conexao.cursor()
    sql = "INSERT INTO usuarios (email, senha_hash) VALUES (%s, SHA2(%s, 256))"
    valores = (login, senha)
    cursor.execute(sql, valores)
    conexao.commit()
    cursor.close()
    conexao.close()
    print("Usuário cadastrado com sucesso!")

class Ui_Form(object):
    def setupUi(self, Form):
        if not Form.objectName():
            Form.setObjectName(u"Form")
        Form.resize(698, 445)
        self.telaLogin = QWidget(Form)
        self.telaLogin.setObjectName(u"telaLogin")
        self.telaLogin.setGeometry(QRect(170, 60, 371, 341))
        self.telaLogin.setStyleSheet(u"\n"
"background-color: rgb(162, 155, 145);\n"
"")
        self.usuario = QFrame(self.telaLogin)
        self.usuario.setObjectName(u"usuario")
        self.usuario.setGeometry(QRect(100, 140, 161, 41))
        self.usuario.setFrameShape(QFrame.Shape.StyledPanel)
        self.usuario.setFrameShadow(QFrame.Shadow.Raised)
        self.txt_usuario = QLineEdit(self.usuario)
        self.txt_usuario.setObjectName(u"txt_usuario")
        self.txt_usuario.setGeometry(QRect(30, 10, 113, 21))
        font = QFont()
        font.setPointSize(11)
        self.txt_usuario.setFont(font)
        self.txt_usuario.setAlignment(Qt.AlignmentFlag.AlignCenter)
        self.senha = QFrame(self.telaLogin)
        self.senha.setObjectName(u"senha")
        self.senha.setGeometry(QRect(100, 200, 161, 41))
        self.senha.setFrameShape(QFrame.Shape.StyledPanel)
        self.senha.setFrameShadow(QFrame.Shadow.Raised)
        self.txt_senha = QLineEdit(self.senha)
        self.txt_senha.setObjectName(u"txt_senha")
        self.txt_senha.setGeometry(QRect(30, 10, 113, 21))
        self.txt_senha.setFont(font)
        self.txt_senha.setEchoMode(QLineEdit.EchoMode.Password)
        self.txt_senha.setAlignment(Qt.AlignmentFlag.AlignCenter)
        self.botaoLogin = QPushButton(self.telaLogin)
        self.botaoLogin.setObjectName(u"botaoLogin")
        self.botaoLogin.setGeometry(QRect(150, 260, 75, 24))
        self.botaoLogin.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        self.botaoLogin.setStyleSheet(u"QPushButton{\n"
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
        self.imagem = QLabel(self.telaLogin)
        self.imagem.setObjectName(u"imagem")
        self.imagem.setGeometry(QRect(140, 40, 81, 81))
        QWidget.setTabOrder(self.txt_usuario, self.txt_senha)
        QWidget.setTabOrder(self.txt_senha, self.botaoLogin)

        self.retranslateUi(Form)

        QMetaObject.connectSlotsByName(Form)
    # setupUi

    def retranslateUi(self, Form):
        Form.setWindowTitle(QCoreApplication.translate("Form", u"Form", None))
        self.txt_usuario.setPlaceholderText(QCoreApplication.translate("Form", u"usuario", None))
        self.txt_senha.setPlaceholderText(QCoreApplication.translate("Form", u"senha", None))
        self.botaoLogin.setText(QCoreApplication.translate("Form", u"LOGIN", None))
        self.imagem.setText("")
    # retranslateUi

