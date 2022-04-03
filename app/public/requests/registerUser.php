<?php
include '../dbConnection.php';
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];
$hasUserData = $login !== '' && $pass !== '';
$status = 'pending';

function registerUser($login, $pass)
{
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    return getDb()->query("INSERT INTO users (login, pass_hash) VALUES ('$login','$passHash')");
}

if (!$hasUserData) {
    echo json_encode([
        'status' => 'error',
    ]);
    die();
}

registerUser($login, $pass) ? $status = 'success' : $status = 'db error';

if ($status === 'success') {
    $_SESSION['user'] = $login;
}

$response = [
    'status' => $status,
];
header('Content-Type: application/json');
echo json_encode($response);
