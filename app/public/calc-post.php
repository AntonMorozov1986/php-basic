<?php
include './math.php';
$arg1 = 0;
$arg2 = 0;
$result = 0;
$operationList = [
    '+' => 'add',
    '-' => 'sub',
    '*' => 'mul',
    '/' => 'div',
    '' => 'add'
];
$operation = $operationList[(string)$_POST['operation']] ?? 'error';
if (!empty($_POST) && $operation !== 'error') {
    $arg1 = (int)$_POST['arg1'];
    $arg2 = (int)$_POST['arg2'];
    $result = mathOperation($arg1, $arg2, $operation);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <title>Calculator</title>
</head>
<body>
<main class="main-page">
    <h1 class="main-page__title">Калькулятор POST</h1>
    <h3><?php if ($operation === 'error') echo "Недопустимая операция - $_GET[operation]"?></h3>
    <hr/>
    <form method="POST">
        <input type="number" name="arg1" value="<?=$arg1?>">
        <input type="submit" name="operation" value="+">
        <input type="submit" name="operation" value="-">
        <input type="submit" name="operation" value="*">
        <input type="submit" name="operation" value="/">
        <input type="number" name="arg2" value="<?=$arg2?>">
        <input type="submit" value="=">
        <input type="text" name="result" value="<?=$result?>" readonly>
    </form>
</main>
</body>
</html>
