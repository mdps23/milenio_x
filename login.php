<?php

include ("conexion_db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <h2>Datos de Usuario</h2>
        </div>

        <div class="bloque-contenedor">
            <form action="login_post.php" method="post" onsubmit="return validar(this)">
                <div class="camposform">
                    <label for="username">Tu nombre de usuario:</label>
                    <input type="text" name="username">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="camp">
                    <div>¿No estás registrado? Regístrate <a href="./registro.php"><u>aquí</u></a></div>
                </div>
                <br>
                <br>
                <input type="submit" name="enviar" class="camp">
                <button><a href="./">Volver</a></button>
            </form>
        </div>

    </div>

    <footer>
        <div class="contenedor">
            <p>Ovnifans S.A. - Todos los derechos deservados &copy; 2024</p>
        </div>
    </footer>

    <script>
        function validar(form) {
            var enviar = true;
            if (form.username.value == '') {
                alert("No has escrito tu nombre de usuario");
                enviar = false;
            }
            if (form.password.value == '') {
                alert("No has escrito tu contraseña");
                enviar = false;
            }
            if (enviar) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</body>

</html>