<?php
date_default_timezone_set("Asia/Yekaterinburg");
$title = "Первый способ";
$h1 = "Текущий год";
$year = date("Y");

$h2 = "Текущее время";

function setStringFromTime($time, $word1, $word2, $word3) {
    if ($time % 10 == 1 && $time != 11) {
        return $time . $word1;
    }
    elseif (($time % 10 == 0) || ($time % 10 > 4 && $time % 10 <= 9) || ($time > 10 && $time < 20)) {
        return $time . " " . $word2;
    }
    elseif($time % 10 > 1 && $time % 10 < 5) {
        return $time . " " . $word3;
    }
}

function getStringTime() {
    return setStringFromTime(date("G"), "час", "часов", "часа") . " " . setStringFromTime(date("i"), "минута", "минут", "минуты");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?= $title ?>
        </title>
    </head>
    <body>
        <h1> <?= $h1 ?> </h1>
        <div>
            <?= $year ?>
        </div>
        <h2> <?= $h2 ?> </h2>
        <div>
             <?= getStringTime() ?>
        </div>
    </body>
</html>