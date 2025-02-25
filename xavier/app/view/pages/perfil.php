<?php
include('../../config/env.php');
include('../componentes/navbar.php');
include('../componentes/sidebar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xavier Solutions - Perfil</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>style.css">
</head>
<body>

    
    <main class="content">
        <div class="profile-container">
            <div class="profile-header">
                <h1>Perfil Usuario</h1>
            </div>

            <div class="profile-details">
                <div class="profile-img">

                <img src="<?php echo IMG_PATH; ?>adm.jpg" alt="imagem-usuario">
                  
                </div>
                <div class="sobre">
                <div class="bio">
                    <h2>Sobre Mim</h2>
                    <p>
                        Me chamo Wellingon Xavier, desenvolvedor em formação. Comecei minha jornada na área de TI após atuar em funções operacionais e agora estou buscando expandir minhas habilidades em desenvolvimento de sistemas.
                    </p>
                    <p>
                        Tenho experiência  vendas, monitor , orientador, freelances, carga e descarga, motorista(A/D), manutenção de motos, marcenaria e construção básica, etc.. formado gestão pública. Atualmente, estou focado em me especializar na área de desenvolvimento de software, buscando oportunidades para ter uma noção de qual direção seguir na area de TI.
                    </p>
                </div>
            </div>
        </div>
        </div>

    </main>

    <?php include('../componentes/footer.php'); ?>

</body>
</html>
