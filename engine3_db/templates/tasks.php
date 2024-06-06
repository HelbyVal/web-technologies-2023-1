<?php
    function printDoWhileTask() {
        $a = 0;
        do {
            if($a == 0) {
                echo $a . " - это ноль <br/>";
            }
            elseif ($a % 2 == 1) {
                echo $a . " - это нечётное <br/>";
            }
            elseif ($a % 2 == 0) {
                echo $a . " - это чётное <br/>";
            }
            $a += 1; 
        } while ($a <= 10);
    }

    $array = [];
    $array["Московская область"] = ["Москва","Зеленоград","Клин"];
    $array["Ленинградская область"] = ["Санкт-Петербург","Всеволожск","Кронштадт"];
    $array["Рязанская область"] = ["Рязань","Сасово","Ряжск"];

    function PrintArray($array) {
        foreach ($array as $key => $value) {
            echo "<h3>" . $key . ". Города: <br/>";
            $i = 1;
            foreach ($value as $city => $valueCity) {
                echo $i . ". " . $valueCity . "<br/>";
                $i += 1;
            }
        }
    }

    $charArray = [];
    $charArray["а"] = "a";
    $charArray["б"] = "b";
    $charArray["в"] = "v";
    $charArray["г"] = "g";
    $charArray["д"] = "d";
    $charArray["е"] = "ye";
    $charArray["ё"] = "yo";
    $charArray["ж"] = "j";
    $charArray["з"] = "z";
    $charArray["и"] = "i";
    $charArray["й"] = "ji";
    $charArray["к"] = "k";
    $charArray["л"] = "l";
    $charArray["м"] = "m";
    $charArray["н"] = "n";
    $charArray["о"] = "o";
    $charArray["п"] = "p";
    $charArray["р"] = "r";
    $charArray["с"] = "s";
    $charArray["т"] = "t";
    $charArray["у"] = "u";
    $charArray["ф"] = "f";
    $charArray["х"] = "h";
    $charArray["ц"] = "с";
    $charArray["ч"] = "ch";
    $charArray["ш"] = "sh";
    $charArray["щ"] = "sh'";
    $charArray["ъ"] = "";
    $charArray["ы"] = "yi";
    $charArray["ь"] = "'";
    $charArray["э"] = "e";
    $charArray["ю"] = "yu";
    $charArray["я"] = "ya";

    function makeWordToArray($word) {
        $result = [];
        for ($i = 0; $i < strlen($word); $i++) {
            $char = mb_strtolower(mb_substr($word, $i, 1));
            array_push($result, $char);
        }
        return $result;
    }


    function MakeTranslit($rusWord, $translitArray) {
        $result = "";
        $wordArray = makeWordToArray($rusWord);
        foreach ($wordArray as $keyChar => $char) {
            if (array_key_exists($char, $translitArray)) {
                $result = $result . $translitArray[$char];
            }
            else {
                $result = $result . $char;
            }
        }
        return $result;
    }

    $word = "это задание просто имба! имбулик имбище имбосик ъьыуыъх";


    $arrayMenu = [
        "mainMenu" => [
            "link" => "mainMenu",
            "name" => "Главная Страница",
            "childs" => [
                "child1" => [
                    "link" => "page1",
                    "name" => "Страница 1",
                    "childs" => []
                ],
                "child2" => [
                    "link" => "page2",
                    "name" => "Страница 2",
                    "childs" => []
                ]
            ]
        ]
    ];

    function generateMenu($menu) {
        $result = "<ul>";
        foreach ($menu as $key => $page) {
            $result = $result . "<li>" . "<a href= https://www.google.com/search?q=" . $page["link"] . "/>" . $page["name"]. "</a>";
            if(count($page["childs"]) != 0){
                $result = $result . generateMenu($page["childs"]);
            }
            $result = $result . "</li>";
        }
        $result = $result . "</ul>";
        return $result;
    }

    function checkFirstLetter($charArray, $letter) {
        $letter = mb_strtolower($letter);
        return $charArray[0] == $letter;
    }

    function PrintCitiesOnLetter($array, $letter) {
        foreach ($array as $key => $value) {
            echo "<h3>" . $key . ". Города: <br/>";
            $i = 1;
            foreach ($value as $city => $valueCity) {
                if (checkFirstLetter(makeWordToArray($valueCity), $letter)) {
                    echo $i . ". " . $valueCity . "<br/>";
                    $i += 1;
                }
                continue;
            }
        }
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Лаб 3
        </title>
    </head>
    <body>
        <div>
            <h2>Задача 1</h2>
            <h3> <?= printDoWhileTask() ?> </h3>
        </div>
        <div>
            <h2>Задача 2</h2>
            <?= PrintArray($array) ?>
        </div>
        <div>
            <h2>Задача 3</h2>
            <h3>Строка: "<?= $word ?>" в "<?= MakeTranslit($word, $charArray) ?>"</h3>
        </div>
        <div>
            <h2>Задача 4</h2>
            <?= generateMenu($arrayMenu) ?>
        </div>
        <div>
            <h2>Задача 5 выполнена в menu.php</h2>
            <?= PrintCitiesOnLetter($array, "К") ?>
        </div>

    </body>
</html>