<?php

include ("conexion_db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <div class="bloque-cen">
                <a href="./index.php"><img src="img/milenio_logo_rojo.png" alt="Milenio X" width="150"></a>
                <h1>Milenio X</h1>
            </div>
            <nav>
                <ul>
                    <?php if ($_SESSION['logado'] == true) { ?>
                        <li><a href="./perfil.php">Mi Perfil</a></li>
                        <li><a href="./logout.php">Cerrar Sesión</a></li>
                    <?php } else { ?>
                        <li><a href="./registro.php">Regístrate</a></li>
                        <li><a href="./login.php">Inicia Sesión</a></li>
                    <?php } ?>
                    <li><a href="./nuevo_hilo.php">Abrir Hilo</a></li>
                </ul>
            </nav>
            <form action="buscar.php" method="GET">
                <input type="text" name="b" placeholder="Buscar hilos...">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>

    <div class="contenedor" style="width: 30%;">
        <div class="bloque-colapsable">
            <h2>Regístrate en Milenio X</h2>
        </div>

        <div class="bloque-contenedor">
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
                $resultados = mysqli_sql($insert);

                if (!empty($resultados)) {
                    $select = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    $res = mysqli_sql($select);
                    $fila = $res[0];
                    $id_user = $fila['id_user'];
                    $_SESSION['logado'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['id_user'] = $id_user;
                    echo "<p>Nuevo usuario registrado con éxito</p>";
                    echo "<br>";
                    echo "<br>";
                    echo "<button><a href='./'>Volver</a></button>";
                } else {
                    echo "Error al crear usuario: " . $conn->error;
                    echo "<br>";
                    echo "<br>";
                    echo "<button><a href='./registro.php'>Volver</a></button>";
                }
            } else {
                echo "Parámetros faltantes";
                echo "<br>";
                echo "<br>";
                echo "<button><a href='./registro.php'>Volver</a></button>";
            }

            $conn->close();
            ?>
        </div>

    </div>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>

</body>

</html>