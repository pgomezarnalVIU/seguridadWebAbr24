<?php
function productoVulnerable(){
    if(isset($_GET['product'])){
            $product=$_GET['product'];
            //CONEXION A LA BBDD
            $mysqli = new mysqli("localhost", "root", "", "laravelP04");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                header("location:login.php?error=Error en la BBDD");
            }
            //Recuperamos product
            $sql="SELECT * FROM products WHERE id=$product";
            echo($sql);
            $result=$mysqli->query($sql);
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            return $product=json_encode($rows);
    }else{
        return $product='[]';
    }
}
function productoPDO(){
    if(isset($_GET['product'])){
        $product=$_GET['product'];
        //CONEXION A LA BBDD
        try{
            $dsn = "mysql:host=localhost;dbname=laravel04";
            $pdo = new PDO($dsn, "root", "");
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        //Recuperamos product
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id=:product");
        $stmt->execute(array('product'=>$product)); 
        $r=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $product=json_encode($r);
}else{
    return $product='[]';
}
}
$product=productoPDO();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show product</title>
</head>
<body>
    <p><?=$product?></p>
</body>
</html>