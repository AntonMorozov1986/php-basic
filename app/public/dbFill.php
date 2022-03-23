<?php
include './dbConnection.php';

const GALLERY_IMG = './gallery_img';
$smallImagesDir = scandir(GALLERY_IMG . '/small');
$images = array_splice($smallImagesDir, 2);
$sqlQuery = "INSERT INTO images (file_name) VALUES ";
foreach ($images as $image) {
    $sqlQuery .= "('$image'), ";
}

$sqlQuery = substr($sqlQuery, 0, -2);

$result = $db->query($sqlQuery);
var_dump($result);
