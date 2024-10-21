<?php
include 'pages.php';
$pageFile = $_GET['file'];
$page = getPageByName($pageFile);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updatePage($pageFile, $_POST['title'], $_POST['content']);
    header('Location: index.php');
    exit();
}
?>

<form method="POST">
    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($page['title']); ?>" required>
    
    <label>Content:</label>
    <textarea name="content" required><?= htmlspecialchars($page['content']); ?></textarea>
    
    <button type="submit">Save Changes</button>
</form>
