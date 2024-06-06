<?php

define("ROOT", dirname(__DIR__));
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost');
define('USER', 'test');
define('PASS', 'test');
define('DB', 'test');

include ROOT . "/engine/functions.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/news.php";
include ROOT . "/engine/classSimpleImage.php";