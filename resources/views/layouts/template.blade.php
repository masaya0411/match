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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
