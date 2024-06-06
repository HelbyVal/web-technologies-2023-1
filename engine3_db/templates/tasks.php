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
    </body>
</html>