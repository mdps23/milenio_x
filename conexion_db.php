<?php

define('hostname', 'localhost');
define('username', 'admin');
define('password', 'contra');
define('database', 'milenio_x');

session_start();

if (!isset($_SESSION['logado'])) {
    $_SESSION['logado'] = false;
}

if ($_SESSION['logado'] != true) {
    $_SESSION['username'] = null;
    $_SESSION['id_user'] = null;
}

function mysqli_sql($cadenaSQL, $Retorno = false) {
    $conexion = mysqli_connect(hostname, username, password, database) or die("Error: " . mysqli_error($conexion));
    $resultado = mysqli_query($conexion, $cadenaSQL) or die("Error: " . mysqli_error($conexion));
    if (!$Retorno) {
        $lista = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $lista[] = $fila;
        }
        mysqli_free_result($resultado);
    }
    mysqli_close($conexion);
    if (!$Retorno) {
        return $lista;
    }
}