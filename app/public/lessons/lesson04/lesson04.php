<?php
include('classSimpleImage.php');
const GALLERY_IMG = 'gallery_img';

//
$images = array_splice(scandir(GALLERY_IMG . '/small'), 2);
$messages = [
    'ok' => 'File is uploaded successfully.',
    'error' => 'File upload error.',
    'badFile' => 'Only jpeg, jpg, gif and png files are allowed',
    'tooBig' => 'File is too large. Max size is 5 MB',
];

function saveImage(): bool
{
    $imageLoader = new SimpleImage();
    $pathBig = GALLERY_IMG. '/big/' . $_FILES['newImage']['name'];
    $pathSmall = GALLERY_IMG. '/small/' . $_FILES['newImage']['name'];
    $imageLoader->load($_FILES['newImage']['tmp_name']);
    $status = $imageLoader->save($pathBig, $imageLoader->image_type, 75, 0777);
    if ($status) {
        $imageLoader->resizeToWidth(150);
        $status = $imageLoader->save($pathSmall, $imageLoader->image_type, 75, 0777);
    }
    return $status;
}

function checkFileType(): bool
{
    define("AVAILABLE_MIME_TYPES", [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif'
    ]);
    $fileMimeType = mime_content_type($_FILES['newImage']['tmp_name']);
    return in_array($fileMimeType, AVAILABLE_MIME_TYPES, true);
}

function checkFileSize(): bool
{
   return $_FILES["newImage"]["size"] < 5 * 1024 * 1024;
}

if (!empty($_FILES) && $_FILES['newImage']['tmp_name'] !== '') {
    if (!checkFileType()) {
        $status = 'badFile';
    } elseif (!checkFileSize()) {
        $status = 'tooBig';
    } elseif (saveImage()) {
        $status = 'ok';
    } else {
        $status = 'error';
    }
    header("Location: lesson04.php?status=$status");
    die();
}

$message = $messages[$_GET['status']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson04</title>
    <link rel="stylesheet" href="lesson04.css">
</head>
<body>
<div class="main-page">
    <a href="/">Home</a>
    <h1>Урок 4</h1>
    <h3><?=$message?></h3>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="newImage">
        <input type="submit" value="Загрузить">
    </form>
    <div class="gallery">
        <?php foreach ($images as $image):?>
        <a rel="gallery" class="photo" href="<?=GALLERY_IMG?>/big/<?=$image?>" target="_blank"><img src="<?=GALLERY_IMG?>/small/<?=$image?>" width="150" height="100" /></a>
        <?php endforeach;?>
    </div>
</div>
</body>
</html>
