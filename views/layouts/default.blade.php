@yield('script')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <div class="logo"><a href="./">E-shop</a></div>
        @yield('headerAdditions')
    </header>
    <main>

        @yield('content')

    </main>
    @yield('addingJS')
</body>

</html>