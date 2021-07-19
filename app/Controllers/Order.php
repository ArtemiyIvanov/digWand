<?php

namespace App\Controllers;

use App\Models\Model, Jenssegers\Blade\Blade;

Class Order 
{
    public $model;

    public function __construct()
    {
        $this->model = new Model;
    }
    public function index()
    {
        $ids = [1, 5, 4];
        $qty = [2, 3, 4];
        $arItems = $this->model->getProductById($ids);
        return $this->render('order', ['arItems' => $arItems], ['qty' => $qty]);
    }
    public function render($name, $items = [], $qty = [])
    {
        $blade = new Blade(VIEWS_FOLDER_PATH, CACHE_FOLDER_PATH);
        echo $blade->render($name, $items, $qty);
    }
    public function Request($action)
    {
        $this->$action();
    }

}