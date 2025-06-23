<header class="sticky top-0 z-10 flex items-center justify-between flex-shrink-0 h-16 bg-white border-b border-gray-200 px-4 shadow-sm">
    <div class="flex items-center gap-3">
          <button id="sidebarToggleBtn" class="p-2 text-gray-600 rounded-md hover:bg-gray-100 focus:outline-none md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
          </button>
        <h1 class="text-xl font-semibold text-gray-700 hidden sm:block">{{ $title ?? null }}</h1>
            </div>
        <div class="flex items-center gap-4">
        <!-- Profile dropdown -->
        <div class="relative">
            <button id="profileDropdownBtn" class="flex items-center p-1 rounded-full hover:bg-gray-100 focus:outline-none">
              <img src="https://i.pravatar.cc/40?img=3" alt="avatar" class="w-8 h-8 rounded-full" />
            </button>
            <div id="profileDropdownMenu" class="absolute right-0 w-48 mt-2 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg hidden">
              <a href="{{ route('profile')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
              <a href="{{ route('logout')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</header>
