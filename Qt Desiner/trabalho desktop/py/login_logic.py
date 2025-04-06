# py/login_logic.py
from PySide6.QtCore import Signal
from PySide6.QtWidgets import QMessageBox

class LoginLogic:
    cadastro_requested = Signal()

    def __init__(self, ui_login):
        self.ui = ui_login
        print("LoginLogic.__init__ chamado")
        print("Tipo de cadastro_requested:", type(self.cadastro_requested)) # Adicionamos esta linha
        self.conectar_eventos()

    def conectar_eventos(self):
        print("LoginLogic.conectar_eventos chamado")
        self.ui.pushButton_2.clicked.connect(self._handle_cadastro_button_clicked)
        print("Sinal do botão CADASTRAR conectado")

    def _handle_cadastro_button_clicked(self):
        print("LoginLogic._handle_cadastro_button_clicked chamado")
        print("Emitindo sinal cadastro_requested")
        self.cadastro_requested.emit()