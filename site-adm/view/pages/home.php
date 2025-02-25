<?php require_once __DIR__ . '\..\components\head.php'; ?>
<body class="content">
    <!-- arquivo responsável pela tela Home -->

    <!-- 
        require // require_once -> lança erro // once - inclui apenas 1x
        include // include_once -> lança msg de aviso
    -->
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main class="content-grid">
        <h1>Home</h1>
    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>
</html>