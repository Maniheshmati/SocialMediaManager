{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')
@section('title','Dashboard')

@section('content')
    {{-- This div now has a top margin to push it down below the fixed nav --}}
    <div class="p-4 sm:mr-64 space-y-6 mt-16">

        {{-- Top Section with Statistic Cards (Flowbite) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            {{-- Users Stat Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👤</span>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">کاربران</h3>
                </div>
                <div class="text-xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ \App\Models\User::count() }}
                </div>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">تعداد کل کاربران</p>
            </div>

            {{-- Posts Stat Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📝</span>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">پست ها</h3>
                </div>
                <div class="text-xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ \App\Models\Post::count() }}
                </div>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">تعداد پست های ثبت شده</p>
            </div>

            {{-- System Status Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">⚡</span>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">وضعیت سیستم</h3>
                </div>
                <div class="text-xl font-bold text-green-500 mt-2">
                    OK
                </div>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">سرور ها بدون مشکل فعال هستند</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Recent Activity (Flowbite List Group) --}}
            <div class="lg:col-span-1 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">فعالیت اخیر</h2>
                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                👤 کاربر جدید ثبت‌نام کرد
                            </p>
                            <span class="text-xs text-gray-400 dark:text-gray-500">5 دقیقه پیش</span>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                📝 پست جدید ایجاد شد
                            </p>
                            <span class="text-xs text-gray-400 dark:text-gray-500">30 دقیقه پیش</span>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                ⚙️ بروزرسانی سیستم
                            </p>
                            <span class="text-xs text-gray-400 dark:text-gray-500">1 ساعت پیش</span>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Monthly Chart (Flowbite Card) --}}
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">آمار ماهانه</h2>
                <div class="h-64 flex items-center justify-center text-gray-400">
                    📊 نمودار اینجا
                </div>
            </div>
        </div>

    </div>
@endsection
