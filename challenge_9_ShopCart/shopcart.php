<?php 
 session_start();

if(!isset($_SESSION['cart'])){
 $_SESSION['cart']=[];
}


// ajouter les produits au panier 
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){

     $id = $_POST['id'];
          if (in_array($id,$_SESSION['cart'])){
       $_SESSION['error'] =  "item " . $id . "already exists in the cart";
        }else{
            $_SESSION['cart'][] = $id;  
      header("location: shopcart.php");
      exit();

 }
 }

 $items = [
    ["id" => 1 , "name" => "pants" , "price" => 120],
    ["id" => 2 , "name"=> "shirt" , "price" => 140],
    ["id"=> 3 , "name"=> "shoes" , "price"=> 230.0],
 ];




?>

<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
    <h2>SHOP CART</h2>
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; 
        else: $_SESSION['error'] = null;
 ?>
    <?php endif; ?>
    <h3>TOTALE ITEM <?php echo count($_SESSION['cart']); ?></h3>
    <ul>
        <?php foreach( $items as $item) : ?>
            <li>
                <strong><?php echo $item['name'] ?></strong> - <?php echo $item['price']."$" ?>
             <form action="shopcart.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $item["id"] ?>>">
            <button type="submit"> Add to Cart</button>
             </form>

            </li>
            <?php endforeach; ?>
    </ul>

</body>
</html>