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
//        $ids = '(';
//        $qty = [];
//        $cart = json_decode(post('Cart'));
//        dump($cart);
//        $arIds = [];
//        foreach($cart as $k=>$item) {
//            $ids = $ids . $item->id/*$item["id"]"*/ . ',';
//            array_push($qty, $item->qty);
//
//            $arIds[] = $item->id;
//        }
//        $ids = substr($ids, 0, -1);
//        $ids = $ids . ')';
//
//        $arItems = $this->model->getProductById(implode(',', $arIds));
//        $sum = $this->model->getCartSum($ids, $qty);
        $this->title .= ' | Create Order';
        $userBasket = $this->model->initBasket(post('Cart'));

        return $this->render('order', ['title'=> $this->title, 'basket' => $userBasket]);
    }

    public function create()
    {
        $info = [
            'user_phone' => post('phone-number'),
            'amount' => post('amount')
        ];

        $id = $this->model->createOrder($info);
        $this->title .= ' | Order Created';
        return $this->render('order', ['title'=> $this->title, 'orderId' => $id]);
    }

    public function delProduct()
    {

    }
}