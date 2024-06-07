<?php

function getData() {
    return getAssocResult("SELECT * FROM `Directory`");
}

function getDataTree(array &$elements, $parentId = 0) {
    $tree = array();

    foreach ($elements as $element) {
        if ($element['IdParent'] == $parentId) {
            $children = getDataTree($elements, $element['Id']);
            if ($children) {
                $element['childs'] = $children;
            }
            $tree[$element['Id']] = $element;
            unset($elements[$element['Id']]);
        }
    }
    return $tree;
}
?>