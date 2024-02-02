<?php

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['del_id_post'])) {
    $post = $_POST['del_id_post'];

    $check = $conn->query("SELECT * FROM posts WHERE id_post = '$post'");

    if ($check->num_rows > 0) {
        $delete = "DELETE FROM posts WHERE id_post = '$post'";

        if ($conn->query($delete) === TRUE) {
            echo "Post borrado con éxito";
            echo "<br>";
            echo "<a href='abm_hilos_posts.html'>Volver</a>";
        } else {
            echo "Error al eliminar post: " . $conn->error;
            echo "<br>";
            echo "<a href='abm_hilos_posts.html'>Volver</a>";
        }
    } else {
        echo "Post id no encontrado";
        echo "<br>";
        echo "<a href='abm_hilos_posts.html'>Volver</a>";
    }
} else {
    echo "Parámetros faltantes";
    echo "<br>";
    echo "<a href='abm_hilos_posts.html'>Volver</a>";
}

$conn->close();
