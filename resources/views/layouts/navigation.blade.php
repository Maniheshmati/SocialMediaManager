<body dir="rtl" class="flex bg-gray-100">
{{-- Sidebar --}}
<aside id="sidebar"
       class="fixed top-0 right-0 z-40 h-screen w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white shadow-lg transform transition-transform duration-300 md:translate-x-0 -translate-x-full">
    <div class="p-6 text-2xl font-bold border-b border-gray-700">
        آنلاین شاپ
    </div>
    <ul class="p-4 space-y-2">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 p-3 rounded-xl transition hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                <span class="text-xl">🏠</span>
                <span class="font-medium">داشبورد</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.reports.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl transition hover:bg-gray-700">
                <span class="text-xl">📊</span>
                <span class="font-medium">گزارش‌ها</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl transition hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                <span class="text-xl">👤</span>
                <span class="font-medium">کاربران</span>
            </a>
        </li>
        <li>
            <a href="#"
               class="flex items-center gap-3 p-3 rounded-xl transition hover:bg-gray-700">
                <span class="text-xl">⚙️</span>
                <span class="font-medium">تنظیمات</span>
            </a>
        </li>
    </ul>
</aside>

{{-- Overlay for mobile --}}
<div id="overlay"
     class="fixed inset-0 bg-black bg-opacity-50 hidden md:hidden"></div>



{{-- Toggle Script --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const btn = document.getElementById('menu-btn');

        if (btn && sidebar && overlay) {
            btn.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        }
    });
</script>

</body>
