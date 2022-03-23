<?php
include './classSimpleImage.php';
include './dbConnection.php';
const GALLERY_IMG = './gallery_img';

$messages = [
    'ok' => 'File is uploaded successfully.',
    'error' => 'File upload error.',
    'badFile' => 'Only jpeg, jpg, gif and png files are allowed',
    'tooBig' => 'File is too large. Max size is 5 MB',
];

function getImagesList($db) {
    return $db->query('SELECT * FROM images ORDER BY views DESC');
}

function loadImage($db): bool
{
    $imageName = $_FILES['newImage']['name'];
    $imageLoader = new SimpleImage();
    $imageLoader->load($_FILES['newImage']['tmp_name']);

    return saveBigImage($imageLoader, $imageName) && saveSmallImage($imageLoader, $imageName) && updateDatabase($db, $imageName);
}

function saveBigImage($imageLoader, $imageName): bool
{
    $pathBig = GALLERY_IMG. '/big/' . $imageName;
    return $imageLoader->save($pathBig, $imageLoader->image_type, 75, 0777);
}

function saveSmallImage($imageLoader, $imageName): bool
{
    $pathSmall = GALLERY_IMG. '/small/' . $imageName;
    $imageLoader->resizeToWidth(150);
    return $imageLoader->save($pathSmall, $imageLoader->image_type, 75, 0777);
}

function updateDatabase($db, $imageName): bool
{
    return $db->query("INSERT INTO images (file_name) VALUES ('$imageName')");
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
    } elseif (loadImage($db)) {
        $status = 'ok';
    } else {
        $status = 'error';
    }
    header("Location: /?status=$status");
    die();
}

$message = $messages[$_GET['status']];
$images = getImagesList($db);
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
    <a href="/">Home</a>
    <h1>Урок 5</h1>
    <h3><?=$message?></h3>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="newImage">
        <input type="submit" value="Загрузить">
    </form>
    <div class="gallery">
        <?php while ($image = mysqli_fetch_assoc($images)):?>
            <a rel="gallery" class="photo" href="./image.php?id=<?=$image['id']?>">
                <img src="<?=GALLERY_IMG?>/small/<?=$image['file_name']?>" width="150" height="100" />
            </a>
        <?php endwhile;?>
    </div>
</div>
</body>
</html>
