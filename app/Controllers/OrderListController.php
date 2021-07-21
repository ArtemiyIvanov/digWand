<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

Class OrderListController extends Controller_A
{
    public function index()
    {       
        $this->title .= '| Check Order';
        $phoneNumber = $_POST['phone-number'];
        $orderList = $this->model->getUserOrders($phoneNumber);
        return $this->render('check', ['title'=> $this->title, 'orderList'=>$orderList]);
        dump($orderList);
    }
    
}