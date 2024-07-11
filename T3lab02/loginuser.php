<?php

if(isset($_POST['email'])&&isset($_POST['password'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        //CONEXION A LA BBDD
        $mysqli = new mysqli("localhost", "root", "", "viuweb");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            header("location:login.php?error=Error en la BBDD");
        }
        //Recuperamos usuario
        $sql="SELECT * FROM usuarios WHERE usuario='${email}'";
        //echo($sql);
        $result=$mysqli->query($sql);
        while($row = $result->fetch_assoc()) {
            if(password_verify($password,$row["password"])){
                session_start();
                $_SESSION["usuario"]=$email;
                header("location:dashboard.php");
            }else{
                header("location:login.php?error=pass incorrecta");
            }
        }
}else{
    header("location:login.php?error=no estan los datos");
}