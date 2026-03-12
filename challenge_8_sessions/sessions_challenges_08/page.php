

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;    
            justify-content: center; 
            height: 50vh;          
            font-family: Arial, sans-serif;
        }
        label {
            padding: 10px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        form input{
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        form button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
</h2>CHALLENGE</h2>
<form action="page_1.php" method="POST">
<label for="username"> Name : </label> </br>
<input type ="text" id="name" name="username" placeholder="Entrer votre nom">
<button type="submit" >suivant</button>
</form>

</body>
</html>