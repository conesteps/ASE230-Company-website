<?php
include 'products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applications = json_decode($_POST['applications'], true);  // Assuming applications are JSON-formatted
    createProduct($_POST['name'], $_POST['description'], $applications);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Description:</label>
    <textarea name="description" required></textarea>
    
    <label>Applications (JSON format):</label>
    <textarea name="applications" required></textarea>
    
    <button type="submit">Create Product</button>
</form>
