<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title','Admin')</title>
</head>
<body class="min-h-screen bg-gray-50">
<nav class="border-b bg-white">
    <div class="mx-auto max-w-7xl px-4 py-3 flex justify-between">
        <a href="{{ route('admin.dashboard') }}" class="font-semibold">Panel</a>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.posts.index') }}" class="hover:underline">Posts</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf <button class="px-3 py-1 rounded border">Logout</button>
            </form>
        </div>
    </div>
</nav>
<main class="mx-auto max-w-7xl p-4">@yield('content')</main>
</body>
</html>
