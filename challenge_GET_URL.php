<?php 

$products = [
    ["nom" => "LAPTOP", "categorie" => "Tech"],
    ["nom" => "SMARTPHONE", "categorie" => "Tech"],
    ["nom" => "CHAIR", "categorie" => "furniture"],
    ["nom" => "LAMP", "categorie" => "furniture"]
];
 
$sort="asc";
if(isset($_GET["sort"]) ){
    $sort = $_GET["sort"];
}
else {
    $sort = "asc";
}

$noms = array_column($products, 'nom');

if ($sort === "desc") {
    array_multisort($noms, SORT_DESC, $products);
} else {
    array_multisort($noms, SORT_ASC, $products);
}


?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        h3 {
         color : #4e0707;
        text-align: center;
        font-size: 30px;
        }
        table {
            width: 100%;
            max-width: 600px;
            border-collapse: collapse; 
            margin-top: 20px;
            margin: auto;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:hover {
            background-color: #f9f9f9; 
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #42824b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h3>Products</h3>
    <!-- Links for sorting and filtering -->
    <a href="?sort=asc">sort Ascending (A-Z)</a>
    <a href="?sort=desc">sort Descending (Z-A)</a>
    <a href="?categorie=Tech">Tech</a>
    <a href="?categorie=furniture">Furniture</a>

    <table border="2">
     <thead>
        <tr><th>NOM</th>
           <th>CATEGORIE</th>
        </tr>
     </thead>
     <tbody>
        <?php foreach( $products as $p ): ?>
            <?php if (isset($_GET["categorie"]) && $p["categorie"] == $_GET["categorie"]) : ?>
              <tr>
                <td> <?php echo $p["nom"] ?></td>
                <td> <?php  echo $p["categorie"] ?></td>
              </tr>  
            <?php endif; ?>
            <?php if (!isset($_GET["categorie"])): ?>
              <tr>
                <td> <?php echo $p["nom"] ?></td>
                <td> <?php  echo $p["categorie"] ?></td>
              </tr>
            <?php endif; ?>
        <?php endforeach; ?>
     </tbody>
    </table>
</body>
</html>