<?php
include 'pages.php';

$pageFile = $_GET['file'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deletePage($_POST['file']);
    header('Location: index.php');
    exit();
}
?>

<h1>Are you sure you want to delete this page?</h1>

<form method="POST">
    <input type="hidden" name="file" value="<?= htmlspecialchars($pageFile); ?>">
    <button type="submit">Yes, Delete</button>
    <a href="index.php">Cancel</a>
</form>
