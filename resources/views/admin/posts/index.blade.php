{{-- resources/views/admin/posts/index.blade.php --}}
@extends('layouts.admin')
@section('title','Posts')
@section('content')
    <div class="flex items-center justify-between mb-3">
        <input id="q" type="text" placeholder="Search…" class="border rounded px-3 py-2">
        <a href="{{ route('admin.posts.create') }}" class="px-3 py-2 border rounded">New</a>
    </div>

    <table id="tbl" class="w-full border bg-white rounded-2xl overflow-hidden">
        <thead><tr class="bg-gray-100">
            <th class="p-2 text-left">Title</th><th class="p-2">Actions</th>
        </tr></thead>
        <tbody>
        @foreach($posts as $p)
            <tr class="border-t">
                <td class="p-2">{{ $p->title }}</td>
                <td class="p-2 text-right">
                    <a href="{{ route('admin.posts.edit',$p) }}" class="underline">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        document.getElementById('q').addEventListener('input', function(){
            const q=this.value.toLowerCase();
            for (const tr of document.querySelectorAll('#tbl tbody tr')){
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            }
        });
    </script>
@endsection
