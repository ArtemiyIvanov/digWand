<?php

namespace App\Controllers;

use App\Models\Model, Jenssegers\Blade\Blade;

class HomeController extends Controller_A
{
    public $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    public function index()
    {
        $this->title .= ' | Home';
        $arItems = $this->model->getTableData('items');
        return $this->render('index', ['title' => $this->title, 'arItems' => $arItems]);
    }

    public function search()
    {
        $search = post('searchQuery');
        $arItems = $this->model->search($search);
        echo json_encode($arItems);
    }
}