<?php

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['id_user']) && isset($_POST['id_category']) && isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user = $_POST['id_user'];
    $category = $_POST['id_category'];

    $insert = "INSERT INTO threads (id_user, id_category, title, posts) VALUES ('$user', '$category', '$title', 0)";

    if ($conn->query($insert) === TRUE) {
        $thread = $conn->insert_id;

        $post = "INSERT INTO posts (id_thread, id_user, content) VALUES ('$thread', '$user', '$content')";

        $update_th = "UPDATE threads SET posts = posts + 1 WHERE id_thread = '$thread'";
        $update_cat = "UPDATE categories SET threads = threads + 1 WHERE id_category = '$category'";

        if ($conn->query($post) === TRUE && $conn->query($update_th) === TRUE && $conn->query($update_cat) === TRUE) {
            echo "Hilo abierto con éxito";
            echo "<br>";
            echo "<a href='abm_hilos_posts.html'>Volver</a>";
        } else {
            echo "Error al insertar post: " . $conn->error;
            echo "<br>";
            echo "<a href='abm_hilos_posts.html'>Volver</a>";
        }
    } else {
        echo "Error al abrir hilo: " . $conn->error;
        echo "<br>";
        echo "<a href='abm_hilos_posts.html'>Volver</a>";
    }
} else {
    echo "Parámetros faltantes";
    echo "<br>";
    echo "<a href='abm_hilos_posts.html'>Volver</a>";
}

$conn->close();
