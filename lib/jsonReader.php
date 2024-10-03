<?php
// Function to read data from a JSON file
function readJSON($filePath) {
    // Check if the file exists
    if (!file_exists($filePath)) {
        return "File not found.";
    }

    // Get the contents of the file
    $content = file_get_contents($filePath);

    // Decode the JSON data into an associative array
    $jsonData = json_decode($content, true);

    // Check for JSON decoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        return "Invalid JSON data.";
    }

    // Return the decoded JSON data
    return $jsonData;
}
//DELETE LATER
// Example usage
// $jsonData = readJSON('path/to/data.json');
// print_r($jsonData);
?>
