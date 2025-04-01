import sys
from PySide6.QtWidgets import QApplication, QMainWindow, QMessageBox
from py.cadastro import Ui_Cadastro
from py.login import Ui_Form
from py.pagina1 import Ui_loginOk
import bcrypt
import mysql.connector
from mysql.connector import Error

def conectar(usuario="root", senha="", db="login"):
    try:
        conexao = mysql.connector.connect(
            host="localhost",
            user=usuario,
            password=senha,
            database=db
        )
        return conexao
    except Error as e:
        print(f"Erro ao conectar ao banco de dados: {e}")
        return None

def verificar_usuario(login, senha):
    conexao = conectar()
    if conexao:
        cursor = conexao.cursor()
        sql = "SELECT senha FROM usuario WHERE login = %s"
        valores = (login,)
        cursor.execute(sql, valores)
        resultado = cursor.fetchone()
        cursor.close()
        conexao.close()

        if resultado:
            senha_hash = resultado[0].encode('utf-8')
            return bcrypt.checkpw(senha.encode('utf-8'), senha_hash)
        else:
            return False
    else:
        return False

class MainWindow(QMainWindow):
    def __init__(self):
        super().__init__()
        self.setWindowTitle("Sistema de Login")
        self.setGeometry(300, 300, 400, 300)
        self.ui = Ui_Form()
        self.ui.setupUi(self)
        self.ui.pushButton.clicked.connect(self.realizar_login)
        self.ui.pushButton_2.clicked.connect(self.abrir_tela_cadastro)

    def realizar_login(self):
        login = self.ui.txt_user.text()
        senha = self.ui.txt_password.text()

        if verificar_usuario(login, senha):
            self.mostrar_erro("Login bem-sucedido!", "Você está logado.")
            self.exibir_login_ok()
        else:
            self.mostrar_erro("Erro no login", "E-mail ou senha incorretos.")

    def mostrar_erro(self, titulo, mensagem):
        msg = QMessageBox()
        msg.setIcon(QMessageBox.Information)
        msg.setWindowTitle(titulo)
        msg.setText(mensagem)
        msg.exec()

    def exibir_login_ok(self):
        self.loginOk_window = QMainWindow()
        self.ui_login_ok = Ui_loginOk()
        self.ui_login_ok.setupUi(self.loginOk_window)
        self.loginOk_window.show()

    def abrir_tela_cadastro(self):
        self.close()
        self.cadastro_window = QMainWindow()
        self.ui_cadastro = Ui_Cadastro()
        self.ui_cadastro.setupUi(self.cadastro_window)
        self.cadastro_window.show()

def main():
    app = QApplication(sys.argv)
    window = MainWindow()
    window.show()
    sys.exit(app.exec())

if __name__ == "__main__":
    main()




