<?php

include "db_assets.php";
function getAllAssetsCategory($pdo){
    return $pdo->query("SELECT a.*, c.name_cat FROM assets a inner join categories c on a.category_id = c.id ")->fetchAll() ;
}

function getTotalPrice($pdo){
    return $pdo->query("SELECT sum(price) as total_price FROM assets")->fetchColumn();
}

function searchByName($pdo, $name){
    $sql = "SELECT a.*, c.name_cat FROM assets a 
      inner join categories c on a.category_id = c.id
      WHERE a.name LIKE :name";
    $stmnt = $pdo -> prepare($sql);
    $stmnt -> execute([":name" => "%$name%"]);
    return $stmnt->fetchAll();
}

?>