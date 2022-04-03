<?php
include './dbConnection.php';
session_start();

var_dump($_SESSION['user']);
var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registration</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main-page">
    <a href="/">Home</a>
    <a href="/catalog.php">Catalog</a>
    <hr/>
    <form id="registration-form">
        <input type="text" placeholder="Login" name="login">
        <input type="password" placeholder="password" name="pass">
        <input type="submit" value="Зарегистрироваться">
    </form>
    <span>Уже есть данные для входа?</span><a href="/login.php">Войти</a>
</div>
<script src="./js/sendRequest.js"></script>
<script src="./js/registerUser.js"></script>
</body>
</html>
