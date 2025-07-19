<?php
class authService
{ 
    public static function sessaoValida()
    {
        // Se esta logado
        if (isset($_SESSION['id'])) 
        {
            // Se a ultima interação extrapolou o limite de tempo
            $horaAtual = time();
            $horaLogin = $_SESSION['hora_login'];
            // 1800 segundos -> 30 minutos
            $tempoLimiteSessao = 1800;
            if (($horaAtual - $horaLogin) > $tempoLimiteSessao) {
                // desloga o usuario
                return header('Location: logout.php');
            }
        }
    }
}