<?php
include 'awards.php';
$awards = getAllAwards();
?>

<h1>All Awards</h1>
<a href="create.php" class="btn btn-primary">Create New Award</a>

<table>
    <tr>
        <th>Year</th>
        <th>Award</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($awards as $index => $award): ?>
    <tr>
        <td><?= htmlspecialchars($award['year']); ?></td>
        <td><?= htmlspecialchars($award['award']); ?></td>
        <td>
            <a href="detail.php?index=<?= $index; ?>">View</a> |
            <a href="edit.php?index=<?= $index; ?>">Edit</a> |
            <a href="delete.php?index=<?= $index; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
