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
        $id = $this->model->createOrder(post('Cart'), $info);
        $this->title .= ' | Order Created';
        return $this->render('order', ['title'=> $this->title, 'orderId' => $id]);
    }
    
}