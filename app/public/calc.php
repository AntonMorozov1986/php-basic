<?php
include './math.php';
$arg1 = 0;
$arg2 = 0;
$result = 0;
$operationList = [
    'add' => 'add',
    'sub' => 'sub',
    'mul' => 'mul',
    'div' => 'div',
    '' => 'add'
];
$operation = $operationList[$_GET['operation']] ?? 'error';
if (!empty($_GET) && $operation !== 'error') {
    $arg1 = (int)$_GET['arg1'];
    $arg2 = (int)$_GET['arg2'];
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
    <h1 class="main-page__title">Калькулятор</h1>
    <h3><?php if ($operation === 'error') echo "Недопустимая операция - $_GET[operation]"?></h3>
    <hr/>
    <form method="GET">
        <input type="number" name="arg1" value="<?=$arg1?>">
        <select name="operation">
            <option value="add" <?php if ($operation === 'add') echo "selected"?>>+</option>
            <option value="sub" <?php if ($operation === 'sub') echo "selected"?>>-</option>
            <option value="mul" <?php if ($operation === 'mul') echo "selected"?>>*</option>
            <option value="div" <?php if ($operation === 'div') echo "selected"?>>/</option>
        </select>
        <input type="number" name="arg2" value="<?=$arg2?>">
        <input type="submit" value="=">
        <input type="text" name="result" value="<?=$result?>" readonly>
    </form>

</main>
</body>
</html>
