<?php
function readTxt($filePath) {
    if (!file_exists($filePath)) {
        return "File not found.";
    }

    $txtData = file_get_contents($filePath);

    return $txtData;
}
//DELETE LATER
// Example usage
// $plainTextData = readPlainText('path/to/textfile.txt');
// echo $plainTextData;
?>
