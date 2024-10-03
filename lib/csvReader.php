<?php
function readCSV($filePath) {
    // Check if the file exists
    if (!file_exists($filePath)) {
        return "File not found.";
    }

    // Open the CSV file
    $file = fopen($filePath, 'r');
    
    // Read the header row
    $header = fgetcsv($file);

    // Initialize an array to store the CSV data
    $csvData = [];

    // Loop through each row and convert it into an associative array
    while (($row = fgetcsv($file)) !== false) {
        $csvData[] = array_combine($header, $row);
    }

    fclose($file);
    return $csvData;
}

//DELETE LATER
// Example usage
//$csvData = readCSV('path/to/data.csv');
//print_r($csvData);
?>
