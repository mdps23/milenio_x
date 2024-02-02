<?php

$conn = new mysqli('localhost', 'admin', 'contra', 'milenio_x');

if ($conn->connect_error) {
    die("ERROR" . $conn->connect_error);
}

if (isset($_POST['category_name'])) {
    $category = $_POST['category_name'];

    $check = $conn->query("SELECT id_category FROM categories WHERE category_name = '$category'");

    if ($check->num_rows > 0) {
        echo "La categoría ya existe";
    } else {
        $insert = "INSERT INTO categories (category_name) VALUES ('$category')";

        if ($conn->query($insert) === TRUE) {
            echo "Nueva categoría añadida con éxito";
            echo "<br>";
            echo "<a href='abm_categoria.html'>Volver</a>";
        } else {
            echo "Error al insertar nueva categoría: " . $conn->error;
            echo "<br>";
            echo "<a href='abm_categoria.html'>Volver</a>";
        }
    }
} else {
    echo "Parámetros faltantes";
    echo "<br>";
    echo "<a href='abm_categoria.html'>Volver</a>";
}

$conn->close();
