<?php

namespace App\Controllers;

use App\Models\Model, Jenssegers\Blade\Blade;

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    public function index()
    {
        $arItems = $this->model->getTableData('items');
        return $this->render('index', ['arItems' => $arItems]);
    }

    public function search()
    {
        $search = post('searchQuery');
        $arItems = $this->model->search($search);
        echo json_encode($arItems);
    }

    public function Request($action)
    {
        $this->$action();
    }

    public function render($name, $args = [])
    {
        $blade = new Blade(VIEWS_FOLDER_PATH, CACHE_FOLDER_PATH);
        echo $blade->render($name, $args);
    }
}