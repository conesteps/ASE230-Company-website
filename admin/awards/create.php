<?php
include 'awards.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createAward($_POST['year'], $_POST['award'], $_POST['details']);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Year:</label>
    <input type="text" name="year" required>
    
    <label>Award:</label>
    <input type="text" name="award" required>
    
    <label>Details:</label>
    <textarea name="details" required></textarea>
    
    <button type="submit">Create Award</button>
</form>
