<?php
include 'products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteProduct($_POST['index']);
    header('Location: index.php');
    exit();
}
?>

<h1>Are you sure you want to delete this product?</h1>

<form method="POST">
    <input type="hidden" name="index" value="<?= $_GET['index']; ?>">
    <button type="submit">Yes, Delete</button>
    <a href="index.php">Cancel</a>
</form>