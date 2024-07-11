<?php
    //Almacenar el vector y la clave secreta
    session_start();
    $key="01claveSecret01.1354";
    $keyhash=hash("sha256",$key);
    //Creación del vector de inicialización aleatorio
    $iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    //Guardamos en las sesiones
    $_SESSION["keyhash"]=$keyhash;
    $_SESSION["iv"]=$iv;
    //Cookie encriptada
    $usuario="pacogomez";
    $usuarioencriptado=openssl_encrypt($usuario,'AES-256-CBC',$keyhash,0,$iv);
    setcookie("usuario",$usuarioencriptado,time()+3600);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptamos el contenido de nuestra cookie</title>
</head>
<body>
    <h1>Encriptacion</h1>
    <p>HASH: <?=$keyhash?></p>
</body>
</html>