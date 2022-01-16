<!DOCTYPE html>
<html lang="ja">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
            @include('layouts.header')
            @yield('content')
            @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/script.js') }}"></script>
    <script src="{{ mix('js/footerFixed.js') }}"></script>
</body>
</html>
