{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')
@section('title','Dashboard')
@extends('layouts.navigation')

@section('content')
    <div class="space-y-6">

        {{-- Statistic Cards --}}
        <div class="grid gap-5 md:grid-cols-6">
            {{-- Users --}}
            <x-admin.stat-card
            title="کاربران"
            :value="\App\Models\User::count()"
            description="تعداد کل کاربران"
            icon="👤"
            icon-color="#3b82f6"
            />

            {{-- Posts --}}
            <x-admin.stat-card
            title="پست ها"
            :value="\App\Models\Post::count()"
            description="تعداد پست های ثبت شده"
            icon="📝"
            />

            {{-- System Status --}}

            <x-admin.stat-card
                title="وضعیت سیستم"
                :value="'OK'"
                description="سرور ها بدون مشکل فعال هستند"
                icon="⚡"
            />
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            {{-- فعالیت اخیر --}}
            <x-admin.card class="md:col-span-1 self-center">
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
            </x-admin.card>

            {{-- نمودار --}}
            <x-admin.card class="md:col-span-2">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">آمار ماهانه</h2>
                <div class="h-48 flex items-center justify-center text-gray-400">
                    📊 نمودار اینجا
                </div>
            </x-admin.card>
        </div>
    </div>
@endsection
