from PySide6.QtCore import (QCoreApplication, QMetaObject, Qt, QRect)
from PySide6.QtGui import (QFont, QCursor)
from PySide6.QtWidgets import (QMainWindow, QWidget, QFrame, QTextEdit, QLineEdit, QPushButton, QStatusBar, QMessageBox)
import mysql.connector

class Ui_Cadastro(object):
    def setupUi(self, Cadastro):
        if not Cadastro.objectName():
            Cadastro.setObjectName(u"Cadastro")
        Cadastro.resize(523, 441)
        self.centralwidget = QWidget(Cadastro)
        self.centralwidget.setObjectName(u"centralwidget")
        self.frame = QFrame(self.centralwidget)
        self.frame.setObjectName(u"frame")
        self.frame.setGeometry(QRect(110, 40, 371, 351)) # QRect agora está definido
        self.frame.setStyleSheet(u"background-color: rgb(157, 157, 157);")
        self.frame.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame.setFrameShadow(QFrame.Shadow.Raised)
        self.textEdit = QTextEdit(self.frame)
        self.textEdit.setObjectName(u"textEdit")
        self.textEdit.setGeometry(QRect(10, 10, 351, 31))
        self.frame_4 = QFrame(self.frame)
        self.frame_4.setObjectName(u"frame_4")
        self.frame_4.setGeometry(QRect(10, 60, 341, 91))
        self.frame_4.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame_4.setFrameShadow(QFrame.Shadow.Raised)
        self.nomeCompleto = QLineEdit(self.frame_4)
        self.nomeCompleto.setObjectName(u"nomeCompleto")
        self.nomeCompleto.setGeometry(QRect(30, 10, 291, 21))
        font = QFont()
        font.setPointSize(11)
        self.nomeCompleto.setFont(font)
        self.nomeCompleto.setStyleSheet(u"background-color: rgb(255, 255, 255);")
        self.nomeCompleto.setAlignment(Qt.AlignmentFlag.AlignCenter)
        self.nomeCompleto_2 = QLineEdit(self.frame_4)
        self.nomeCompleto_2.setObjectName(u"nomeCompleto_2")
        self.nomeCompleto_2.setGeometry(QRect(30, 50, 291, 21))
        self.nomeCompleto_2.setFont(font)
        self.nomeCompleto_2.setStyleSheet(u"background-color: rgb(255, 255, 255);")
        self.nomeCompleto_2.setAlignment(Qt.AlignmentFlag.AlignCenter)
        self.pushButton_2 = QPushButton(self.frame)
        self.pushButton_2.setObjectName(u"pushButton_2")
        self.pushButton_2.setGeometry(QRect(150, 170, 75, 24))
        self.pushButton_2.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        self.pushButton_2.setStyleSheet(u"QPushButton{\n"
                                          "    background-color: rgb(0, 0, 0);\n"
                                          "    color: rgb(255, 255, 255);\n"
                                          "    border-radius:10px\n"
                                          "}\n"
                                          "QPushButton:hover{\n"
                                          "    background-color: rgb(255, 255, 255);\n"
                                          "    color: rgb(0, 0, 0);\n"
                                          "}")
        self.pushButton_3 = QPushButton(self.frame)
        self.pushButton_3.setObjectName(u"pushButton_3")
        self.pushButton_3.setGeometry(QRect(150, 210, 75, 24))
        self.pushButton_3.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        self.pushButton_3.setStyleSheet(u"QPushButton{\n"
                                          "    background-color: rgb(0, 0, 0);\n"
                                          "    color: rgb(255, 255, 255);\n"
                                          "    border-radius:10px\n"
                                          "}\n"
                                          "QPushButton:hover{\n"
                                          "    background-color: rgb(255, 255, 255);\n"
                                          "    color: rgb(0, 0, 0);\n"
                                          "}")
        Cadastro.setCentralWidget(self.centralwidget)
        self.statusbar = QStatusBar(Cadastro)
        self.statusbar.setObjectName(u"statusbar")
        Cadastro.setStatusBar(self.statusbar)

        self.retranslateUi(Cadastro)
        self.pushButton_3.clicked.connect(Cadastro.close) # Botão VOLTAR fecha a janela

        QMetaObject.connectSlotsByName(Cadastro)

        # Conectando os botões às funções
        self.pushButton_2.clicked.connect(self.salvar_cadastro)
        self.pushButton_3.clicked.connect(self.voltar_login)
        self.cadastro_window = Cadastro

    def retranslateUi(self, Cadastro):
        Cadastro.setWindowTitle(QCoreApplication.translate("Cadastro", u"Cadastro", None))
        self.textEdit.setHtml(QCoreApplication.translate("Cadastro", u"<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0//EN\" \"http://www.w3.org/TR/REC-html40/strict.dtd\">\n"
                                                                        "<html><head><meta name=\"qrichtext\" content=\"1\" /><meta charset=\"utf-8\" /><style type=\"text/css\">\n"
                                                                        "p, li { white-space: pre-wrap; }\n"
                                                                        "hr { height: 1px; border-width: 0; }\n"
                                                                        "li.unchecked::marker { content: \"\\2610\"; }\n"
                                                                        "li.checked::marker { content: \"\\2612\"; }\n"
                                                                        "</style></head><body style=\" font-family:'Segoe UI'; font-size:9pt; font-weight:400; font-style:normal;\">\n"
                                                                        "<p align=\"center\" style=\" margin-top:0px; margin-bottom:0px; margin-left:0px; margin-right:0px; -qt-block-indent:0; text-indent:0px;\"><span style=\" font-weight:700;\">CADASTRO</span></p></body></html>", None))
        self.nomeCompleto.setPlaceholderText(QCoreApplication.translate("Cadastro", u"Email", None))
        self.nomeCompleto_2.setPlaceholderText(QCoreApplication.translate("Cadastro", u"Senha", None))
        self.pushButton_2.setText(QCoreApplication.translate("Cadastro", u"SALVAR", None))
        self.pushButton_3.setText(QCoreApplication.translate("Cadastro", u"VOLTAR", None))

    def conectar_banco(self, usuario="root", senha="", db="login"):
        return mysql.connector.connect(
            host="localhost",
            user=usuario,
            password=senha,
            database=db
        )

    def salvar_cadastro(self):
        email = self.nomeCompleto.text()
        senha = self.nomeCompleto_2.text()

        if not email or not senha:
            QMessageBox.warning(self.cadastro_window, "Erro", "Preencha todos os campos.")
            return

        conexao = self.conectar_banco()
        cursor = conexao.cursor()
        sql = "INSERT INTO usuario (login, senha) VALUES (%s, %s)"
        valores = (email, senha)

        try:
            cursor.execute(sql, valores)
            conexao.commit()