<?php

define("ROOT", dirname(__DIR__));
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'lesson20');

include ROOT . "/engine/functions.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/news.php";
include ROOT . "/engine/classSimpleImage.php";
include ROOT . "/engine/Image.php";
include ROOT . "/engine/ImageResize.php";
include ROOT . "/engine/ImageResizeException.php";
include ROOT . "/engine/Data.php";
