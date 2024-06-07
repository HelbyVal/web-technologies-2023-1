<?php
//функция для примера, осуществляющая вывод текстовой информации в файл
//использовать для логирования, можно выводить даже массив
//пример в index.php


function log_file($s, $suffix = '')
{

    if (is_array($s) || is_object($s)) $s = print_r($s, 1);
    $s = "### " . date("d.m.Y H:i:s") . "\n" . $s . "\n\r\n";

    if (mb_strlen($suffix))
        $suffix = "_" . $suffix;

    if(_getCountFromLog() > 10 && file_exists($_SERVER['DOCUMENT_ROOT'] . "/_log/logs.log")) {
        $suff = _getNumFile();
        $str = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_log/logs.log");
        _writeToFile($_SERVER['DOCUMENT_ROOT'] . "/_log/logs" . $suff . ".log", $str, "a+");
        unlink($_SERVER['DOCUMENT_ROOT'] . "/_log/logs.log");
    } 

    _writeToFile($_SERVER['DOCUMENT_ROOT'] . "/_log/logs" . $suffix . ".log", $s, "a+");

    return $s;
}

function _writeToFile($fileName, $content, $mode = "w")
{
    $dir = mb_substr($fileName, 0, strrpos($fileName, "/"));
    if (!is_dir($dir)) {
        _makeDir($dir);
    }

    if ($mode != "r") {
        $fh = fopen($fileName, $mode);
        if (fwrite($fh, $content)) {
            fclose($fh);
            @chmod($fileName, 0644);
            return true;
        }
    }

    return false;
}

function _makeDir($dir, $is_root = true, $root = '')
{
    $dir = rtrim($dir, "/");
    if (is_dir($dir)) return true;
    if (mb_strlen($dir) <= mb_strlen($_SERVER['DOCUMENT_ROOT']))
        return true;
    if (str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir) == $dir)
        return true;

    if ($is_root) {
        $dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir);
        $root = $_SERVER['DOCUMENT_ROOT'];
    }
    $dir_parts = explode("/", $dir);

    foreach ($dir_parts as $step => $value) {
        if ($value != '') {
            $root = $root . "/" . $value;

            if (!is_dir($root)) {
                mkdir($root, 0755);
                chmod($root, 0755);
            }
        }
    }
    return $root;
}

function _getCountFromLog() {
    $string = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_log/logs.log");
    $arrayStrings = explode("\r", $string);
    $count = 0;
    foreach ($arrayStrings as $key => $value) {
        if ($value != "") {
            $count += 1;
        }
    }
    return $count;
}

function _getNumFile() {
    $i = 0;
    while(file_exists($_SERVER['DOCUMENT_ROOT'] . "/_log/logs" . $i . ".log")) { 
        $i += 1;
    }
    return $i;
}