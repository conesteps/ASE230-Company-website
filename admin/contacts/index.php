<?php
include 'contacts.php';
$contacts = getAllContacts();
?>

<h1>Contact Requests</h1>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($contacts as $index => $contact): ?>
    <tr>
        <td><?= htmlspecialchars($contact['name']); ?></td>
        <td><?= htmlspecialchars($contact['email']); ?></td>
        <td>
            <a href="detail.php?index=<?= $index; ?>">View</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
