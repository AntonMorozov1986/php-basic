<?php
include '../dbConnection.php';
session_start();

$postData = json_decode(file_get_contents('php://input'));
$goodId = $postData->goodId;
$status = 'pending';

function deleteGoodFromDB($goodId)
{
    return getDb()->query("DELETE FROM cart WHERE id = '$goodId'");
}

deleteGoodFromDB($goodId) ? $status = 'success' : $status = 'db error';



$response = [
    'status' => $status,
];
header('Content-Type: application/json');
echo json_encode($response);
