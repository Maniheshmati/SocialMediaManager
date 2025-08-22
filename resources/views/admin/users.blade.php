{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')
@section('title','Users')
@extends('layouts.navigation')

@section('content')
    <div class="space-y-6" id="users-page">

        {{-- Page Header --}}
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">مدیریت کاربران</h1>
            <button id="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                کاربر جدید
            </button>
        </div>

        {{-- Search & Filters --}}
        <x-admin.table-header
            searchPlaceholder="جستجو کاربر..."
            searchId="user-search"
            searchName="user-search"
            filterId="role-filter"
            filterName="role">



            <option value="" selected>یک گزینه را انتخاب کنید</option>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
           <option value="کاربر عادی">کاربر عادی</option>
        </x-admin.table-header>


        {{-- Users Table --}}
        <x-admin.table id="users-table">
            {{-- Table Headers --}}
            <x-slot:headers>
                <th class="px-6 py-3 font-semibold">#</th>
                <th class="px-6 py-3 font-semibold">نام</th>
                <th class="px-6 py-3 font-semibold">ایمیل</th>
                <th class="px-6 py-3 font-semibold">نقش</th>
                <th class="px-6 py-3 font-semibold">ثبت‌نام</th>
                <th class="px-6 py-3 font-semibold">عملیات</th>
            </x-slot:headers>

            {{-- Table Body (slot) --}}
            @foreach($users as $user)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-6 py-3">{{ $user->id }}</td>
                    <td class="px-6 py-3 font-medium">{{ $user->first_name . ' ' . $user->last_name }}</td>
                    <td class="px-6 py-3">{{ $user->email }}</td>
                    @if($user->hasRole('admin'))
                        <td class="px-6 py-3">
                            <span class="rounded-full bg-blue-100 text-blue-600 px-3 py-1 text-xs">ادمین</span>
                        </td>
                    @elseif($user->hasRole('مدیر پیج'))
                        <td class="px-6 py-3">
                            <span class="rounded-full bg-blue-100 text-blue-600 px-3 py-1 text-xs">مدیر پیج</span>
                        </td>
                    @else
                        <td class="px-6 py-3">
                            <span class="rounded-full bg-yellow-100 text-yellow-600 px-3 py-1 text-xs">کاربر عادی</span>
                        </td>
                    @endif

                    <td class="px-6 py-3">{{ $user->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-3 flex gap-2">
                        <a href="#"
                           class="px-3 py-1 text-xs rounded-lg bg-green-100 text-green-700 hover:bg-green-200">ویرایش</a>
                        <a href="#"
                           class="px-3 py-1 text-xs rounded-lg bg-red-100 text-red-700 hover:bg-red-200">حذف</a>
                    </td>
                </tr>
            @endforeach

            {{-- Table Footer / Pagination --}}
            <x-slot:footer>
                <p class="text-sm text-gray-500">نمایش ۱ تا ۱۰ از {{ $users->total() }} کاربر</p>
                <div>
                    {{ $users->links() }} {{-- Laravel paginator --}}
                </div>
            </x-slot:footer>
        </x-admin.table>

    </div>


    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <!-- Overlay -->
        <div id="overlay" class="absolute inset-0 bg-black bg-opacity-50 opacity-0 transition-opacity duration-300"></div>

        <!-- Modal Card -->
        <div id="modalCard"
             class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl p-6 transform scale-95 opacity-0 transition-all duration-300 rtl">
            <h2 class="text-2xl font-bold mb-4 text-right">ایجاد کاربر جدید</h2>

            <form class="space-y-4" method="post" action="{{ route('admin.users.create') }}">
                @csrf
                <div>
                    <label class="block text-right text-gray-700">نام</label>
                    <input type="text" name="user_name" id="user_name_input" class="w-full border rounded-lg px-3 py-2 text-right" placeholder="نام کاربر">
                </div>
                <div>
                    <label class="block text-right text-gray-700">ایمیل</label>
                    <input type="email" name="email" id="email_input" class="w-full border rounded-lg px-3 py-2 text-right" placeholder="ایمیل کاربر">
                </div>
                <div>
                    <label class="block text-right text-gray-700">رمز عبور</label>
                    <input type="password" name="password" id="password_input" class="w-full border rounded-lg px-3 py-2 text-right" placeholder="رمز عبور">
                </div>
                <div>
                    <label class="block text-right text-gray-700">نقش</label>
                    <select class="block w-full p-2.5 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" name="user_role">
                        <option selected>یک گزینه را انتخاب کنید</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
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
