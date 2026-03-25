<?php
session_start();

require ("db_prompt.php");
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)){
        $stmt=$pdo->prepare('SELECT * from users where email = :email');
        $stmt->execute([":email" => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if($user){
                    if(password_verify($password,$user['password'])){

                        $_SESSION['user_id']= $user['id'];
                        $_SESSION['user_email'] = $user['email'];
                        $_SESSION['user_name'] = $user['name'];
                        $_SESSION['role'] = $user['role'];
                        
                        if ($user['role'] === 'admin') {
                             header("Location: admin_dashboard.php");
                                    exit();}
                        else {
                            header("Location: user_dashboard.php");
                                        exit();
                                        }
                    }
                    else { $error = 'Invalid password';}}
    else { $error= 'user not found';}
}
else { $error = 'Please fill in all fields';}
     }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

   <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box {
    background: #ffffff;
    padding: 40px;
    width: 350px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    animation: fadeIn 0.5s ease-in-out;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: 0.3s;
    outline: none;
}

input:focus {
    border-color: #667eea;
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
}

button {
    width: 100%;
    padding: 15px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
}

button:hover {
    background: #5a67d8;
}

.error {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}

a {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #667eea;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

</head>
<body>

<div class="login-box">

    <h2>Login</h2>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <a href="register.php">Create account</a>

</div>

</body>
</html>