<?php
$csvFilePath = __DIR__ . '/../../data/contacts.csv';

function getAllContacts() {
    global $csvFilePath;
    $contacts = [];
    if (($handle = fopen($csvFilePath, 'r')) !== false) {
        $header = fgetcsv($handle);  // Ignores header row
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $contacts[] = [
                'name' => $data[0],
                'email' => $data[1],
                'message' => $data[2]
            ];
        }
        fclose($handle);
    }
    return $contacts;
}

function getContactByIndex($index) {
    $contacts = getAllContacts();
    return $contacts[$index] ?? null;
}
?>
