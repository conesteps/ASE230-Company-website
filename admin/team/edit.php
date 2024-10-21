<?php
include 'team.php';
$member = getTeamMemberByIndex($_GET['index']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateTeamMember($_GET['index'], $_POST['name'], $_POST['role'], $_POST['bio']);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($member['name']); ?>" required>
    
    <label>Role:</label>
    <input type="text" name="role" value="<?= htmlspecialchars($member['role']); ?>" required>
    
    <label>Bio:</label>
    <textarea name="bio" required><?= htmlspecialchars($member['bio']); ?></textarea>
    
    <button type="submit">Save Changes</button>
</form>
