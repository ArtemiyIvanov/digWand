@extends('layouts.default')
@section('script')
<script>
    var items = {!! json_encode($arItems) !!};
</script>
@endsection

@section('title', $title)

@section('headerAdditions')
<form action="/?c=orderList&a=index" method="POST">
    <p>Введите номер телефона для просмотра заказов:</p>
    <input type="tel" name="phone-number" placeholder="+7 (900) 123-45-67" value="+7 (900) 123-45-67" >
{{--    pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]"--}}
    <button class="check-btn">Посмотреть</button>
</form>
<div class="cart">
    <form action="/?a=search" class="search-form">
        <button class="btn-default" type="button">отмена</button>
        <input type="text" class="search-field" name="searchQuery" required="required">
        <button class="btn-search">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <button class="btn-cart" type="button">Корзина</button>
    <div class="cart-block invisible"></div>
</div>
@endsection

@section('content')
    <div class="products"></div>


@endsection

@section('addingJS')
    <script src="js/search.js"></script>
    <script src="js/main.js"></script>
@endsection
