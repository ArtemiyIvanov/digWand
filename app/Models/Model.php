<?php

namespace App\Models;

class Model
{
    public function getTableData(string $table)
    {
        $query = 'SELECT * FROM ' . $table;
        return DataBase::getRows($query);
    }

    public function search($searchQuery)
    {
        $query = "SELECT * FROM items WHERE name LIKE '%$searchQuery%'";
        return DataBase::getRows($query);
    }
    public function getProductById($ids)
    {
        $query = "SELECT * FROM items WHERE id in $ids";
        //var_dump($query);
        return DataBase::getRows($query);
    }
    public function getCartSum($ids, $qty)
    {
        $query = "SELECT price FROM items WHERE id in $ids";
        $prices = DataBase::getRows($query);
        // var_dump($answ);
        $sum = 0;
        for ($item = 0; $item < count($qty); $item++){
            $sum+=(float)$prices[$item]['price']*$qty[$item];
        }
        return $sum;
    }
    
}