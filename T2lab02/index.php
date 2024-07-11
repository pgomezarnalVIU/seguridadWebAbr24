<?php
    $nombre = "Pako Gomez";
    setcookie("nombre",$nombre,time()+3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primera cookie</title>
</head>
<body>
    <h1>Mi primera cookie</h1>
    <p><?php echo 'Hola ' . htmlspecialchars($_COOKIE["nombre"]) . '!';?></p>
</body>
</html>