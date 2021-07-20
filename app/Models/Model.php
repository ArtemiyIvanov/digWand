<?php

namespace App\Models;

class Model
{

    // related to main page
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

    //related to basket
    public function initBasket($jsonItems)
    {
        $arItems = json_decode($jsonItems);
        $userBasket = [
            'amount' => 0
        ];

        foreach ($arItems as $k=>$item) {
            $itemAmount = $item->quantity * $item->price;
            $arItems[$k]->{'itemAmount'} = $itemAmount;
            $userBasket['amount'] += $itemAmount;
        }

        $userBasket['items'] =  $arItems;
        return $userBasket;
    }

    public function createOrder($info)
    {
//        $info = implode(', ', $info);

        return DataBase::insert(
            'INSERT INTO orders (user_phone, amount) VALUES (:user_phone, :amount)', $info
        );
    }

    public function updateBasket()
    {

    }



    public function getProductById($ids)
    {
        $query = "SELECT * FROM items WHERE id IN (:ids)";
        //var_dump($query);
        return DataBase::getRows($query, ['ids' => $ids]);
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