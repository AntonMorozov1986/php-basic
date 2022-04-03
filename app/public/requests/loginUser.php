<?php
include '../dbConnection.php';
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];
$hasUserData = $login !== '' && $pass !== '';
$status = 'pending';

function loginUser($login, $pass, &$status)
{
    $userData = getDb()
        ->query("SELECT pass_hash, role FROM users WHERE login = '$login'")
        ->fetch_all(MYSQLI_ASSOC)[0];
    $isPasswordCorrect = password_verify($pass, $userData['pass_hash']);
    if ($isPasswordCorrect) {
        $_SESSION['user'] = $login;
        $_SESSION['role'] = $userData['role'];
        $status = 'success';
    } else {
        $status = 'error';
    }
}

if (!$hasUserData) {
    echo json_encode([
        'status' => 'error',
    ]);
    die();
}

loginUser($login, $pass, $status);

$response = [
    'status' => $status,
    'result' => $_SESSION
];
header('Content-Type: application/json');
echo json_encode($response);
