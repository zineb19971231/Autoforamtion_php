
<?php 
$emailinput = "";
$nameinput = "";
$emailerr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$emailinput = $_POST["email"];
$nameinput = $_POST["name"];

        if (!str_contains($emailinput , "@")){
        $emailerr = " this Email doesn't contain @" ;
        $nameinput = $_POST["name"];}
        else {
            $emailerr ="successfully sent";
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e2e5ea;
        display: flex;
        flex-direction: column; 
        justify-content: center; 
        align-items: center;
        min-height: 100vh; 
        margin: 0;
    }

    /* Modifie ton H3 ici */
    h3 {
        color: #4e0707;
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px; /* Changé de 100% à 20px */
    }

    /* Style pour le message d'erreur (ton span) */
    span {
        color: #d93025;
        background: <?php echo $emailerr ? '#f8d7da' : 'transparent'; ?>;
        padding: <?php echo $emailerr ? '10px 20px' : '0'; ?>;
        border-radius: 8px;
        margin-bottom: 20px;
        display: block;
        font-weight: bold;
    }

    form {
        background: white;
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 400px; 
    }

    /* Le reste de tes styles (label, input, button) est parfait tel quel */
    label {
        display: block;
        margin-bottom: 8px;
        margin-left: 5px;
        font-weight: bold;
        color: #333;
    }

    input {
        display: block; 
        width: 100%;    
        padding: 15px;
        margin-bottom: 20px; 
        border: 2px solid #ddd;
        border-radius: 12px;
        box-sizing: border-box; 
        font-size: 16px;
    }
    textarea {
        height: 120px;
        resize: none;
        height: 250px;
        width: 100%;
        border-radius: 10px;
           
    }

    button {
        width: 100%;
        padding: 15px;
        background-color: #415ff5;
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
</head>
<body>
    <h3>Contact Form</h3>
    <span><?php echo $emailerr; ?></span>
    <form action="" method="POST">
      <label for="name">Name :</label>
      <input type="text" id="name" name="name" value="<?php echo $nameinput; ?>" required>

     <label for="email">Email :</label>
      <input type="text"  name="email" required>
      <label for="message">Message :</label>
      <textarea name="message" id="message" placeholder="Your message here..." required> 
        
      </textarea>
      <button type="submit">Send</button>
    </form>
</body>
</html>