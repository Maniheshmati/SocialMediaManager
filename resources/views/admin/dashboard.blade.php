{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl border bg-white p-4">Users: {{ \App\Models\User::count() }}</div>
        <div class="rounded-2xl border bg-white p-4">Posts: {{ \App\Models\Post::count() }}</div>
        <div class="rounded-2xl border bg-white p-4">Status: OK</div>
    </div>
@endsection

