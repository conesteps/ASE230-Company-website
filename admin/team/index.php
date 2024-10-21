<?php
include 'team.php';
$team = getAllTeamMembers();
?>

<h1>Team Members</h1>
<a href="create.php" class="btn btn-primary">Add New Team Member</a>

<table>
    <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($team as $index => $member): ?>
    <tr>
        <td><?= htmlspecialchars($member['name']); ?></td>
        <td><?= htmlspecialchars($member['role']); ?></td>
        <td>
            <a href="detail.php?index=<?= $index; ?>">View</a> |
            <a href="edit.php?index=<?= $index; ?>">Edit</a> |
            <a href="delete.php?index=<?= $index; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
