<?php
$jsonFilePath = __DIR__ . '/../../data/StarluxeTeam.json';

function getAllTeamMembers() {
    global $jsonFilePath;
    $jsonData = file_get_contents($jsonFilePath);
    return json_decode($jsonData, true)['team'];
}

function getTeamMemberByIndex($index) {
    $team = getAllTeamMembers();
    return $team[$index] ?? null;
}


function createTeamMember($name, $role, $bio) {
    global $jsonFilePath;
    $team = getAllTeamMembers();
    $newMember = [
        'name' => $name,
        'role' => $role,
        'bio' => $bio
    ];
    $team[] = $newMember;
    saveTeam($team);
}

function updateTeamMember($index, $name, $role, $bio) {
    $team = getAllTeamMembers();
    $team[$index] = [
        'name' => $name,
        'role' => $role,
        'bio' => $bio
    ];
    saveTeam($team);
}

function deleteTeamMember($index) {
    $team = getAllTeamMembers();
    unset($team[$index]);
    saveTeam(array_values($team));
}

function saveTeam($team) {
    global $jsonFilePath;
    $jsonData = ['team' => $team];
    file_put_contents($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));
}
?>
