<?php

namespace App\Controllers;

use App\Models\Model, Jenssegers\Blade\Blade;

Class OrderController extends Controller_A
{
    public $model;

    public function __construct()
    {
        $this->model = new Model;
    }
    public function index()
    {
        $ids = '(';
        $qty = [];
        $cart = json_decode(json_encode(json_decode($_POST['Cart'])), true);
        //var_dump($cart);
        foreach($cart as $item) {
            $ids = $ids . $item['id'] . ',';
            array_push($qty, $item['qty']);
        }
        $ids = substr($ids, 0, -1);
        $ids = $ids . ')';
        $arItems = $this->model->getProductById($ids);
        $sum = $this->model->getCartSum($ids, $qty);
        return $this->render('order', ['arItems' => $arItems, 'sum' => $sum]);
    }
}