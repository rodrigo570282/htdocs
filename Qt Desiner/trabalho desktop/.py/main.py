                                                   # código para conectar o banco de dados

import sys
from PySide6.QtCore import QCoreApplication, QMetaObject, Qt
from PySide6.QtGui import QCursor, QPixmap
from PySide6.QtWidgets import (QApplication, QFrame, QLabel, QLineEdit,
                               QPushButton, QWidget, QVBoxLayout, QMessageBox)

import mysql.connector
import cadastro
import login
import pagina1

# Função para conectar ao banco de dados
def conectar():
    return mysql.connector.connect(
    host="localhost",        # O endereço do servidor (pode ser 'localhost' ou o IP do servidor)
    user="root",      # O nome de usuário do MySQL
    password="",    # A senha do usuário
    database="email" # O nome do banco de dados com o qual você quer se conectar
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
        print("email bem-sucedido!")
        return True
    else:
        print("email ou senha incorretos.")
        return False