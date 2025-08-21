{{-- Generic Admin Card --}}
<div {{ $attributes->merge(['class' => 'rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition']) }}>
    {{ $slot }}
</div>
