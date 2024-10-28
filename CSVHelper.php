<?php

class CSVHelper {

    // Static method to read all data from the CSV file
    public static function readAll($filePath) {
        $data = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle);  // Skip the header row
            while (($row = fgetcsv($handle)) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }

    // Static method to get a specific entry by index
    public static function readByIndex($filePath, $index) {
        $data = self::readAll($filePath);
        return $data[$index] ?? null;
    }

    // Static method to add a new entity
    public static function create($filePath, $newData) {
        $handle = fopen($filePath, 'a');
        fputcsv($handle, $newData);
        fclose($handle);
    }

    // Static method to update an entity by index
    public static function update($filePath, $index, $updatedData) {
        $data = self::readAll($filePath);
        $data[$index] = $updatedData;
        self::saveAll($filePath, $data);
    }

    // Static method to delete an entity by index
    public static function delete($filePath, $index) {
        $data = self::readAll($filePath);
        unset($data[$index]);
        $data = array_values($data); // Reindex array
        self::saveAll($filePath, $data);
    }

    // Helper method to save all data back to the CSV file
    private static function saveAll($filePath, $data) {
        $handle = fopen($filePath, 'w');
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}
?>
