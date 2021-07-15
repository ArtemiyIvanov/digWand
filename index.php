<?php
require_once('./DataBase.php');

$query = 'SELECT * FROM items';
$arItems = DataBase::getRows($query);

?>

<script>
    var items = <?=json_encode($arItems)?>
</script>

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
                <button class="btn-search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <button class="btn-cart" type="button">Корзина</button>
            <div class="cart-block invisible"></div>
        </div>
        
    </header>
    <main>
        <div class="products"></div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <script src="js/search.js"></script>
    <script src="js/main.js"></script>
</body>

</html>