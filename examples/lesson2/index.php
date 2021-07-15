<?php

require_once('./DataBase.php');

$query = 'SELECT * FROM items';

$arItems = DataBase::getRows($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Урок 1</title>
</head>
<body>

    <form action="./search.php" method="GET" class="search-form">
        <input type="text" name="name" class="search-field">
        <button class="btn-search" type="submit">
            Отправить
        </button>
    </form>

    <?php foreach($arItems as $item):?>

        <div id="<?=$item['id']?>">
            <?=$item['name']?>
        </div>

    <?php endforeach;?>

</body>
</html>

