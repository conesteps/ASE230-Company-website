<?php
include 'team.php';
$member = getTeamMemberByIndex($_GET['index']);
?>

<h1><?= htmlspecialchars($member['name']); ?></h1>
<p><strong>Role:</strong> <?= htmlspecialchars($member['role']); ?></p>
<p><?= nl2br(htmlspecialchars($member['bio'])); ?></p>

<a href="edit.php?index=<?= $_GET['index']; ?>" class="btn btn-warning">Edit</a>
<a href="delete.php?index=<?= $_GET['index']; ?>" class="btn btn-danger">Delete</a>
