<?php
include 'products.php';
$product = getProductByIndex($_GET['index']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applications = json_decode($_POST['applications'], true);  // Assuming applications are JSON-formatted
    updateProduct($_GET['index'], $_POST['name'], $_POST['description'], $applications);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" required>
    
    <label>Description:</label>
    <textarea name="description" required><?= htmlspecialchars($product['description']); ?></textarea>
    
    <label>Applications (JSON format):</label>
    <textarea name="applications" required><?= json_encode($product['applications'], JSON_PRETTY_PRINT); ?></textarea>
    
    <button type="submit">Save Changes</button>
</form>
