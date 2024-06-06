<?php

function getNews() {
    return getAssocResult("SELECT id, title FROM news");
}

function getOneNews($id) {
    return getOneResult("SELECT title, text FROM news WHERE id = {$id}");
}

function deleteNews($id) {
    return executeSql("DELETE FROM news WHERE id = $id");
}
