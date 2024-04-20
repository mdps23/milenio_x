<?php

include ("conexion_db.php");

if (isset($_GET['b'])) {
    $termino = $_GET['b'];

    $sql = "SELECT threads.*, users.username FROM threads INNER JOIN users ON threads.id_user = users.id_user WHERE threads.title LIKE '%$termino%'";
    $resultados = mysqli_sql($sql);
    echo "<table>";
    echo "<tr>";
    echo "<th>Usuario</th>";
    echo "<th>Título</th>";
    echo "<th>Creado</th>";
    echo "<th>Reciente</th>";
    echo "<th>Posts</th>";
    echo "</tr>";
    foreach ($resultados as $valor) {
        echo "<tr>";
        echo "<td>" . $valor['username'] . "</td>";
        echo "<td><a href='hilo.php?id=" . $valor['id_thread'] . "'>" . $valor['title'] . "</a></td>";
        echo "<td>" . $valor['date_created'] . "</td>";
        echo "<td>" . $valor['date_updated'] . "</td>";
        echo "<td>" . $valor['posts'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button><a href='./'>Volver</a></button>";
} else {
    echo "Por favor, ingresa un término de búsqueda.";
}
