<?php

$message = "";

if(isset($_FILES["userfile"])){

    include "../engine/upload.php";
    UploadFile();
    header("Location: /gallery");
    die();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?=$message?><br>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="userfile">
    <input type="submit" value="Загрузить">
</form>

<div class = "myGallery">
    <?php foreach ($photos as $photo): ?>
        <div>
            <a href="<?=$photo['bigPath']?>">
                <img src="<?=$photo['smallPath']?>" alt="фото недоступно">
            </a>
            <h2>
                
            </h2>
        </div>
    <?php endforeach; ?>
    <img src="" alt="">
</div>
</body>
</html>