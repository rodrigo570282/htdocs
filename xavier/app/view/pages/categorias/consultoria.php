<?php
// Usando __DIR__ para garantir o caminho correto e seguro
require_once(__DIR__ . '/../../../config/env.php');

include('../../componentes/navbar.php');

include('../../componentes/sidebar.php');  // Inclui a sidebar
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xavier Solutions - Teste</title>  
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>style.css">  
</head>
<body>

<main class="content">
    <h1>XAVIER TESTE</h1>  
    <h2>Consultoria</h2>
    <h6>Você será redirecionado em breve...</h6> 

    
    
    
</main>

<?php include('../../componentes/footer.php'); ?>  
<script src="<?php echo JS_PATH; ?>rd.js"></script>  
</body>
</html>
