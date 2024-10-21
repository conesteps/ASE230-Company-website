<?php

$dataDir = __DIR__ . '/../../data/';

function getTxtFiles($directory) {
    $files = scandir($directory);
    $txtFiles = [];

    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
            $txtFiles[] = $file;
        }
    }

    return $txtFiles;
}

$txtFiles = getTxtFiles($dataDir);
?>

<h1>All Pages</h1>
<a href="create.php" class="btn btn-primary">Create New Page</a>

<table>
    <tr>
        <th>Title</th>
        <th>Action</th>
    </tr>
    <?php foreach ($txtFiles as $file): ?>
        <?php 
        $filePath = $dataDir . $file;
        $fileContent = file($filePath);
        $title = trim($fileContent[0]);
        ?>
        <tr>
            <td><?= htmlspecialchars($title); ?></td>
            <td>
                <a href="detail.php?file=<?= urlencode($file); ?>">View</a> |
                <a href="edit.php?file=<?= urlencode($file); ?>">Edit</a> |
                <a href="delete.php?file=<?= urlencode($file); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
