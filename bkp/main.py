import sys
import bcrypt
import mysql.connector
from PySide6.QtWidgets import QApplication, QMainWindow, QMessageBox
from py.cadastro import Ui_Cadastro
from py.login import Ui_Form
from py.pagina1 import Ui_loginOk  # Importe a interface que você quer chamar após o login bem-sucedido
import bcrypt
# Gerando o hash da senha
senha = "minha_senha_segura"
senha_hash = bcrypt.hashpw(senha.encode('utf-8'), bcrypt.gensalt())

# Agora você pode armazenar o valor de senha_hash no banco de dados.


# Função para conectar ao banco de dados
import mysql.connector
from PySide6.QtWidgets import QMessageBox

# Função para conectar ao banco de dados
def conectar(usuario="root", senha="", db="usuario"):
    return mysql.connector.connect(
        host="localhost",  # O endereço do servidor (pode ser 'localhost' ou o IP do servidor)
        user=usuario,      # O nome de usuário do MySQL
        password=senha,    # A senha do usuário
        database=db        # O nome do banco de dados com o qual você quer se conectar
    )

# Função para verificar o login do usuário
def verificar_usuario(email, senha):
    conexao = conectar()
    cursor = conexao.cursor()
    sql = "SELECT * FROM usuario WHERE email = %s AND senha = %s"
    valores = (email, senha)
    cursor.execute(sql, valores)
    resultado = cursor.fetchone()
    cursor.close()
    conexao.close()

    if resultado:
        return True
    else:
        return False


# Classe principal do aplicativo que irá inicializar a interface gráfica
class MainWindow(QMainWindow):
    def __init__(self):
        super().__init__()

        self.setWindowTitle("Sistema de Login")
        self.setGeometry(300, 300, 400, 300)

        # Inicializando a interface de login
        self.ui = Ui_Form()  
        self.ui.setupUi(self)  # Configura a interface do login no QMainWindow
        
        # Conectando o evento de clique no botão "ENTRAR" à função de validação
        self.ui.pushButton.clicked.connect(self.realizar_login)

    def realizar_login(self):
        # Captura os valores dos campos de e-mail e senha
        email = self.ui.txt_user.text()
        senha = self.ui.txt_password.text()

        # Verifica se as informações de login são válidas
        if verificar_usuario(email, senha):
            self.mostrar_erro("Login bem-sucedido!", "Você está logado.")
            self.exibir_login_ok()  # Chama a função para exibir a interface de "login ok"
        else:
            self.mostrar_erro("Erro no login", "E-mail ou senha incorretos.")
    
    def mostrar_erro(self, titulo, mensagem):
        """Exibe uma mensagem de erro (ou sucesso) para o usuário."""
        msg = QMessageBox()
        msg.setIcon(QMessageBox.Information)  # Use QMessageBox.Warning para erros
        msg.setWindowTitle(titulo)
        msg.setText(mensagem)
        msg.exec()

    def exibir_login_ok(self):
        """Exibe a interface de sucesso de login.""" 
        self.loginOk_window = QMainWindow()  # Cria a nova janela de sucesso
        self.ui_login_ok = Ui_loginOk()  # Inicializa a interface de login ok
        self.ui_login_ok.setupUi(self.loginOk_window)  # Configura a interface na nova janela
        self.loginOk_window.show()  # Exibe a janela


def abrir_tela_cadastro(self):
    # Fechar a janela de login antes de abrir a de cadastro
    self.close()  # Fecha a janela atual (login)
    
    # Aqui você cria a janela de cadastro e exibe
    self.cadastro_window = QMainWindow()  # Cria a nova janela de cadastro
    self.ui_cadastro = Ui_Cadastro()  # Inicializa a interface de cadastro
    self.ui_cadastro.setupUi(self.cadastro_window)  # Configura a interface na nova janela
    self.cadastro_window.show()  # Exibe a janela de cadastro



# Função para inicializar a aplicação
def main():
    app = QApplication(sys.argv)
    window = MainWindow()
    window.show()
    sys.exit(app.exec())

if __name__ == "__main__":
    main()
