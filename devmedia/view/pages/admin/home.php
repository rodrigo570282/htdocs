<?php
    require_once __DIR__ . '/../../../config/env.php';
?>

<?php require_once __DIR__ . '/../../components/head.php'; ?>

<body class="container-adm">
    <!-- arquivo responsável pela tela Home -->

    <!-- 
        require // require_once -> lança erro // once - inclui apenas 1x
        include // include_once -> lança msg de aviso
    -->
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Home</h3>

        <div class="container">
            <h4>Bem vindo, Usuário Admin!</h4>
        </div>
    </main>

    <?php require_once __DIR__ . '/../../components/footer.php'; ?>

    <script src="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_JS'] ?>main.js"></script>
</body>

</html>