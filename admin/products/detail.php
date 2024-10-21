<?php
include 'products.php';
$product = getProductByIndex($_GET['index']);
?>

<h1><?= htmlspecialchars($product['name']); ?></h1>
<p><?= nl2br(htmlspecialchars($product['description'])); ?></p>

<h3>Applications:</h3>
<ul>
    <?php foreach ($product['applications'] as $application): ?>
    <li><strong><?= htmlspecialchars($application['name']); ?>:</strong> <?= htmlspecialchars($application['description']); ?></li>
    <?php endforeach; ?>
</ul>

<a href="edit.php?index=<?= $_GET['index']; ?>" class="btn btn-warning">Edit</a>
<a href="delete.php?index=<?= $_GET['index']; ?>" class="btn btn-danger">Delete</a>
