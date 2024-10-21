<?php
include 'pages.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createPage($_POST['title'], $_POST['content']);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Title:</label>
    <input type="text" name="title" required>
    
    <label>Content:</label>
    <textarea name="content" required></textarea>
    
    <button type="submit">Create</button>
</form>
