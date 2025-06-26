1. Fazer a validação por tamanho da imagem, não permitindo imagem maior que 16MB.

2. Fazer a criação automática do diretório upload caso não exista.

3. Construa um sistema para armazenamento de imagens, onde o usuário possa escolher arquivos de imagens para salvar e posteriormente consiga visualizar as imagens em formato de grid. Além disso o sistema deve:

    3.1. garantir apenas imagens possam ser salvas

    3.2. armazenar as imagens de forma segura não sobrepondo imagens enviadas anteriormente

    3.3. armazenar também o nome original e data de envio

    3.4. permitir fazer download da imagem ao selecionar na grid

4. Gerenciar minhas imagens
	4.1 Construa um cadastro de usuários que tenha os atributos nome, email e imagem de perfil
	4.2 A imagem de perfil deve ser um registro da tabela imagens
	4.3 O cadastro de usuário deve ser uma tela a parte
	4.4 O upload de imagens do site deve ser alterado cada imagem ser vinculada com um usuário. Obs: a tabela imagens não deve ser alterada, deve ser criado uma nova tabela.
	4.5 O grid de imagens publicas deve permitir ver o usuário que fez upload da imagem
	4.6 O usuário deve conseguir ver todas as imagens que ele fez upload no sistema

5. Autenticação

	https://www.php.net/manual/en/intro.session.php
	https://www.php.net/manual/en/book.password.php

	5.1 somente usuário logado pode fazer upload na galeria 
	5.2 o upload deve vincular a imagem com o usuário logado
	5.3 cadastro do usuário deve salvar a senha (criptografada)
	5.4 tela de login
	5.5 logout
	5.6 deixar o email unico no sistema

6. Controle de Tempo de Sessão

    Implemente um sistema de expiração automática da sessão por inatividade.

    - Após 5 minutos sem atividade, a sessão do usuário deve ser encerrada automaticamente.
    - Exiba uma mensagem informando o motivo do logout ao redirecionar para o login.
    - Use $_SESSION['ultima_interacao'] com a função time() para controlar o tempo.

7. Bloqueio por Tentativas de Login Falhas

    Adicione uma funcionalidade que bloqueie o acesso após 3 tentativas de login incorretas.

    - Armazene o número de tentativas usando $_SESSION.
    - Após 3 tentativas, bloqueie o login por 2 minutos.
    - Exiba mensagens genéricas para o usuário com intenção de ofuscar informação em caso de ataque de força bruta.

8. Área administrativa

	Adiciona uma área administrativa no sistema onde somente o usuário administrador pode excluir imagens de qualquer usuário.