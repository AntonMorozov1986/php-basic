<?php
session_start();
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
} else {
    $_SESSION['counter']++;
}
$postData = file_get_contents('php://input');
$goodId = json_decode($postData)->goodId;
$response = [
    'status' => 'success',
    'goodId' => $goodId,
    'session' => $_SESSION
];
header('Content-Type: application/json');
echo json_encode($response);
