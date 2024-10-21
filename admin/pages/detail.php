<?php
include 'pages.php';
$pageFile = $_GET['file'];
$page = getPageByName($pageFile);
?>

<h1><?= htmlspecialchars($page['title']); ?></h1>
<p><?= nl2br(htmlspecialchars($page['content'])); ?></p>

<a href="edit.php?file=<?= urlencode($pageFile); ?>" class="btn btn-warning">Edit</a>
<a href="delete.php?file=<?= urlencode($pageFile); ?>" class="btn btn-danger">Delete</a>
