@extends('layouts.admin')
@section('title','حساب کاربری')
@extends('layouts.navigation')

@section('content')
    @if($user->socialAccounts()->exists())

        <div class="w-full p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6 auto-rows-[300px]">
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

                <x-admin.card class="col-span-3 md:col-span-3 lg:col-span-6 h-[200px]">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">نمودار کلی</h2>
                    <div class="h-full flex items-center justify-center text-gray-400">
                        📈 داده‌های کلی
                    </div>
                </x-admin.card>

            </div>
        </div>

    @else
        <div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
            <div
                onclick="window.location.href='#'"
                class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center cursor-pointer hover:scale-105 transition-transform"
            >
                {{-- Instagram Logo --}}
                <div class="w-20 h-20 mb-4">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png"
                        alt="Instagram Logo"
                        class="w-full h-full object-contain"
                    >
                </div>

                {{-- Text --}}
                <p class="text-xl font-bold text-gray-800">اضافه کردن حساب کاربری</p>
            </div>
        </div>
    @endif

@endsection
