@extends('layouts.default')

    @section('title', $title)

    @section('content')
    @if(!empty($orderList))
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    Date
                </div>
                <div class="col">
                    Order Composition
                </div>
                <div class="col">
                    Amount
                </div>
            </div>
            @foreach ($orderList as $order)
                <div class="row align-items-center">
                    <div class="col">
                        <p class="order-name">{{$order['id']}}</p>
                    </div>
                    <div class="col">
                        <p class="order-name">
                        @foreach ($order['itemsInfo'] as $item)
                            {{$item['name'] . ' - ' . $item['price'] . '$ x ' . $item['qty'] . ' = ' . $item['qty'] * $item['price'] . '$'}} </br>
                        @endforeach  
                    </p>
                        
                    </div>
                    <div class="col">
                        <p class="order-price">$<span class="amount">{{$order['amount']}}</span></p>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <h3>По этому номеру нет заказов:(</h3>
        <form action="/" method="POST">
            <button class="check-btn">на главную</button>
        </form>
        @endif
    @endsection
