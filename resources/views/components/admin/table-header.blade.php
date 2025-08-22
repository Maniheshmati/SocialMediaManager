{{-- resources/views/components/admin/table-header.blade.php --}}
<div class="flex flex-col md:flex-row items-center justify-between gap-4 bg-white p-4 rounded-xl border shadow-sm">
    {{-- Search Input --}}
    <input type="text"
           placeholder="{{ $searchPlaceholder ?? 'جستجو...' }}"
           id="{{ $searchId ?? 'search' }}"
           name="{{ $searchName ?? 'search' }}"
           class="w-full md:w-1/3 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition">

    {{-- Filter Dropdown --}}
    <select id="{{ $filterId ?? 'filter' }}" name="{{ $filterName ?? 'filter'}}" class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition">
        {{ $slot }}
    </select>
</div>
