<?php
include '../dbConnection.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'not allowed']);
    die();
}

$postData = json_decode(file_get_contents('php://input'));
$orderId = $postData->orderId;
$status = 'pending';

function deleteOrderFromDB($orderId)
{
    return getDb()->query("DELETE FROM orders WHERE id = '$orderId'");
}

deleteOrderFromDB($orderId) ? $status = 'success' : $status = 'db error';

$response = [
    'status' => $status
];
header('Content-Type: application/json');
echo json_encode($response);
