<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-white border-r border-gray-200 shadow-md transform transition-transform duration-200 ease-in-out -translate-x-full md:static md:translate-x-0">
    <div class="flex items-center justify-center h-16 border-b border-gray-200">
        <span class="text-xl font-semibold text-blue-600">Mortail</span>
    </div>
    <nav class="p-4 space-y-2 scrollbar">
        <x-nav-link href="{{ route('home')}}" :active="request()->routeIs('home')" wire:navigate>Dashboard</x-nav-link>
        <x-nav-link href="{{ route('gejala')}}" icon="fas fa-virus" :active="request()->routeIs('gejala')" wire:navigate>Gejala</x-nav-link>
        <x-nav-link href="{{ route('profile')}}" :active="request()->routeIs('profile')" icon="fas fa-user" wire:navigate>Profile</x-nav-link>
    </nav>
</aside>

<div id="sidebarOverlay" class="fixed inset-0 z-20 bg-black/40 bg-opacity-40 backdrop-blur-sm md:hidden hidden"></div>
