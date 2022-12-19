<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dashlite.css?ver=2.4.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('backend/assets/css/theme.css?ver=2.4.0') }}">
</head>

<body class="nk-body npc-default @if (Route::has('login')) pg-auth @endif">
    <div class="nk-app-root">
        @yield('content')
    </div>
    <script src="{{ asset('backend/assets/js/bundle.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.js?ver=2.4.0') }}"></script>
</body>
</html>