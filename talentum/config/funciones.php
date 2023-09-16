<?php
function limpiar($dato)
{

    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato, ENT_QUOTES);

    return $dato;
}


function cifrar($dato)
{

    $passCifrado = password_hash($dato, PASSWORD_BCRYPT, ['cost' => 10]);

    return $passCifrado;
}

?>