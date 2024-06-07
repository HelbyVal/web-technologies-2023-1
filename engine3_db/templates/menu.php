<?php
    $arrayMenu = [
        "mainMenu" => [
            "link" => " ",
            "name" => "Главная",
            "childs" => []
        ],
        "catalog" => [
            "link" => "catalog",
            "name" => "Каталог",
            "childs" => []
        ],
        "about" => [
            "link" => "about",
            "name" => "О нас",
            "childs" => []
        ],
        "news" => [
            "link" => "news",
            "name" => "Новости",
            "childs" => []
        ],
        "apicatalog" => [
            "link" => "apicatalog",
            "name" => "api Test",
            "childs" => []
        ],
        "tasks" => [
            "link" => "tasks",
            "name" => "Задания",
            "childs" => []
        ],
        "gallery" => [
            "link" => "gallery",
            "name" => "Галлерия",
            "childs" => []
        ],
    ];

    function generateMenus($menu) {
        $result = "<ul>";
        foreach ($menu as $key => $page) {
            $result = $result . "<li>" . "<a href= /" . $page["link"] . ">" . $page["name"]. "</a>";
            if(count($page["childs"]) != 0){
                $result = $result . generateMenu($page["childs"]);
            }
            $result = $result . "</li>";
        }
        $result = $result . "</ul>";
        return $result;
    }

    //echo generateMenu($arrayMenu);
?>

<div>
    <?=generateMenus($arrayMenu)?> 
</div>


