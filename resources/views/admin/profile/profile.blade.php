<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.admin')
@section('title','Edit Profile')

@section('content')
    <div class="min-h-screen flex items-start justify-center  pt-20 px-4 sm:mr-64">
        <div class="w-full max-w-3xl bg-white shadow-lg rounded-2xl p-8 dark:bg-gray-800">
            <!-- Title -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">ویرایش پروفایل</h2>

            <!-- Profile Image -->


            <!-- Form -->
            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6" enctype="multipart/form-data">

                @csrf

                <div class="flex flex-col items-center mb-10">
                    <div class="relative">
                        <img id="profile_preview" src="{{ Auth::user()->profile_picture ?? 'https://static.vecteezy.com/system/resources/thumbnails/011/675/374/small_2x/man-avatar-image-for-profile-png.png' }}"
                             alt="Profile"
                             class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                        <label for="profile_picture"
                               class="absolute bottom-2 right-2 bg-blue-600 text-white p-2 rounded-full cursor-pointer hover:bg-blue-700 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7" />
                            </svg>
                        </label>
                        <input type="file" id="profile_picture" name="profile_picture" class="hidden" accept="image/*">
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-white">نام</label>
                        <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-purple-200 px-4 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-white">نام خانوادگی</label>
                        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-purple-200  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 px-4 py-2">
                    </div>
                    </div>

                    <!-- NickName -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-white">نام کاربری</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-purple-200  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 px-4 py-2">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-white">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 px-4 py-2">
                    </div>

                    <!-- Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-white">موبایل</label>
                        <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 px-4 py-2">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center pt-8">
                    <a href="{{ route('admin.dashboard') }}"
                       class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg dark:bg-gray-700 dark:text-white hover:bg-gray-300 transition">
                        برگشت به داشبورد
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                        ذخیره تغییرات
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', (e) => {
        document.getElementById('profile_picture').addEventListener('change', function (event) {
            const [file] = event.target.files;
            if (file) {
                document.querySelector('#profile_preview').src = URL.createObjectURL(file);
            }
        });
    });

</script>
