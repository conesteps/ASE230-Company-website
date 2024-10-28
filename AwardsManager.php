<?php

class AwardsManager {
    private $csvFilePath;

    // Constructor to initialize the path to the CSV file
    public function __construct($csvFilePath) {
        $this->csvFilePath = $csvFilePath;
    }

    // Get all awards from the CSV file
    public function getAllAwards() {
        $awards = [];
        if (($handle = fopen($this->csvFilePath, 'r')) !== false) {
            $header = fgetcsv($handle); // Ignore header
            while (($data = fgetcsv($handle)) !== false) {
                $awards[] = [
                    'year' => $data[0],
                    'award' => $data[1],
                    'details' => $data[2]
                ];
            }
            fclose($handle);
        }
        return $awards;
    }

    // Get a specific award by index
    public function getAwardByIndex($index) {
        $awards = $this->getAllAwards();
        return $awards[$index] ?? null;
    }

    // Add a new award
    public function addAward($year, $award, $details) {
        $awards = $this->getAllAwards();
        $awards[] = ['year' => $year, 'award' => $award, 'details' => $details];
        $this->saveAwards($awards);
    }

    // Update an existing award by index
    public function updateAward($index, $year, $award, $details) {
        $awards = $this->getAllAwards();
        $awards[$index] = ['year' => $year, 'award' => $award, 'details' => $details];
        $this->saveAwards($awards);
    }

    // Delete an award by index
    public function deleteAward($index) {
        $awards = $this->getAllAwards();
        unset($awards[$index]);
        $this->saveAwards(array_values($awards));  // Reindex array
    }

    // Helper function to save awards back to the CSV file
    private function saveAwards($awards) {
        if (($handle = fopen($this->csvFilePath, 'w')) !== false) {
            fputcsv($handle, ['Year', 'Award', 'Details']); // Write header
            foreach ($awards as $award) {
                fputcsv($handle, [$award['year'], $award['award'], $award['details']]);
            }
            fclose($handle);
        }
    }
}
?>
