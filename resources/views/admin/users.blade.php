{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')
@section('title','Users')
@extends('layouts.navigation')

@section('content')
    <div class="space-y-6">

        {{-- Page Header --}}
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">مدیریت کاربران</h1>
            <button id="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                کاربر جدید
            </button>
        </div>

        {{-- Search & Filters --}}
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 bg-white p-4 rounded-xl border shadow-sm">
            <input type="text" placeholder="جستجو کاربر..."
                   class="w-full md:w-1/3 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
            <select class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
                <option>همه نقش‌ها</option>
                <option>ادمین</option>
                <option>کاربر عادی</option>
            </select>
        </div>

        {{-- Users Table --}}
        <div class="overflow-x-auto rounded-2xl border bg-white shadow-sm">
            <table class="min-w-full text-sm text-right text-gray-600">
                <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">نام</th>
                    <th class="px-6 py-3 font-semibold">ایمیل</th>
                    <th class="px-6 py-3 font-semibold">نقش</th>
                    <th class="px-6 py-3 font-semibold">ثبت‌نام</th>
                    <th class="px-6 py-3 font-semibold">عملیات</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <th class="px-6 py-3 font-semibold">{{ $user->id }}</th>
                        <th class="px-6 py-3 font-semibold">{{ $user->first_name . ' ' . $user->last_name }}</th>
                        <th class="px-6 py-3 font-semibold">{{$user->email}}</th>
                        <th class="px-6 py-3 font-semibold"><span
                                class="rounded-full bg-blue-100 text-blue-600 px-3 py-1 text-xs"> ادمین</span></th>
                        <th class="px-6 py-3 font-semibold">{{ \Carbon\Carbon::instance($user->created_at)->format('Y-m-d') }}</th>
                        <td class="px-6 py-3 flex gap-2">
                            <a href="#"
                               class="px-3 py-1 text-xs rounded-lg bg-green-100 text-green-700 hover:bg-green-200">ویرایش</a>
                            <a href="#" class="px-3 py-1 text-xs rounded-lg bg-red-100 text-red-700 hover:bg-red-200">حذف</a>
                        </td>
                    </tr>
                @endforeach
                {{-- Example Static Rows --}}
                {{--                <tr class="border-b hover:bg-gray-50 transition">--}}
                {{--                    <td class="px-6 py-3">1</td>--}}
                {{--                    <td class="px-6 py-3 font-medium">مانی هاشمی</td>--}}
                {{--                    <td class="px-6 py-3">mani@example.com</td>--}}
                {{--                    <td class="px-6 py-3"><span class="rounded-full bg-blue-100 text-blue-600 px-3 py-1 text-xs">ادمین</span></td>--}}
                {{--                    <td class="px-6 py-3">2025-08-10</td>--}}
                {{--                    <td class="px-6 py-3 flex gap-2">--}}
                {{--                        <a href="#" class="px-3 py-1 text-xs rounded-lg bg-green-100 text-green-700 hover:bg-green-200">ویرایش</a>--}}
                {{--                        <a href="#" class="px-3 py-1 text-xs rounded-lg bg-red-100 text-red-700 hover:bg-red-200">حذف</a>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex justify-between items-center py-4">
            <p class="text-sm text-gray-500">نمایش ۱ تا ۱۰ از ۵۰ کاربر</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 rounded-lg border bg-white hover:bg-gray-100">قبلی</button>
                <button class="px-3 py-1 rounded-lg border bg-blue-600 text-white">۱</button>
                <button class="px-3 py-1 rounded-lg border bg-white hover:bg-gray-100">۲</button>
                <button class="px-3 py-1 rounded-lg border bg-white hover:bg-gray-100">بعدی</button>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <!-- Overlay -->
        <div id="overlay" class="absolute inset-0 bg-black bg-opacity-50 opacity-0 transition-opacity duration-300"></div>

        <!-- Modal Card -->
        <div id="modalCard"
             class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl p-6 transform scale-95 opacity-0 transition-all duration-300 rtl">
            <h2 class="text-2xl font-bold mb-4 text-right">ایجاد کاربر جدید</h2>

            <form class="space-y-4">
                <div>
                    <label class="block text-right text-gray-700">نام</label>
                    <input type="text" class="w-full border rounded-lg px-3 py-2 text-right" placeholder="نام کاربر">
                </div>
                <div>
                    <label class="block text-right text-gray-700">ایمیل</label>
                    <input type="email" class="w-full border rounded-lg px-3 py-2 text-right" placeholder="ایمیل کاربر">
                </div>
                <div>
                    <label class="block text-right text-gray-700">رمز عبور</label>
                    <input type="password" class="w-full border rounded-lg px-3 py-2 text-right" placeholder="رمز عبور">
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" id="closeModal"
                            class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">
                        بستن
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        ایجاد
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const openBtn = document.getElementById("openModal");
        const closeBtn = document.getElementById("closeModal");
        const modal = document.getElementById("modal");
        const overlay = document.getElementById("overlay");
        const modalCard = document.getElementById("modalCard");

        function openModal() {
            modal.classList.remove("hidden");
            setTimeout(() => {
                overlay.classList.remove("opacity-0");
                modalCard.classList.remove("opacity-0", "scale-95");
                modalCard.classList.add("opacity-100", "scale-100");
            }, 10);
        }

        function closeModal() {
            overlay.classList.add("opacity-0");
            modalCard.classList.add("opacity-0", "scale-95");
            modalCard.classList.remove("opacity-100", "scale-100");
            setTimeout(() => modal.classList.add("hidden"), 300);
        }

        openBtn.addEventListener("click", openModal);
        closeBtn.addEventListener("click", closeModal);
        overlay.addEventListener("click", closeModal);
    });
</script>
