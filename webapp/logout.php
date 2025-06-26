<?php
// inicia a sessão
session_start();

// limpar sessão
session_unset();
session_destroy();

// volta para tela inicial
return header('Location: index.php');