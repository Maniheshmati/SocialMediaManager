<div class="overflow-x-auto rounded-2xl border bg-white shadow-sm">
    <table {{ $attributes->merge(['class' => 'min-w-full text-sm text-right text-gray-600']) }}>
        {{-- Table Head --}}
        @isset($headers)
            <thead class="bg-gray-100 text-gray-700">
            <tr>
                {{ $headers }}
            </tr>
            </thead>
        @endisset

        {{-- Table Body --}}
        <tbody>
        {{ $slot }}
        </tbody>
    </table>
</div>

{{-- Optional Footer / Pagination --}}
@if(isset($footer))
    <div class="flex justify-between items-center py-4">
        {{ $footer }}
    </div>
@endif
