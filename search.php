<?php
require_once('./config/database.php');
require_once('./DataBase.php');
$searchQuery = $_GET['searchQuery'];
$query = "SELECT * FROM items WHERE name LIKE '%$searchQuery%'";
$db = new DataBase($config);
$arItems = $db::getRows($query);
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
      <div class="logo"><a href="./index.php">E-shop</a></div>
        <div class="cart">
            <form action="/search.php" class="search-form">
                <input type="text" class="search-field" name ="searchQuery"  required="required">
                <button class="btn-search" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <button class="btn-cart" type="button">Корзина</button>
            <div class="cart-block invisible"></div>
        </div>
    </header>
    <main>
        <?php if (empty($arItems)) : ?>
            <h4>По запросу "<?=$searchQuery?>" ничего не найдено :(</h4>
        <?php endif ?>

        <?php foreach ($arItems as $item) : ?>

            <div class="product-item" data-id="<?= $item['id'] ?>">

                <div class="desc">
                    <h3><?= $item['name'] ?></h3>
                    <p><?= $item['price'] ?></p>
                    <button class="buy-btn">Купить</button>
                </div>
            </div>

        <?php endforeach; ?>
    </main>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
