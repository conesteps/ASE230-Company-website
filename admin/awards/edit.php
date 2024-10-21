<?php
include 'awards.php';
$award = getAwardByIndex($_GET['index']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateAward($_GET['index'], $_POST['year'], $_POST['award'], $_POST['details']);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Year:</label>
    <input type="text" name="year" value="<?= htmlspecialchars($award['year']); ?>" required>
    
    <label>Award:</label>
    <input type="text" name="award" value="<?= htmlspecialchars($award['award']); ?>" required>
    
    <label>Details:</label>
    <textarea name="details" required><?= htmlspecialchars($award['details']); ?></textarea>
    
    <button type="submit">Save Changes</button>
</form>
