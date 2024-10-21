<?php
include 'awards.php';
$award = getAwardByIndex($_GET['index']);
?>

<h1><?= htmlspecialchars($award['award']); ?></h1>
<p><strong>Year:</strong> <?= htmlspecialchars($award['year']); ?></p>
<p><?= nl2br(htmlspecialchars($award['details'])); ?></p>

<a href="edit.php?index=<?= $_GET['index']; ?>" class="btn btn-warning">Edit</a>
<a href="delete.php?index=<?= $_GET['index']; ?>" class="btn btn-danger">Delete</a>
