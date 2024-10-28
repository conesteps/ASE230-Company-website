<?php

class PagesManager {
    private $pagesDir;

    // Constructor to initialize the directory where text files are stored
    public function __construct($pagesDir) {
        $this->pagesDir = $pagesDir;
    }

    // Get all pages (read all .txt files in the directory)
    public function getAllPages() {
        $pages = [];
        $files = scandir($this->pagesDir);
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
                $pages[] = $this->readPage($file);
            }
        }
        return $pages;
    }

    // Get a specific page by its filename
    public function getPageByFilename($fileName) {
        return $this->readPage($fileName);
    }

    // Add a new page (create a new .txt file)
    public function addPage($fileName, $title, $content) {
        $filePath = $this->pagesDir . $fileName;
        file_put_contents($filePath, $title . "\n" . $content);
    }

    // Update an existing page
    public function updatePage($fileName, $title, $content) {
        $filePath = $this->pagesDir . $fileName;
        file_put_contents($filePath, $title . "\n" . $content);
    }

    // Delete a page (delete a .txt file)
    public function deletePage($fileName) {
        $filePath = $this->pagesDir . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Helper function to read a page from a .txt file
    private function readPage($fileName) {
        $filePath = $this->pagesDir . $fileName;
        $lines = file($filePath, FILE_IGNORE_NEW_LINES);
        return [
            'fileName' => $fileName,
            'title' => $lines[0],
            'content' => implode("\n", array_slice($lines, 1))
        ];
    }
}
?>
