<?php 

include("db_assets.php");
include("functions_assets.php");


$allcategories = getCategories($pdo);

$allcategories = getCategories($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serialInput = $_POST['serial'] ?? '';
    $nameInput = $_POST['name'] ?? '';
    $priceInput = $_POST['price'] ?? '';
    $selectedcategory = $_POST['category'] ?? '';
    $selectedStatus = $_POST['etat'] ?? '';

    $result = addAsset($pdo, $serialInput, $nameInput, $priceInput, $selectedcategory, $selectedStatus);

    if ($result) {
        echo '<p class="success">Asset ajouté avec succès !</p>';
    } else {
        echo '<p class="error">Erreur lors de l\'ajout de l\'asset.</p>';
    }
}

?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
        padding: 20px;
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        max-width: 400px;
        margin: 0 auto;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    input, select, button {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 14px;
        box-sizing: border-box;
    }

    button {
        background-color: #28a745;
        color: #fff;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #218838;
    }

    .success {
        color: green;
        font-weight: bold;
        text-align: center;
    }

    .error {
        color: red;
        font-weight: bold;
        text-align: center;
    }
</style>

<form method="POST" action="addnewasset.php">

    <label for="serial">Numéro de série</label>
    <input type="text" name="serial" id="serial" required>

    <label for="name">Nom de l’asset</label>
    <input type="text" name="name" id="name" required>

    <label for="price">Prix</label>
    <input type="number" name="price" id="price" required>

    <label for="category">Catégorie</label>
    <select name="category" id="category" required>
        <option value="">Choisir une catégorie</option>
        <?php foreach($allcategories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name_cat']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="etat">Statut</label>
    <select name="etat" id="etat" required>
        <option value="">Choisir un statut</option>
        <option value="Available">Available</option>
        <option value="Deployed">Deployed</option>
        <option value="Repair">Repair</option>
    </select>

    <button type="submit">Ajouter</button>
</form>