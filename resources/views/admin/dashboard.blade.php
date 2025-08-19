{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')
@section('title','Dashboard')
@extends('layouts.navigation')

@section('content')
    <div class="space-y-6">

        {{-- Statistic Cards --}}
        <div class="grid gap-6 md:grid-cols-3">
            {{-- Users --}}
            <div class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700">کاربران</h2>
                    <span class="text-blue-500 text-2xl">👤</span>
                </div>
                <p class="mt-4 text-3xl font-bold text-gray-900">
                    {{ \App\Models\User::count() }}
                </p>
                <p class="text-sm text-gray-500">تعداد کل کاربران</p>
                {{-- Later: Replace with User::count() from database --}}
            </div>

            {{-- Posts --}}
            <div class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700">پست‌ها</h2>
                    <span class="text-green-500 text-2xl">📝</span>
                </div>
                <p class="mt-4 text-3xl font-bold text-gray-900">
                    {{ \App\Models\Post::count() }}
                </p>
                <p class="text-sm text-gray-500">مجموع پست‌های ثبت‌شده</p>
                {{-- Later: Replace with Post::count() from database --}}
            </div>

            {{-- System Status --}}
            <div class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700">وضعیت سیستم</h2>
                    <span class="text-red-500 text-2xl">⚡</span>
                </div>
                <p class="mt-4 text-3xl font-bold text-gray-900">
                    OK
                </p>
                <p class="text-sm text-gray-500">سرورها بدون مشکل فعال هستند</p>
                {{-- Later: You can check health status from Laravel Health or custom logic --}}
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">فعالیت اخیر</h2>
            <ul class="space-y-3 text-sm text-gray-600">
                <li class="flex justify-between">
                    <span>👤 کاربر جدید ثبت‌نام کرد</span>
                    <span class="text-gray-400">5 دقیقه پیش</span>
                </li>
                <li class="flex justify-between">
                    <span>📝 پست جدید ایجاد شد</span>
                    <span class="text-gray-400">30 دقیقه پیش</span>
                </li>
                <li class="flex justify-between">
                    <span>⚙️ بروزرسانی سیستم</span>
                    <span class="text-gray-400">1 ساعت پیش</span>
                </li>
            </ul>
            {{-- Later: Replace with DB queries -> latest users, posts, logs --}}
        </div>

        {{-- Charts Placeholder --}}
        <div class="rounded-2xl border bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">آمار ماهانه</h2>
            <div class="h-48 flex items-center justify-center text-gray-400">
                📊 نمودار اینجا
            </div>
            {{-- Later: Use Chart.js or Laravel Charts package --}}
        </div>

    </div>
@endsection
