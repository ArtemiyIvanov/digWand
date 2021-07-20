@extends('layouts.default')

@section('title', $title)

@section('content')

    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                Image
            </div>
            <div class="col">
                Name
            </div>
            <div class="col">
                Price
            </div>
            <div class="col">
                Quantity
            </div>
            <div class="col">
                Amount
            </div>
            <div class="col">
                Actions
            </div>
        </div>
        @foreach($basket['items'] as $item)
            <div class="row align-items-center" data-id="{{$item->id}}">
                <div class="col">
                    <img src="{{$item->img}}" alt="Some image">
                </div>
                <div class="col">
                    <p class="product-title">{{$item->name}}</p>
                </div>

                <div class="col">
                    <p class="product-single-price">${{$item->price}} each</p>
                </div>
                <div class="col">
                    <p class="product-quantity">Quantity: {{$item->quantity}}</p>
                </div>
                <div class="col">
                    <p class="product-price">${{$item->itemAmount}}</p>
                </div>
                <div class="col">
                    <button class="del-btn" data-id="{{$item->id}}">&times;</button>
                </div>
            </div>
        @endforeach

    </div>

<form action="/?c=order&a=create" method="POST">

    <label for="sum">сумма: {{$basket['amount']}}</label>
    <input id="sum" type="hidden" name="amount" value="{{$basket['amount']}}">
    <p>Введите номер телефона для подтверждения заказа:</p>
    <p><input type="tel" name="phone-number" placeholder="+7 (900) 123-45-67" ></p>
{{--    pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]"--}}
    <button class="order-btn">Заказать</button>
</form>

@endsection

@section('addingJS')
    <script src="js/order.js"></script>
@endsection
