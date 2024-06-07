<?php
 
function renderParent($data) {
    echo  "
        <div class = \"list-item list-item_open\" data-parent>
            <div class=\"list-item__inner\">
                <img class=\"list-item__arrow\" src=\"img/chevron-down.png\" alt=\"chevron-down\" data-open>
                <img class=\"list-item__folder\" src=\"img/folder.png\" alt=\"folder\">
            <span>" . $data["Name"] . "</span>
        </div> ";
    foreach ($data['childs'] as $value) {
        if (array_key_exists("childs", $value)) {
            echo "<div class=\"list-item__items\">";
            renderParent($value);
            echo "</div>";
        }
        else {
            echo "<div class=\"list-item__items\">";
            renderChildren($value);
            echo"</div>";
        }    
    }
    echo "</div>";

}

function renderChildren($data){
    echo "
    <div class=\"list-item__inner\" style=\"padding-left: 24px;\">
        <img class=\"list-item__folder\" src=\"img/folder.png\" alt=\"folder\">
        <span>". $data["Name"] . "</span>
    </div>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Item</title>
    <link rel="stylesheet" href="/css/f.css">
</head>
<body>

    <div class="list-items" id="list-items">
        <?php foreach ($data as $table) {
            renderParent($table);
        }
        ?>
    </div>
<script type="module" src="/script.js"></script>
</body>
</html>