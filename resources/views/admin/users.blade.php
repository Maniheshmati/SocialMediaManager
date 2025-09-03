{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')
@section('title','Users')
@extends('layouts.navigation')

@section('content')

    <div class="p-4 sm:mr-96 sm:ml-32 space-y-6 mt-16">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <div class="relative inline-block">
                <label for="filter-select" class="sr-only">فیلتر کاربران</label>
                <select id="filter-select"
                        class="block w-48 px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-400">
                    <option value="" selected>همه کاربران</option>
                    <option value="yesterday">دیروز</option>
                    <option value="7days">۷ روز اخیر</option>
                    <option value="30days">۳۰ روز اخیر</option>
                    <option value="month">ماه اخیر</option>
                    <option value="year">سال اخیر</option>
                </select>
            </div>
            <div class="relative inline-block">
                <label for="filter-role" class="sr-only">فیلتر دسترسی</label>
                <select id="filter-role"
                        class="block w-48 px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-400">
                    <option value="" selected>همه کاربران</option>
                    <option value="admin">ادمین</option>
                    <option value="مدیر پیج">مدیر پیج</option>
                    <option value="No Role">کاربر عادی</option>
                </select>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><x-lucide-search /></svg>
                </div>
                <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="جستجو...">
            </div>
        </div>
        <div class="min-h-[550px]">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        شناسه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام کاربر
                    </th>
                    <th scope="col" class="px-6 py-3">
                        دسترسی
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ایمیل
                    </th>
                    <th scope="col" class="px-6 py-3">
                        عملیات
                    </th>
                </tr>
                </thead>
                <tbody id="users-table-body">

                </tbody>
            </table>
        </div>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
            <!-- Display the number of results -->
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
        نمایش
        <span class="font-semibold text-gray-900 dark:text-white">
            {{ $users->firstItem() }}-{{ $users->lastItem() }}
        </span>
        از
        <span class="font-semibold text-gray-900 dark:text-white">{{ $users->total() }}</span>
    </span>

            <!-- Pagination controls -->
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-12">
                <!-- Previous Page Button -->
                <li>
                    <a href="{{ $users->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                       @if($users->onFirstPage()) disabled @endif>
                        قبل
                    </a>
                </li>

                <!-- Page Number Links -->
                @for($i = 1; $i <= $users->lastPage(); $i++)
                    <li>
                        <a href="{{ $users->url($i) }}" class="flex items-center justify-center px-3 h-8 leading-tight  border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white
                @if ($users->currentPage() == $i) bg-blue-500 text-white @else text-gray-500 bg-white @endif">
                            {{ $i }}
                        </a>
                    </li>
                @endfor

                <!-- Next Page Button -->
                <li>
                    <a href="{{ $users->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                       @if(!$users->hasMorePages()) disabled @endif>
                        بعد
                    </a>
                </li>
            </ul>
        </nav>
    </div>

        <!-- Main modal -->
        <div id="crud-modal" dir="rtl" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            ویرایش کاربر
                        </h3>
                        <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">بستن مودال</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form id="edit-user-form" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام</label>
                                <input type="text" name="name" id="name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5
                               dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="نام کاربر را وارد کنید" required>
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ایمیل</label>
                                <input type="email" name="email" id="email"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5
                               dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="ایمیل کاربر" required>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نقش</label>
                                <select id="role" name="role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5
                                dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                    <option value="">انتخاب نقش</option>
                                    <option value="admin">مدیر</option>
                                    <option value="مدیر پیج">مدیر پیج</option>
                                    <option value="No Role">بدون نقش</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                        dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            ذخیره تغییرات
                        </button>
                    </form>
                </div>
            </div>
        </div>


        @endsection

@vite('resources/js/admin/users/index.js')
