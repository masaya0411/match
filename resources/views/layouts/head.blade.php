    <meta charset="utf-8">
    <title>@yield('title') | match</title>
    <meta name="description" content="@yield('title') | 誰でも、気軽に仕事が見つかるエンジニア特化の案件マッチングサービス『match』">
    <meta name="keywords" content="仕事,案件,エンジニア,match">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:title" content="@yield('title') | match">
    <meta property="og:type" content="website">
    <meta property="og:description" content="@yield('title') | 誰でも、気軽に仕事が見つかるエンジニア特化の案件マッチングサービス『match』">
    <meta property="og:url" content="https://match-engineer.com/">
    <meta property="og:image" content="{{ asset('/ogp.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="icon" href="{{ asset('/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">