<?php
include 'team.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createTeamMember($_POST['name'], $_POST['role'], $_POST['bio']);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Role:</label>
    <input type="text" name="role" required>
    
    <label>Bio:</label>
    <textarea name="bio" required></textarea>
    
    <button type="submit">Add Team Member</button>
</form>
