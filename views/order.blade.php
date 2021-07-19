@php
      namespace config;
  @endphp
@extends('layouts.default');

@section('title', 'Оформление заказа')

@section('content')
{{-- {{var_dump($arItems)}} --}}
    @for ($i=0; $i < count($arItems);$i++)
        Название: {{$arItems[$i]['name']}}</br>
        Кол-во: {{$qty[$i]}}</br>
        Цена: {{$qty[$i]*(float)$arItems[$i]['price']}}</br>
    @endfor
@endsection
