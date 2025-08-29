<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title','Admin')</title>
</head>
<body class="min-h-screen bg-gray-50">

<main class="">@yield('content')</main>
</body>
</html>
