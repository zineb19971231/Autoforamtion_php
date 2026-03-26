<?php
session_start();
require("db_prompt.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$totalUsers = $pdo->query("SELECT count(*) FROM users")->fetchColumn();
$totalCategories = $pdo->query("SELECT count(*) FROM categories")->fetchColumn();
$totalPrompts = $pdo->query("SELECT count(*) FROM prompts")->fetchColumn();

$plusActifs = $pdo->query("SELECT u.name, COUNT(p.id) AS total FROM users u INNER JOIN prompts p ON u.id = p.user_id GROUP BY u.name ORDER BY total DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
$prompts = $pdo->query("SELECT p.*, users.name , c.name as category_name FROM prompts p INNER JOIN users ON p.user_id = users.id INNER JOIN categories c on p.categorie_id = c.id")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <title>Admin Dashboard</title>
    
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <img src="" alt="" class="profile-img">
        <div class="profile-info">
            <strong><?= htmlspecialchars($_SESSION['user_name']); ?></strong>
            <small><?= htmlspecialchars($_SESSION['user_email']); ?></small>
        </div>
    </div>

    <div class="nav-links">
        <a href="dashboard.php" class="active"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
        <a href="gestion_categories.php"><i class="fa-solid fa-tags"></i> Categories</a>
        <a href="contributors.php"><i class="fa-solid fa-users-gear"></i> Contributors</a>
    </div>

    <div class="logout-area">
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<div class="main">
    <div class="cards">
        <div class="card"><h3>Users</h3><p><?= $totalUsers; ?></p></div>
        <div class="card"><h3>Prompts</h3><p><?= $totalPrompts; ?></p></div>
        <div class="card"><h3>Categories</h3><p><?= $totalCategories; ?></p></div>
        <div class="card">
            <h3>Top Contributor</h3>
            <p>
                <?php if (!empty($plusActifs)): ?>
                    <?= htmlspecialchars($plusActifs[0]['name']); ?> 
                    <span style="font-size: 0.8rem; color: #64748b;">(<?= $plusActifs[0]['total']; ?>)</span>
                <?php else: ?>
                    ---
                <?php endif; ?>
            </p>
        </div>
    </div>
      <h2>Prompts List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Prompt Title</th>
                <th>Contributor</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prompts as $prompt): ?>
            <tr>
                <td>#<?= $prompt['id']; ?></td>
                <td><?= htmlspecialchars($prompt['title']); ?></td>
                <td><?= htmlspecialchars($prompt['name']); ?></td>
                <td><?= htmlspecialchars($prompt['category_name']); ?></td>
                <td>
                    <a href="javascript:void(0)" 
                       onclick="showDetails('<?= htmlspecialchars(addslashes($prompt['content'])); ?>', '<?= $prompt['created_at']; ?>')" 
                       style="color: var(--primary); text-decoration: none; font-weight: 600;">
                       <i class="fa-solid fa-eye"></i> Details
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Users List</h2>
    <table>
        <thead>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td>#<?= $user['id']; ?></td>
                <td><?= htmlspecialchars($user['name']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
                <td><?= htmlspecialchars($user['role']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  
</div>

<div id="detailsModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Prompt Details</h3>
            <span class="close-btn" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <p><strong>Creation Date :</strong> <span id="modalDate" style="color: var(--primary);"></span></p>
            <div style="margin-top: 15px;">
                <strong>Prompt Content :</strong>
                <div id="modalText" style="margin-top: 10px;"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button onclick="closeModal()" class="btn-close-modal">Close</button>
        </div>
    </div>
</div>

<script>
function showDetails(content, date) {
    document.getElementById('modalDate').innerText = date;
    document.getElementById('modalText').innerText = content;
    document.getElementById('detailsModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('detailsModal').style.display = 'none';
}

window.onclick = function(event) {
    let modal = document.getElementById('detailsModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>

</body>
</html>