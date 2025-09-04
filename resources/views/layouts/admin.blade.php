<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title','Admin')</title>
</head>
<body class="min-h-screen bg-gray-100 dark:bg-gray-900" dir="rtl">
{{-- Notification System div --}}
<div id="notification-container" class="fixed top-15 left-1/2 -translate-x-1/2 z-50 space-y-3 flex flex-col items-center"></div>

@extends('layouts.navigation')
<main class="">@yield('content')</main>
</body>
</html>
