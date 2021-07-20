@php
      namespace config;
  @endphp
@extends('layouts.default')

@section('title', 'Оформление заказа')

@section('content')
<form action="" method = "GET">
    {{-- {{var_dump($arItems)}} --}}
    @for ($i=0; $i < count($arItems);$i++)
        <p>Название: {{$arItems[$i]['name']}}</p>
        {{-- Кол-во: {{$qty[$i]}}</br> --}}
        {{-- Цена: {{$qty[$i]*(float)$arItems[$i]['price']}}</br> --}}
    @endfor
    <p>сумма: {{$sum}}</p>
    <p>Введите номер телефона для подтверждения заказа:</p>
    <p><input type="tel" name="phone-number" placeholder="+7 (900) 123-45-67" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]"></p>
    <button class="order-btn">Заказать</button>
</form>
@endsection
