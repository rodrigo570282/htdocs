from PySide6.QtCore import QCoreApplication, QMetaObject, Qt
from PySide6.QtGui import QCursor, QFont
from PySide6.QtWidgets import QApplication, QFrame, QLabel, QLineEdit, QPushButton, QWidget, QMainWindow
from py.cadastro import Ui_Cadastro  # Importando a interface de cadastro

class Ui_Form(object):
    def setupUi(self, Form):
        if not Form.objectName():
            Form.setObjectName(u"Form")
        Form.resize(625, 571)

        # Definição da interface gráfica
        self.frame = QFrame(Form)
        self.frame.setObjectName(u"frame")
        self.frame.setGeometry(20, 20, 491, 471)
        self.frame.setStyleSheet(u"background-color: rgba(0, 0, 0,0.2);")
        self.frame.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame.setFrameShadow(QFrame.Shadow.Raised)
        
        self.label = QLabel(self.frame)
        self.label.setObjectName(u"label")
        self.label.setGeometry(90, 30, 291, 201)
        self.label.setMinimumSize(291, 0)
        self.label.setScaledContents(True)
        
        self.frame_2 = QFrame(self.frame)
        self.frame_2.setObjectName(u"frame_2")
        self.frame_2.setGeometry(150, 250, 161, 41)
        self.frame_2.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame_2.setFrameShadow(QFrame.Shadow.Raised)
        
        self.txt_user = QLineEdit(self.frame_2)
        self.txt_user.setObjectName(u"txt_user")
        self.txt_user.setGeometry(30, 10, 113, 21)
        font = QFont()
        font.setPointSize(11)
        self.txt_user.setFont(font)
        self.txt_user.setStyleSheet(u"background-color: rgb(255, 255, 255);")
        self.txt_user.setAlignment(Qt.AlignmentFlag.AlignCenter)
        
        self.frame_3 = QFrame(self.frame)
        self.frame_3.setObjectName(u"frame_3")
        self.frame_3.setGeometry(150, 300, 161, 41)
        self.frame_3.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame_3.setFrameShadow(QFrame.Shadow.Raised)
        
        self.txt_password = QLineEdit(self.frame_3)
        self.txt_password.setObjectName(u"txt_password")
        self.txt_password.setGeometry(30, 10, 113, 21)
        self.txt_password.setFont(font)
        self.txt_password.setStyleSheet(u"background-color: rgb(255, 255, 255);")
        self.txt_password.setEchoMode(QLineEdit.EchoMode.Password)
        self.txt_password.setAlignment(Qt.AlignmentFlag.AlignCenter)
        
        self.frame_4 = QFrame(self.frame)
        self.frame_4.setObjectName(u"frame_4")
        self.frame_4.setGeometry(150, 350, 161, 81)
        self.frame_4.setFrameShape(QFrame.Shape.StyledPanel)
        self.frame_4.setFrameShadow(QFrame.Shadow.Raised)
        
        # Botão de cadastro
        self.pushButton_2 = QPushButton(self.frame_4)
        self.pushButton_2.setObjectName(u"pushButton_2")
        self.pushButton_2.setGeometry(50, 10, 75, 24)
        self.pushButton_2.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        self.pushButton_2.setStyleSheet(u"QPushButton{\n"
                                       "background-color: rgb(0, 0, 0);\n"
                                       "color: rgb(255, 255, 255);\n"
                                       "border-radius:10px\n"
                                       "}\n"
                                       "QPushButton:hover{\n"
                                       "background-color: rgb(255, 255, 255);\n"
                                       "color: rgb(0, 0, 0);\n"
                                       "}")
        
        # Botão de login
        self.pushButton = QPushButton(self.frame_4)
        self.pushButton.setObjectName(u"pushButton")
        self.pushButton.setGeometry(50, 40, 75, 24)
        self.pushButton.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        self.pushButton.setStyleSheet(u"QPushButton{\n"
                                      "background-color: rgb(0, 0, 0);\n"
                                      "color: rgb(255, 255, 255);\n"
                                      "border-radius:10px\n"
                                      "}\n"
                                      "QPushButton:hover{\n"
                                      "background-color: rgb(255, 255, 255);\n"
                                      "color: rgb(0, 0, 0);\n"
                                      "}")
        
        # Conectando o botão "Cadastrar" com a função que abre a tela de cadastro
        self.pushButton_2.clicked.connect(self.abrir_tela_cadastro)
        
        QWidget.setTabOrder(self.txt_user, self.txt_password)
        QWidget.setTabOrder(self.txt_password, self.pushButton)

        self.retranslateUi(Form)
        QMetaObject.connectSlotsByName(Form)

    def retranslateUi(self, Form):
        Form.setWindowTitle(QCoreApplication.translate("Form", u"Form", None))
        self.label.setText(QCoreApplication.translate("Form", u"<html><head/><body><p align=\"center\"><br/></p></body></html>", None))
        self.txt_user.setPlaceholderText(QCoreApplication.translate("Form", u"EMAIL", None))
        self.txt_password.setPlaceholderText(QCoreApplication.translate("Form", u"SENHA", None))
        self.pushButton_2.setText(QCoreApplication.translate("Form", u"CADASTRAR", None))
        self.pushButton.setText(QCoreApplication.translate("Form", u"ENTRAR", None))

    def abrir_tela_cadastro(self):
        # Fechar a janela de login antes de abrir a de cadastro
        self.frame.close()  # Fecha a janela de login
        
        # Aqui você cria a janela de cadastro e exibe
        self.cadastro_window = QMainWindow()  # Cria a nova janela de cadastro
        self.ui_cadastro = Ui_Cadastro()  # Inicializa a interface de cadastro
        self.ui_cadastro.setupUi(self.cadastro_window)  # Configura a interface na nova janela
        self.cadastro_window.show()  # Exibe a janela de cadastro

