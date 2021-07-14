<?php

require_once('../config/database.php');

// $connect = mysqli_connect(DB_HOST.':'.DB_PORT, DB_USER, DB_PW, DB_NAME);

$query = 'SELECT * FROM items';

// $result = mysqli_query($connect, $query);

// $items = [];

// while($item = mysqli_fetch_assoc($result)) {
//     $items[] = $item;
// }

// mysqli_close($connect);

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => TRUE,
];

$dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR;

$db = new PDO($dsn, DB_USER, DB_PW, $opt);

$items = $db->prepare($query);

$items->execute();

$arItems = $items->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Урок 1</title>
</head>
<body>

    <?php foreach($arItems as $item):?>

        <div id="<?=$item['id']?>">
            <?=$item['name']?>
        </div>

    <?php endforeach;?>

</body>
</html>
