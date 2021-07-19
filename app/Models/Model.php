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
        $query = "SELECT * FROM items WHERE";
        foreach ($ids as $id){
            $query = $query . ' id=' . $id . ' or';
        }
        $query = substr($query, 0, -2);
        //var_dump($query);
        return DataBase::getRows($query);
    }

    
}