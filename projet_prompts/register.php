<?php
require("db_prompt.php");

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if (!empty($name) && !empty($email) && !empty($password)) {

        $check = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $check->execute([':email' => $email]);

        if ($check->fetch()) {
            $message = "Email already exists";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashedPassword
            ]);

            $message = "Account created successfully";
        }

    } else {
        $message = "Please fill all fields";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Register</title>

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.register-box {
    background: white;
    padding: 40px;
    width: 350px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 12px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    background: #5a67d8;
}

.message {
    text-align: center;
    margin-bottom: 10px;
    color: green;
}

.success {
    color: green;
}

a {
    display: block;
    text-align: center;
    margin-top: 10px;
}
</style>

</head>
<body>

<div class="register-box">

<h2>Create Account</h2>

<?php if ($message): ?>
    <p class="message"><?php echo $message; ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<a href="login.php">Already have an account? Login</a>

</div>

</body>
</html>