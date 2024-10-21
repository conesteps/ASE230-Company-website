<?php

$pagesDir = __DIR__ . '/../../data/';

function getAllPages() {
    global $pagesDir;
    $pages = array_diff(scandir($pagesDir), array('.', '..'));
    return $pages;
}

function getPageByName($fileName) {
    global $pagesDir;
    $filePath = $pagesDir . $fileName;
    if (file_exists($filePath)) {
        $content = file($filePath, FILE_IGNORE_NEW_LINES);
        return ['title' => $content[0], 'content' => implode("\n", array_slice($content, 1))];
    }
    return null;
}

function createPage($title, $content) {
    global $pagesDir;
    $fileName = strtolower(str_replace(' ', '_', $title)) . '.txt';
    $filePath = $pagesDir . $fileName;
    $fileContent = $title . "\n" . $content;
    file_put_contents($filePath, $fileContent);
}

function updatePage($fileName, $title, $content) {
    global $pagesDir;
    $filePath = $pagesDir . $fileName;
    $newContent = $title . "\n" . $content;
    file_put_contents($filePath, $newContent);
}

function deletePage($fileName) {
    global $pagesDir;
    $filePath = $pagesDir . $fileName;
    if (file_exists($filePath)) {
        unlink($filePath);
    } else {
        die('File not found.');
    }
}


?>
