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

    public function createOrder($jsonCart, $info)
    {
        $fields = implode(', ', array_keys($info));
        $query = "INSERT INTO orders ($fields) VALUES (:user_phone, :amount)";
        $order_id = DataBase::insert($query, $info);

        $cart = json_decode($jsonCart);
        $fields = ['order_id', 'item_id', 'qty'];

        $qFields = implode(', ', $fields);
        $prepareFields = [];
        foreach ($fields as $field) {
            $prepareFields[] = ':' . $field;
        }
        $qPrepareFields = implode(',', $prepareFields);
        $cartData = [];
        foreach ($cart as $el) {
            $cartData[] = [
                $fields[0] => $order_id,
                $fields[1] => $el->item_id,
                $fields[2] => $el->qty
            ];
        }
        $query = "INSERT INTO orders_items_map ($qFields) VALUES ($qPrepareFields)";
        DataBase::insertRows($query, $cartData);
        return $order_id;

    }


    public function getProductById($ids)
    {
        $query = "SELECT * FROM items WHERE id IN (:ids)";
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