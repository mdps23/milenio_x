<?php

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = md5($_POST['password']);

    $insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($insert) === TRUE) {
        echo "Nuevo usuario registrado con éxito";
        echo "<br>";
        echo "<a href='abm_usuario.html'>Volver</a>";
    } else {
        echo "Error al crear usuario: " . $conn->error;
        echo "<br>";
        echo "<a href='abm_usuario.html'>Volver</a>";
    }
} else {
    echo "Parámetros faltantes";
    echo "<br>";
    echo "<a href='abm_usuario.html'>Volver</a>";
}

$conn->close();
