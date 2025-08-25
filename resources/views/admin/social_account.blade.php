@extends('layouts.admin')
@section('title','حساب کاربری')
@extends('layouts.navigation')

@section('content')
    <div class="w-full p-6">
        {{-- Responsive Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6 auto-rows-[300px]">

            {{-- Recent Activity --}}
            <x-admin.card class="col-span-1 md:col-span-2 lg:col-span-2">
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

            {{-- Monthly Stats --}}
{{--            <x-admin.card class="col-span-1 md:col-span-2 h-[400px]">--}}
{{--                <h2 class="text-lg font-semibold text-gray-700 mb-4">آمار ماهانه</h2>--}}
{{--                <div class="h-full flex items-center justify-center text-gray-400">--}}
{{--                    📊 نمودار اینجا--}}
{{--                </div>--}}
{{--            </x-admin.card>--}}

{{--             Another Widget--}}
{{--            <x-admin.card class="col-span-1 md:col-span-2 lg:col-span-3">--}}
{{--                <h2 class="text-lg font-semibold text-gray-700 mb-4">کاربران فعال</h2>--}}
{{--                <div class="h-full flex items-center justify-center text-gray-400">--}}
{{--                    👥 لیست کاربران--}}
{{--                </div>--}}
{{--            </x-admin.card>--}}

            {{-- Another Widget --}}
            <x-admin.card class="col-span-3 md:col-span-3 lg:col-span-6 h-[200px]">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">نمودار کلی</h2>
                <div class="h-full flex items-center justify-center text-gray-400">
                    📈 داده‌های کلی
                </div>
            </x-admin.card>

        </div>
    </div>
@endsection
