<?php

include ("conexion_db.php");

if ($_SESSION['logado'] == true) {

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['id_thread']) && isset($_POST['post_id_user']) && isset($_POST['post_content'])) {
    $thread = $_POST['id_thread'];
    $user = $_POST['post_id_user'];
    $content = $_POST['post_content'];

    $insert = "INSERT INTO posts (id_thread, id_user, content) VALUES ('$thread', '$user', '$content')";

    if ($conn->query($insert) === TRUE) {
        $update = "UPDATE threads SET posts = posts + 1, date_updated = NOW() WHERE id_thread = '$thread'";

        if ($conn->query($update) === TRUE) {
            echo "Post añadido con éxito";
            echo "<br>";
            echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
        } else {
            echo "Error al actualizar hilo: " . $conn->error;
            echo "<br>";
            echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
        }
    } else {
        echo "Error al añadir post: " . $conn->error;
        echo "<br>";
        echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
    }
} else {
    echo "Parámetros faltantes";
    echo "<br>";
    echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
}

$conn->close();

} else {
    echo "Debes iniciar sesión para postear";
    echo "<br>";
    echo "<a href='./hilo.php?id=" . $thread . "'>Volver</a>";
}
