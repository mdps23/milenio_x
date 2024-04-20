<?php

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $password = md5($_POST['password']);

    $select = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    if ($conn->query($select) === TRUE) {
        $resultado = $conn->query($select);
        $fila = $resultado->fetch_assoc();
        $id_user = $fila['id'];
        $_SESSION['logado'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['id_user'] = $id_user;
        echo "¡Te has logueado con éxito!";
        echo "<br>";
        echo "<button><a href='./'>Volver</a></button>";
    } else {
        echo "Error al iniciar sesión: " . $conn->error;
        echo "<br>";
        echo "<button><a href='login.php'>Volver</a></button>";
    }
} else {
    echo "Parámetros faltantes";
    echo "<br>";
    echo "<button><a href='login.php'>Volver</a></button>";
}

$conn->close();
