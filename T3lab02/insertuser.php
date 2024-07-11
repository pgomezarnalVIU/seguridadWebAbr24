<?php
    if(isset($_POST['email'])&&isset($_POST['password'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password_db=password_hash($password, PASSWORD_DEFAULT);
        //CONEXION A LA BBDD
        $mysqli = new mysqli("localhost", "root", "", "viuweb");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            header("location:register.php?error=Error en la BBDD");
        }
        $sql="INSERT INTO usuarios(usuario,password) VALUES ('${email}','${password_db}')";
        //debug
        //echo $sql;
        $mysqli->query($sql);
        //Crearia la sesion
        session_start();
        $_SESSION["usuario"]=$email;
        header("location:dashboard.php");
    }else{
        header("location:register.php?error=Faltan datos");
    }