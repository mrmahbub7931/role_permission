<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Analytics Dashboard | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    @include('backend.layouts.partials.style')
</head>

<body class="nk-body npc-default has-apps-sidebar has-sidebar ">
    <div class="nk-app-root">
        <!-- sidebar -->
        @include('backend.layouts.partials.sidebar')
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('backend.layouts.partials.header')
                <!-- main header @e -->
                @include('backend.layouts.partials.subsidebar')
                <!-- content @s -->
                <div class="nk-content ">
                    @yield('content')
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @include('backend.layouts.partials.script')
</body>

</html>