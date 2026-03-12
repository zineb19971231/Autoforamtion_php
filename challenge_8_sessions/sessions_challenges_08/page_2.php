<?php session_start(); 

$name= $_SESSION["username"];
$favlanguage= $_SESSION["favlanguage"];

if (isset($_POST["favlanguage"])){
    $_SESSION["favlanguage"] = $_POST["favlanguage"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    body {
        font-family: sans-serif;
        text-align: center;
        padding-top: 50px;
    }
    h2 {
        color: blue;
        margin: auto;
    }
    a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        text-decoration: none;
        color: black;
        border-radius: 5px;
    }
</style>
</head>
<body>
</h2 style="color: blue; margin:auto;"> FINAL RESULT </h2>
<p> Hello <?php echo $name; ?> , your favourite programming language is <?php echo $favlanguage;?> </p>
<a href="page.php">RESTART</a>

</form>
</body>
</html>