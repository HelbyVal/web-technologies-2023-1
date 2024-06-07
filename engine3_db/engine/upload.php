<?php

use \Gumlet\ImageResize;

function UploadFile() {

  $uploaddirBig = '../public/img/big/'; // Relative path under webroot
  $uploaddirSmall = '../public/img/small/';
  $uploadfile = $uploaddirBig . basename($_FILES['userfile']['name']);
  $uploadfileSmall = $uploaddirSmall . basename($_FILES['userfile']['name']);

  var_dump($uploadfile);
  //Проверка существует ли файл
  if (file_exists($uploadfile)) { echo "Файл $uploadfile существует, выберите другое имя файла!"; return False;} 
  
  //Проверка на размер файла 
      if($_FILES["userfile"]["size"] > 1024*10*1024)
      {
        echo ("Размер файла не больше 10 мб");
        return False;
      }
  //Проверка расширения файла
  $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
    if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
      echo "Загрузка php-файлов запрещена!";
      return False;
      }
    }
  //Проверка на тип файла
  $imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
    if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
    echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
    return False;
    }
  
    if($_FILES['userfile']['type'] != "image/jpeg") {
      echo "Можно загружать только jpg-файлы.";
      return False;
    }
    
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

      $image = new ImageResize($uploadfile);
      $image->resizeToWidth(300);
      $image->save($uploadfileSmall);

      echo "Файл успешно загружен.\n";
      return True;
    } else {
      echo "Загрузка не получилась.\n";
      return False;
    }
}

?>


