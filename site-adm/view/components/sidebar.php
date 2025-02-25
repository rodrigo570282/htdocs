<?php require_once "../../config/env.php"; ?>

<!-- lateral -->
<aside id="sidebar" class="sidebar">
    <div id="menu-mobile" class="btn-icon menu-mobile">
        <span class="material-symbols-outlined">
            menu
        </span>
    </div>

    <nav class="nav">
        <img src="<?= VARIAVEIS['DIR_IMG'] ?>logo.jpg" alt="logo">
        <ul id="nav-items" class="nav-items">
            <li class="nav-item">
                <a class="nav-link" href="<?= VARIAVEIS['DIR_PAGES'] ?>home.php">
                    <span class="material-symbols-outlined">
                        home
                    </span>
                    <span>
                        Home
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= VARIAVEIS['DIR_PAGES'] ?>artigos.php">
                    <span class="material-symbols-outlined">
                        news
                    </span>
                    <span>
                        Artigos
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= VARIAVEIS['DIR_PAGES'] ?>categorias.php">
                    <span class="material-symbols-outlined">
                        label
                    </span>
                    <span>
                        Categorias
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= VARIAVEIS['DIR_PAGES'] ?>usuarios.php">
                    <span class="material-symbols-outlined">
                        group
                    </span>
                    <span>
                        Usuários
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</aside>