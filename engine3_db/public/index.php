<?php

//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index

$url_array = explode('/', $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

///$page = $_GET['page'] ?? "index";

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [];
$layout = 'layout';

switch ($page) {
    case 'index':
        $params['name'] = 'Вася';
        break;

    case 'news':
//        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
//            $id = (int)$_GET['id'];
//            $result = mysqli_query($db, "DELETE FROM news WHERE id = $id");
//            header("Location: index.php");
//            die();
//        }
        $params['news'] = getNews();

        break;

    case 'onenews':
        $id = (int)$_GET['id'];

        $params['news'] = getOneNews($id);
        break;

    case 'catalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        break;

    case 'apicatalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        exit;

    case 'about':
        break;

    default:
        echo "404";
        die();
}




echo render($page, $params, $layout);


