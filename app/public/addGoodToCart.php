<?php
session_start();
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
} else {
    $_SESSION['counter']++;
}
$sessionId = session_id();
$postData = json_decode(file_get_contents('php://input'));
$response = [
    'status' => 'success',
    'postData' => $postData,
    'session' => $_SESSION,
    'id' => $sessionId
];
header('Content-Type: application/json');
echo json_encode($response);
