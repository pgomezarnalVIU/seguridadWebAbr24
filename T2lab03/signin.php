<?php
    session_start();

    $_SESSION['favcolor']='red';
    $_SESSION['animal']='cat';
    $_SESSION['time']=time();
    $_SESSION['user']='paco';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de sesion</title>
</head>
<body>
    <h1>Ejemplo de manejo de sesiones</h1>
    <a href="session.php">Seguimos en la session</a>
</body>
</html>