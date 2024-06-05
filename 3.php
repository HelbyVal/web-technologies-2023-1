<?php
date_default_timezone_set("Asia/Yekaterinburg");
$title = "Второй способ";
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

$content = file_get_contents("site.html");
$content = str_replace("{{ title }}", $title, $content);
$content = str_replace("{{ h1 }}", $h1, $content);
$content = str_replace("{{ year }}", $year, $content);
$content = str_replace("{{ h2 }}", $h2, $content);
$content = str_replace("{{ time }}", getStringTime(), $content);

echo $content;