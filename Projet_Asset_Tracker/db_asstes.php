<?php
$host = 'localhost';
$username = 'root';
$password='';
$db_name='db_assets';


try {
   $pdo = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo 'database assets connected';
}

catch (PDOException $e) {
    die("database connection failed: " . $e->getMessage());
}

?>