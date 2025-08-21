{{-- resources/views/components/admin/stat-card.blade.php --}}
<div class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
    <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-700">{{ $title }}</h2>
        <span class="text-2xl" style="color: {{ $iconColor }}">{{ $icon }}</span>
    </div>
    <p class="mt-4 text-3xl font-bold text-gray-900">
        {{ $value }}
    </p>
    <p class="text-sm text-gray-500">{{ $description }}</p>
</div>
