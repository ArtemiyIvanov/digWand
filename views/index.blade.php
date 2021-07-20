@extends('layouts.default')
@section('script')
<script>
    var items = {!! json_encode($arItems) !!};
</script>
@endsection

@section('title', 'Интернет-магазин')

@section('headerAdditions')
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
