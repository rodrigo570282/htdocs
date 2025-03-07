import sys
import mysql.connector
from PySide6.QtWidgets import QApplication, QMainWindow
from py.cadastro import Ui_Cadastro
from py.login import Ui_Form
from py.pagina1 import Ui_loginOk

# Função para conectar ao banco de dados
def conectar(usuario="root", senha=""):
    return mysql.connector.connect(
        host="localhost",        # O endereço do servidor (pode ser 'localhost' ou o IP do servidor)
        user=usuario,           # O nome de usuário do MySQL
        password=senha,         # A senha do usuário
        database="login"        # O nome do banco de dados com o qual você quer se conectar
    )

# Função para adicionar um usuário
def adicionar_usuario(email, senha):
    conexao = conectar()
    cursor = conexao.cursor()
    sql = "INSERT INTO usuarios (email, senha_hash) VALUES (%s, SHA2(%s, 256))"
    valores = (email, senha)
    cursor.execute(sql, valores)
    conexao.commit()
    cursor.close()
    conexao.close()
    print("Usuário cadastrado com sucesso!")

# Função para verificar o login do usuário
def verificar_usuario(email, senha):
    conexao = conectar()
    cursor = conexao.cursor()
    sql = "SELECT * FROM usuarios WHERE email = %s AND senha_hash = SHA2(%s, 256)"
    valores = (email, senha)
    cursor.execute(sql, valores)
    resultado = cursor.fetchone()
    cursor.close()
    conexao.close()
    
    if resultado:
        print("Login bem-sucedido!")
        return True
    else:
        print("E-mail ou senha incorretos.")
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
        else:
            self.mostrar_erro("Erro no login", "E-mail ou senha incorretos.")
    
    def mostrar_erro(self, titulo, mensagem):
        """Exibe uma mensagem de erro (ou sucesso) para o usuário."""
        msg = QMessageBox()
        msg.setIcon(QMessageBox.Information)  # Use QMessageBox.Warning para erros
        msg.setWindowTitle(titulo)
        msg.setText(mensagem)
        msg.exec()

# Classe principal do aplicativo que irá inicializar a interface gráfica
class MainWindow(QMainWindow):
    def __init__(self):
        super().__init__()

        # Aqui você pode inicializar a interface gráfica conforme necessário
        self.setWindowTitle("Sistema de Login")
        self.setGeometry(300, 300, 400, 300)
        
        # Se você tiver uma interface em Qt (como Ui_Form ou Ui_Cadastro), pode carregar aqui
        # Exemplo com Ui_Form (Login)
        self.ui = Ui_Form()  # Supondo que o arquivo login.py tenha a classe Ui_Form
        self.ui.setupUi(self)  # Inicializa o design do Form no QMainWindow

        # Aqui você pode adicionar a lógica de ação de login ou cadastro

# Função para inicializar a aplicação
def main():
    app = QApplication(sys.argv)
    window = MainWindow()
    window.show()
    sys.exit(app.exec())

if __name__ == "__main__":
    main()
