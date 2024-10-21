<?php
include 'contacts.php';
$contact = getContactByIndex($_GET['index']);
?>

<h1>Contact Details</h1>

<p><strong>Name:</strong> <?= htmlspecialchars($contact['name']); ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($contact['email']); ?></p>
<p><strong>Message:</strong></p>
<p><?= nl2br(htmlspecialchars($contact['message'])); ?></p>

<a href="index.php" class="btn btn-secondary">Back to Contacts</a>
