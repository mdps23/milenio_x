<?php

include ("conexion_db.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milenio X</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <h1><a href="./index.php.">Milenio X</a></h1>
            <nav>
                <ul>
                    <?php if ($_SESSION['logado'] == true) { ?>
                        <li><a href="./logout.php">Cerrar Sesión</a></li>
                    <?php } else { ?>
                        <li><a href="./registro.php">Regístrate</a></li>
                        <li><a href="./login.php">Inicia Sesión</a></li>
                    <?php } ?>
                    <li><a href="./nuevo_hilo.php">Abrir Hilo</a></li>
                    <li><a href="#">Mapa</a></li>
                </ul>
            </nav>
            <form action="buscar.php" method="GET">
                <input type="text" name="b" placeholder="Buscar hilos...">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>


    <section id="hilos">
        <div class="contenedor">
            <h2>Hilos Abiertos</h2>
            <table>
                <tr>
                    <th>Usuario</th>
                    <th>Título</th>
                    <th>Creado</th>
                    <th>Reciente</th>
                    <th>Posts</th>
                </tr>
                <?php
                $sql = "SELECT threads.*, users.username FROM threads INNER JOIN users ON threads.id_user = users.id_user ORDER BY date_updated ASC";
                $resultados = mysqli_sql($sql);
                foreach ($resultados as $valor) {
                    echo "<tr>";
                    echo "<td>" . $valor['username'] . "</td>";
                    echo "<td><a href='hilo.php?id=" . $valor['id_thread'] . "'>" . $valor['title'] . "</a></td>";
                    echo "<td>" . $valor['date_created'] . "</td>";
                    echo "<td>" . $valor['date_updated'] . "</td>";
                    echo "<td>" . $valor['posts'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </section>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>
</body>

</html>