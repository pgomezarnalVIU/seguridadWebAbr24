<?php
    //Comporbamos que tenemos los valores para desencriptar
    session_start();
    $usuario="";
    if(isset($_SESSION['keyhash'])&&$_SESSION['iv']){
        $keyhash=$_SESSION['keyhash'];
        $iv=$_SESSION['iv'];
        if(isset($_COOKIE['usuario'])){
            $usuario=openssl_decrypt($_COOKIE['usuario'],'AES-256-CBC',$keyhash,0,$iv);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptado</title>
</head>
<body>
    <h1>Desencriptado</h1>
    <p><?php echo 'Hola nombre ' . $usuario. '!';?></p>
</body>
</html>