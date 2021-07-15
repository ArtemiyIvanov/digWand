<?php
require_once('./DataBase.php');

$query = 'SELECT * FROM items';
$arItems = DataBase::getRows($query);
$massage ='';
?>