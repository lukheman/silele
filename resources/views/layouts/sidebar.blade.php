<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-white border-r border-gray-200 shadow-md transform transition-transform duration-200 ease-in-out -translate-x-full md:static md:translate-x-0">
    <div class="flex items-center justify-center h-16 border-b border-gray-200">
        <span class="text-xl font-semibold text-blue-600">SiLele</span>
    </div>
<nav class="p-4 space-y-2 scrollbar">
    <x-nav-link href="{{ route('dashboard')}}" icon="fas fa-tachometer-alt" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>

    @if (auth()->user()->role === 'admin')
        <x-nav-link href="{{ route('penyakit')}}" icon="fas fa-bacteria" :active="request()->routeIs('penyakit')">Penyakit</x-nav-link>
        <x-nav-link href="{{ route('gejala')}}" icon="fas fa-heartbeat" :active="request()->routeIs('gejala')">Gejala</x-nav-link>
        <x-nav-link href="{{ route('basis-pengetahuan')}}" icon="fas fa-book" :active="request()->routeIs('basis-pengetahuan')">Basis Pengetahuan</x-nav-link>
    @endif

    <x-nav-link href="{{ route('diagnosis')}}" icon="fas fa-stethoscope" :active="request()->routeIs('diagnosis')">Diagnosis</x-nav-link>
</nav>
</aside>

<div id="sidebarOverlay" class="fixed inset-0 z-20 bg-black/40 bg-opacity-40 backdrop-blur-sm md:hidden hidden"></div>
