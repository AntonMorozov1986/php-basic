<?php
include './dbConnection.php';
const GALLERY_IMG = './gallery_img';


function getImage($db, $imageId)
{
    return $db->query("SELECT * FROM images WHERE id = $imageId");
}

function updateImageViews($db, $imageId)
{
    $db->query("UPDATE images SET views = views + 1 WHERE id = $imageId");
}
$id = (int) $_GET['id'];
updateImageViews($db, $id);
$resultSqlQuery = getImage($db, $id);
$image = mysqli_fetch_assoc($resultSqlQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson05</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main-page">
    <a href="/">Назад</a>
    <img src="<?=GALLERY_IMG?>/big/<?=$image['file_name']?>" />
    <h4>Просмотров: <?=$image['views']?></h4>
</div>
</body>
</html>
