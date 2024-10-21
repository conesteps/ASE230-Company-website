<?php

$csvFilePath = __DIR__ . '/../../data/StarluxeAwards.csv';

function getAllAwards() {
    global $csvFilePath;
    $awards = [];
    if (($handle = fopen($csvFilePath, 'r')) !== false) {
		$header = fgetcsv($handle); //Found this online, removes header bar from being listed in index.php
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
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

function getAwardByIndex($index) {
    $awards = getAllAwards();
    return $awards[$index] ?? null;
}

function saveAwards($awards) {
    global $csvFilePath;
    $handle = fopen($csvFilePath, 'w');
    foreach ($awards as $award) {
        fputcsv($handle, [$award['year'], $award['award'], $award['details']]);
    }
    fclose($handle);
}

function createAward($year, $award, $details) {
    $awards = getAllAwards();
    $awards[] = [
        'year' => $year,
        'award' => $award,
        'details' => $details
    ];
    saveAwards($awards);
}

function updateAward($index, $year, $award, $details) {
    $awards = getAllAwards();
    $awards[$index] = [
        'year' => $year,
        'award' => $award,
        'details' => $details
    ];
    saveAwards($awards);
}

function deleteAward($index) {
    $awards = getAllAwards();
    unset($awards[$index]);
    saveAwards(array_values($awards));
}
?>
