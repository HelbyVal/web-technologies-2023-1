<?php
    function getFirstTask($a, $b) {
        if ($a >= 0 && $b >= 0) {
            return $a - $b;
        }
        elseif ($a < 0 && $b < 0) {
            return $a * $b;
        }
        elseif (($a * $b) < 0) {
            return $a + $b;
        }
    }

    function getSwitchTask($a) {
        switch ($a) {
            case 0:
                echo 0 . " ";
            case 1:
                echo 1 . " ";
            case 2:
                echo 2 . " ";
            case 3:
                echo 3 . " ";
            case 4:
                echo 4 . " ";
            case 5:
                echo 5 . " ";
            case 6:
                echo 6 . " ";
            case 7:
                echo 7 . " ";
            case 8:
                echo 8 . " ";
            case 9:
                echo 9 . " ";
            case 10:
                echo 10 . " ";
            case 11:
                echo 11 . " ";
            case 12:
                echo 12 . " ";
            case 13:
                echo 13 . " ";
            case 14:
                echo 14 . " ";
            case 15:
                echo 15 . " ";  
                break;
            default:
                # code...
                break;
        }
    }

    function plus($a, $b) {
        return $a + $b;
    }
    function minus($a, $b) {
        return $a - $b;
    }
    function multiplying($a, $b) {
        return $a * $b;
    }
    function dividing($a, $b) {
        return $a / $b;
    }


    function operation($a, $b, $operationString) {
        switch ($operationString) {
            case "Cложение":
                return plus($a, $b);
            case "Вычитание":
                return minus($a, $b);  
            case "Умножение":
                return multiplying($a, $b);
            case "Деление":
                return dividing($a, $b);  
            default:
                return $a . $b;
        }
    } 

    function power($x, $pow) {
        if ($pow == 1) {
            return $x;
        }
        else {
            return  $x * power ($x, $pow - 1);
        }
    }

    $a1 = -4;
    $b1 = -2;

    $a2 = 8;
    
    $a3 = 3;
    $b3 = 8;

    $a4 = 6;
    $b4 = 6;

    $a6 = 2;
    $b6 = 10;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Лаб 2
        </title>
    </head>
    <body>
        <h2> Задание 1</h2>
        <div>
            <h3>Входные данные:  a=<?= $a1 ?> b=<?= $b1 ?></h3>
            <h4>Результат <?= getFirstTask($a1, $b1) ?> <h4>
        </div>

        <h2> Задание 2</h2>
        <div>
            <h3>Входные данные: a=<?= $a2 ?> </h3>
            <h4>Результат <?= getSwitchTask($a2) ?> <h4>
        </div>

        <h2> Задание 3</h2>
        <div>
            <h3>Входные данные: a=<?= $a3 ?> b=<?= $b3 ?></h3>
            <h4>Результат сложения <?= plus($a3, $b3) ?> <h4>
            <h4>Результат вычитания <?= minus($a3, $b3) ?> <h4>
            <h4>Результат умножения <?= multiplying($a3, $b3) ?> <h4>
            <h4>Результат деления <?= dividing($a3, $b3) ?> <h4>
        </div>

        <h2> Задание 4</h2>
        <div>
            <h3>Входные данные: a=<?= $a4 ?> b=<?= $b4 ?></h3>
            <h4>Результат сложения <?= operation($a4, $b4, "Cложение") ?> <h4>
            <h4>Результат вычитания <?= operation($a4, $b4, "Вычитание") ?> <h4>
            <h4>Результат умножения <?= operation($a4, $b4, "Умножение") ?> <h4>
            <h4>Результат деления <?= operation($a4, $b4, "Деление") ?> <h4>
        </div>

        <h2> Задание 5</h2>
        <div>
            <h4>Сегодня на дворе <?= date("Y")?> год</h4>
            <h4>Остальные способы вывода сразу в первой лабе сделал</h4>
        </div>

        <h2> Задание 6</h2>
        <div>
            <h3>Входные данные: a=<?= $a6 ?> b= <?= $b6 ?> </h3>
            <h4>Результат <?= power($a6, $b6) ?> <h4>
        </div>
    </body>
</html>