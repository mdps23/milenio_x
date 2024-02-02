<?php

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['n_id_user']) && isset($_POST['n_username']) && isset($_POST['n_email']) && isset($_POST['n_password'])) {
    $id = $_POST['n_id_user'];
    $username = $_POST['n_username'];
    $email = $_POST['n_email'];
    $password = $_POST['n_password'];
    // $password = md5($_POST['n_password']);

    $check = $conn->query("SELECT * FROM users WHERE id_user = '$id'");

    if ($check->num_rows > 0) {
        $update = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE id_user = '$id'";

        if ($conn->query($update) === TRUE) {
            echo "Datos de usuario actualizados";
            echo "<br>";
            echo "<a href='abm_usuario.html'>Volver</a>";
        } else {
            echo "Error al actualizar usuario: " . $conn->error;
            echo "<br>";
            echo "<a href='abm_usuario.html'>Volver</a>";
        }
    } else {
        echo "Usuario no encontrado";
        echo "<br>";
        echo "<a href='abm_usuario.html'>Volver</a>";
    }
} else {
    echo "Parámetros faltantes";
    echo "<br>";
    echo "<a href='abm_usuario.html'>Volver</a>";
}

$conn->close();
