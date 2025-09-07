@extends('layouts.admin')
@section('title','Users')

@section('content')
    <div class="p-4 sm:mr-96 sm:ml-32 space-y-6 mt-16">
        @livewire('admin.users')
    </div>


@endsection

