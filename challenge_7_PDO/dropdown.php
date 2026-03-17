<?php

include "db.php";
try {

$sqlfetchCatgories = "SELECT * FROM categories";
$stmnt = $pdo -> prepare($sqlfetchCatgories);
$stmnt -> execute ();
$categories = $stmnt -> fetchAll();

 echo "<body>";
    echo "<select name='' id=''>";
    echo "<option value disabled selected>Choose a category</option>";
            foreach($categories as $cat){
            echo "<option value=".$cat['id']."> ".$cat['nom']."</option>";

            }
        echo "</select>";
    echo "</body>";
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>