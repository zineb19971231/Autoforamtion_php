<?php 

$host ='localhost';
$username = 'root';
$password ='';
$dbname='db_books';
try {

 $pdo=new PDO("mysql:host=$host; dbname=$dbname",$username,$password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo"database connected";


    }
    catch (PDOException $e){
    die("database connection failed: " . $e->getMessage());

}


?>