<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.admin')
@section('title','Edit Profile')

@section('content')
    <div class="min-h-screen flex items-start justify-center bg-gray-50 pt-24 px-4">
        <div class="w-full max-w-3xl bg-white shadow-lg rounded-2xl p-8">
            <!-- Title -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Edit Profile</h2>

            <!-- Profile Image -->
            <div class="flex flex-col items-center mb-10">
                <div class="relative">
                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://static.vecteezy.com/system/resources/thumbnails/011/675/374/small_2x/man-avatar-image-for-profile-png.png' }}"
                         alt="Profile"
                         class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                    <label for="profile_photo"
                           class="absolute bottom-2 right-2 bg-blue-600 text-white p-2 rounded-full cursor-pointer hover:bg-blue-700 shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                    </label>
                    <input type="file" id="profile_photo" name="profile_photo" class="hidden">
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-purple-200 px-4 py-2">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                    </div>

                    <!-- Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                    </div>

                    <!-- City / State -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">City</label>
                            <input type="text" name="city" value="{{ old('city', Auth::user()->city) }}"
                                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">State</label>
                            <input type="text" name="state" value="{{ old('state', Auth::user()->state) }}"
                                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                        </div>
                    </div>

                    <!-- Zip Code / Country -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Zip Code</label>
                            <input type="text" name="zip_code" value="{{ old('zip_code', Auth::user()->zip_code) }}"
                                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Country</label>
                            <input type="text" name="country" value="{{ old('country', Auth::user()->country) }}"
                                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center pt-8">
                    <a href="{{ route('dashboard') }}"
                       class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                        Back to Home
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
