<?php
include 'products.php';
$products = getAllProducts();
?>

<h1>All Products</h1>
<a href="create.php" class="btn btn-primary">Create New Product</a>

<table>
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $index => $product): ?>
    <tr>
        <td><?= htmlspecialchars($product['name']); ?></td>
        <td>
            <a href="detail.php?index=<?= $index; ?>">View</a> |
            <a href="edit.php?index=<?= $index; ?>">Edit</a> |
            <a href="delete.php?index=<?= $index; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
