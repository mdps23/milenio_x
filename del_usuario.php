<?php

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['d_id_user'])) {
    $user = $_POST['d_id_user'];

    $check = $conn->query("SELECT * FROM users WHERE id_user = '$user'");

    if ($check->num_rows > 0) {
        $delete = "DELETE FROM users WHERE id_user = '$user'";

        if ($conn->query($delete) === TRUE) {
            echo "Usuario borrado con éxito";
            echo "<br>";
            echo "<a href='abm_usuario.html'>Volver</a>";
        } else {
            echo "Error al borrar usuario: " . $conn->error;
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
