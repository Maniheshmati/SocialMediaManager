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

@endsection

{{--<script src="{{ asset('js/admin/users/index.js') }}" />--}}
@vite('resources/js/admin/users/index.js');
{{--<script src=""></script>--}}
