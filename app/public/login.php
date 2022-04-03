<?php
include './dbConnection.php';
session_start();

var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main-page">
    <a href="/">Home</a>
    <a href="/catalog.php">Catalog</a>
    <hr/>
    <form autocomplete="on" id="login-form">
        <input type="text" placeholder="Login" name="login">
        <input type="password" placeholder="password" name="pass">
        <input type="submit" value="Войти">
    </form>
    <span>Еще не регистрировались?</span><a href="/registration.php">Зарегистрироваться</a>
</div>
<script src="./js/sendRequest.js"></script>
<script src="./js/loginUser.js"></script>
</body>
</html>
