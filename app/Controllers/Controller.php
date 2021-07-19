<?php

namespace App\Controllers;

use App\Models\DataBase;

class Controller
{
    public function index()
    {
        $query = 'SELECT * FROM items';
        return DataBase::getRows($query);
    }
}