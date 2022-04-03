<?php
include '../dbConnection.php';
session_start();

$sessionId = session_id();
$postData = json_decode(file_get_contents('php://input'));
$goodId = $postData->goodId;
$status = 'pending';

function addGoodToDB($sessionId, $goodId)
{
    return getDb()->query("INSERT INTO cart (session_id, good_id) VALUES ('$sessionId','$goodId')");
}

if ($sessionId && isset($goodId)) {
    addGoodToDB($sessionId, $goodId) ? $status = 'success' : $status = 'db error';
} else {
    $status = 'postData error';
}



$response = [
    'status' => $status,
];
header('Content-Type: application/json');
echo json_encode($response);
