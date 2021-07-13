<?php

require_once('./config/database.php');

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => TRUE,
];

$dsn = 'mysql:host=' . DB_HOST . ';port=' . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR;

$db = new PDO($dsn, DB_USER, DB_PW, $opt);

$query = 'SELECT * FROM items';

$items = $db->prepare($query);

$items->execute();

$arItems = $items->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <div class="logo">E-shop</div>
        <div class="cart">
            <form action="#" class="search-form">
                <input type="text" class="search-field">
                <button class="btn-search" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <button class="btn-cart" type="button">Корзина</button>
            <div class="cart-block invisible"></div>
        </div>
    </header>
    <main>
        <?php foreach ($arItems as $item) : ?>

            <div class="product-item" data-id="<?= $item['id'] ?>">

                <div class="desc">
                    <h3><?= $item['name'] ?></h3>
                    <p><?= $item['price'] ?></p>
                    <button class="buy-btn">Купить</button>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="products"></div>
    </main>

    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>