<?php

require_once('./DataBase.php');
$searchQuery = $_POST['searchQuery'];
$query = "SELECT * FROM items WHERE name LIKE '%$searchQuery%'";
$arItems = DataBase::getRows($query);
$massage = '';
if (empty($arItems)) {
    $massage= 'ничего';
}
echo json_encode($arItems);