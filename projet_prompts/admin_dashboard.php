



<?php
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin'){
    header('Location: login.php');
    exit();
}

$totalUsers = $pdo -> query("select count(*) from users")-> fetchcolumn();
$totalCategories = $pdo -> query("select count(*) from categories")->fetchColumn();
$totalPrompts = $pdo -> query("select coun(*) from prompts")->fetchColumn();



?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>
body {
    font-family: Arial;
    margin: 0;
    background: #f4f4f4;
}

.sidebar {
    width: 220px;
    height: 100vh;
    background: #2d3748;
    color: white;
    position: fixed;
    padding: 20px;
}

.sidebar h2 {
    text-align: center;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    margin: 15px 0;
}

.main {
    margin-left: 240px;
    padding: 20px;
}

.cards {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.card {
    background: white;
    padding: 20px;
    flex: 1;
    border-radius: 8px;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background: #667eea;
    color: white;
}
</style>

</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>
    <a href="#">Dashboard</a>
    <a href="#">Users</a>
    <a href="#">Categories</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">

    <h1>Dashboard</h1>

    <div class="cards">
        <div class="card">
            <h3>Users</h3>
            <p><?php echo $totalUsers; ?></p>
        </div>

        <div class="card">
            <h3>Prompts</h3>
            <p><?php echo $totalPrompts; ?></p>
        </div>

        <div class="card">
            <h3>Categories</h3>
            <p><?php echo $totalCategories; ?></p>
        </div>
    </div>

    <!-- Users Table -->
    <h2>Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

    <!-- Categories -->
    <h2>Categories</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>

        <?php foreach ($categories as $cat): ?>
        <tr>
            <td><?php echo $cat['id']; ?></td>
            <td><?php echo $cat['name']; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

</div>

</body>
</html>