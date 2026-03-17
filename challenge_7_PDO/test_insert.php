<?php
 include "db.php";
 
 $title ="the great gatsbey";
 $author = "F. Scott Fitzgerald";

try {
    $sqlinsertbook = "INSERT INTO library_books (title,author) values (:title,:author)";
    $stsmt=$pdo->prepare($sqlinsertbook);
    $stsmt->execute([
        ':title' => $title,
        ':author' => $author]);
        
    $lastId = $pdo->lastInsertId();
        echo "Success! Book added with ID: $lastId";

} catch (PDOException $e) {
    echo "". $e->getMessage() ."";
}
 
 
 
 
 
 ?>