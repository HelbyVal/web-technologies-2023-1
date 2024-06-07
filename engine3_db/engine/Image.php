<?php

function getImages(){
    $bigDir = "../public/img/big/";
    $smallDir = "../public/img/small/";
    $bigFiles = array_diff(scandir($bigDir), [".", ".."]);
    $smallFiles = array_diff(scandir($smallDir), [".", ".."]);

    $result = [];

    foreach ($smallFiles as $file) {
        $bigFileKey = array_search($file, $bigFiles);
        $bigFile = $bigFiles[$bigFileKey];
        $image = 
        [
            "smallPath" => "/img/small/" . $file,
            "bigPath" => "/img/big/" . $bigFile
        ];
        array_push($result, $image);
    }

    return $result;
}
?>