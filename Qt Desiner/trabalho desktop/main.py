# -*- coding: utf-8 -*-

import sys
from PySide6.QtWidgets import QApplication, QWidget, QMainWindow
from py.login import Ui_Form  # Importando o arquivo da tela de login
from py.cadastro import Ui_Cadastro  # Importando o arquivo da tela de cadastro

class LoginWindow(QWidget):
    def __init__(self):
        super().__init__()
        self.ui = Ui_Form()
        self.ui.setupUi(self)

        # Conecta o botão "CADASTRAR" ao método para abrir a tela de cadastro
        self.ui.pushButton_2.clicked.connect(self.open_cadastro)

    def open_cadastro(self):
        self.cadastro_window = CadastroWindow()
        self.cadastro_window.show()
        self.close()  # Fecha a tela de login

class CadastroWindow(QMainWindow):
    def __init__(self):
        super().__init__()
        self.ui = Ui_Cadastro()
        self.ui.setupUi(self)

        # Conecta o botão "VOLTAR" ao método para retornar à tela de login
        self.ui.pushButton_3.clicked.connect(self.go_back)

    def go_back(self):
        self.login_window = LoginWindow()
        self.login_window.show()
        self.close()  # Fecha a tela de cadastro

if __name__ == "__main__":
    app = QApplication(sys.argv)
    login_window = LoginWindow()
    login_window.show()
    sys.exit(app.exec())
