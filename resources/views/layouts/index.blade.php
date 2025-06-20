<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

  <!-- Alpine.js for small interactions -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <!-- Chart.js -->
  <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Custom scrollbar for sidebar */
    .scrollbar::-webkit-scrollbar {
      width: 8px;
    }
    .scrollbar::-webkit-scrollbar-track {
      background: transparent;
    }
    .scrollbar::-webkit-scrollbar-thumb {
      background-color: #cbd5e1; /* slate-300 */
      border-radius: 4px;
    }
  </style>

  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased text-gray-800 bg-gray-100">
  <div class="flex h-screen" x-data="{ openSidebar: false }">
    <!-- Off-canvas & desktop sidebar -->
    <aside
      :class="{ 'translate-x-0': openSidebar, '-translate-x-full': !openSidebar }"
      class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-white border-r border-gray-200 shadow-md transform transition-transform duration-200 ease-in-out
                 md:static md:translate-x-0">
      <div class="flex items-center justify-center h-16 border-b border-gray-200">
        <span class="text-xl font-semibold text-primary">Tailwind Admin</span>
      </div>
      <nav class="p-4 space-y-2 scrollbar">
        <a
          href="index.html"
          class="flex items-center px-4 py-2 rounded-lg bg-blue-50 text-blue-700 font-semibold shadow-sm transition group">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-blue-600 group-hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5-12h3m-9 0h3m-8 0h.01" /></svg>
          Dashboard
        </a>
        <a
          href="users.html"
          class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-primary transition group">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4m-6 6h6v-6a4 4 0 00-6-4m-4 10h4m-6-6h6V8a4 4 0 00-6-4m0 0H3" /></svg>
          Users
        </a>
        <a
          href="forms.html"
          class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-primary transition group">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-8-4h8M4 6h16M4 10h16M4 14h16" /></svg>
          Forms
        </a>
        <a
          href="login.html"
          class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 hover:text-primary transition group">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-8-4h8M4 6h16M4 10h16M4 14h16" /></svg>
          Forms
        </a>
      </nav>
    </aside>

    <!-- Overlay for mobile -->
    <div x-show="openSidebar" @click="openSidebar=false" class="fixed inset-0 z-20 bg-black bg-opacity-40 backdrop-blur-sm md:hidden"></div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 min-w-0 md:ml-0">
      <!-- Top bar -->
      <header class="sticky top-0 z-10 flex items-center justify-between flex-shrink-0 h-16 bg-white border-b border-gray-200 px-4 shadow-sm">
        <div class="flex items-center gap-3">
          <button @click="openSidebar = !openSidebar" class="p-2 text-gray-600 rounded-md hover:bg-gray-100 focus:outline-none md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
          </button>
          <h1 class="text-xl font-semibold text-gray-700 hidden sm:block">Dashboard</h1>
        </div>
        <div class="flex items-center gap-4">
          <button class="relative p-2 text-gray-600 rounded-full hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 6 9.388 6 12v2.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
          </button>
          <!-- Profile dropdown -->
          <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center p-1 rounded-full hover:bg-gray-100 focus:outline-none">
              <img src="https://i.pravatar.cc/40?img=3" alt="avatar" class="w-8 h-8 rounded-full" />
            </button>
            <div x-show="open" x-transition @click.outside="open=false" class="absolute right-0 w-48 mt-2 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg">
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
              <a href="login.html" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
          </div>
        </div>
      </header>

      <!-- Content -->
      <main class="flex-1 overflow-y-auto p-6 space-y-6">
        <!-- Stats cards -->
        <section class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <div class="bg-blue-600 p-5 text-white rounded-md shadow-sm transition hover:shadow-lg">
            <div class="flex items-center">
              <div class="p-3 mr-4 bg-blue-800/20 text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6" /></svg>
              </div>
              <div>
                <p class="text-white/80 text-sm">Total Sales</p>
                <p class="text-xl font-semibold">$24,000</p>
              </div>
            </div>
          </div>
          <div class="bg-emerald-500 p-5 text-white rounded-md shadow-sm transition hover:shadow-lg">
            <div class="flex items-center">
              <div class="p-3 mr-4 bg-emerald-800/20 text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg>
              </div>
              <div>
                <p class="text-white/80 text-sm">New Users</p>
                <p class="text-xl font-semibold">1,200</p>
              </div>
            </div>
          </div>
          <div class="bg-yellow-400 p-5 text-white rounded-md shadow-sm transition hover:shadow-md">
            <div class="flex items-center">
              <div class="p-3 mr-4 bg-white/20 text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 10 4-16 3 6h4" /></svg>
              </div>
              <div>
                <p class="text-white/80 text-sm">Orders</p>
                <p class="text-xl font-semibold">340</p>
              </div>
            </div>
          </div>
          <div class="bg-rose-500 p-5 text-white rounded-md shadow-sm transition hover:shadow-md">
            <div class="flex items-center">
              <div class="p-3 mr-4 bg-white/20 text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V5a2 2 0 00-2-2H6a2 2 0 00-2 2v8m16 0l-8 8-8-8" /></svg>
              </div>
              <div>
                <p class="text-white/80 text-sm">Bounce Rate</p>
                <p class="text-xl font-semibold">32%</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Button Preview -->
        <section class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
          <h2 class="mb-4 text-lg font-semibold">Button Preview</h2>
          <div class="flex flex-wrap gap-4">
            <button class="px-4 py-2 rounded-md bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">Primary</button>
            <button class="px-4 py-2 rounded-md bg-emerald-500 text-white font-medium shadow hover:bg-emerald-600 transition">Success</button>
            <button class="px-4 py-2 rounded-md bg-yellow-400 text-white font-medium shadow hover:bg-yellow-500 transition">Warning</button>
            <button class="px-4 py-2 rounded-md bg-rose-500 text-white font-medium shadow hover:bg-rose-600 transition">Danger</button>
            <button class="px-4 py-2 rounded-md bg-white text-gray-700 border border-gray-300 font-medium shadow hover:bg-gray-50 transition">Secondary</button>
            <button class="px-4 py-2 rounded-md bg-gray-100 text-gray-700 font-medium shadow hover:bg-gray-200 transition">Ghost</button>
            <button class="px-4 py-2 rounded-full bg-blue-600 text-white shadow hover:bg-blue-700 transition"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg></button>
          </div>
        </section>

        <!-- Alert Preview -->
        <section class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
          <h2 class="mb-4 text-lg font-semibold">Alert Preview</h2>
          <div class="space-y-4">
            <div class="flex items-start gap-3 p-4 rounded-md bg-blue-50 text-blue-800 border border-blue-200">
              <svg class="w-5 h-5 mt-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /></svg>
              <div><span class="font-semibold">Info:</span> This is an info alert.</div>
            </div>
            <div class="flex items-start gap-3 p-4 rounded-md bg-emerald-50 text-emerald-800 border border-emerald-200">
              <svg class="w-5 h-5 mt-1 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
              <div><span class="font-semibold">Success:</span> This is a success alert.</div>
            </div>
            <div class="flex items-start gap-3 p-4 rounded-md bg-yellow-50 text-yellow-800 border border-yellow-200">
              <svg class="w-5 h-5 mt-1 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /></svg>
              <div><span class="font-semibold">Warning:</span> This is a warning alert.</div>
            </div>
            <div class="flex items-start gap-3 p-4 rounded-md bg-rose-50 text-rose-800 border border-rose-200">
              <svg class="w-5 h-5 mt-1 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
              <div><span class="font-semibold">Error:</span> This is an error alert.</div>
            </div>
          </div>
        </section>

        <!-- Table Preview -->
        <section class="bg-white rounded-md shadow-sm p-6 border border-gray-100" x-data="{ openAddModal: false }">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Table Preview</h2>
            <button @click="openAddModal = true" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
              Tambah Data
            </button>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                  <th class="px-6 py-3 text-left">Name</th>
                  <th class="px-6 py-3 text-left">Email</th>
                  <th class="px-6 py-3 text-left">Role</th>
                  <th class="px-6 py-3 text-right">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100 [&>tr:nth-child(even)]:bg-gray-50">
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-medium">John Doe</td>
                  <td class="px-6 py-4">john@example.com</td>
                  <td class="px-6 py-4">Admin</td>
                  <td class="px-6 py-4 text-right space-x-2">
                    <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-blue-50 text-blue-700 hover:bg-blue-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z'/></svg>View</button>
                    <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M5 13l4 4L19 7'/></svg>Update</button>
                    <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-rose-50 text-rose-700 hover:bg-rose-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'/></svg>Delete</button>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-medium">Jane Smith</td>
                  <td class="px-6 py-4">jane@example.com</td>
                  <td class="px-6 py-4">Editor</td>
                  <td class="px-6 py-4 text-right space-x-2">
                    <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-blue-50 text-blue-700 hover:bg-blue-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z'/></svg>View</button>
                    <button class="inline-flex items-center px-3 py-1 text-xs font-medium rounded bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M5 13l4 4L19 7'/></svg>Update</button>
                    <button class="inline-flex items-center px-3 py-2 text-xs font-medium rounded bg-rose-50 text-rose-700 hover:bg-rose-100 transition"><svg class='w-4 h-4 mr-1' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'/></svg>Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Modal Add Data -->
          <div x-init="$watch('openAddModal', val => { if(val) document.body.classList.add('overflow-hidden'); else document.body.classList.remove('overflow-hidden') })">
            <template x-if="openAddModal">
              <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
                <div x-show="openAddModal" x-transition class="bg-white w-full max-w-md p-6 rounded-md shadow-lg">
                  <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">Tambah Data</h3>
                    <button @click="openAddModal=false" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                  </div>
                  <form class="space-y-4">
                    <div>
                      <label class="block mb-1 text-sm font-medium" for="name">Name</label>
                      <input id="name" type="text" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Full Name" />
                    </div>
                    <div>
                      <label class="block mb-1 text-sm font-medium" for="email">Email</label>
                      <input id="email" type="email" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Email" />
                    </div>
                    <div>
                      <label class="block mb-1 text-sm font-medium" for="role">Role</label>
                      <select id="role" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option>Admin</option>
                        <option>Editor</option>
                        <option>Viewer</option>
                      </select>
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                      <button type="button" @click="openAddModal=false" class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">Cancel</button>
                      <button type="submit" class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </template>
          </div>
        </section>

        <!-- Charts -->
        <section class="grid gap-6 lg:grid-cols-2">
          <div class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
            <h2 class="mb-4 text-lg font-semibold">Sales Overview</h2>
            <canvas id="sales-chart" class="w-full h-64"></canvas>
          </div>
          <div class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
            <h2 class="mb-4 text-lg font-semibold">User Acquisition</h2>
            <canvas id="users-chart" class="w-full h-64"></canvas>
          </div>
        </section>

        <!-- Recent Activity -->
        <section class="bg-white rounded-md shadow-sm p-6 border border-gray-100">
          <h2 class="mb-4 text-lg font-semibold">Recent Activity</h2>
          <ul class="space-y-4">
            <li class="flex items-start gap-4">
              <span class="inline-flex items-center justify-center w-10 h-10 text-white bg-primary rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 6 9.388 6 12v2.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
              </span>
              <p class="flex-1">You have <span class="font-medium text-gray-700">5 new notifications</span>.</p>
              <span class="text-sm text-gray-400">2h ago</span>
            </li>
            <li class="flex items-start gap-4">
              <span class="inline-flex items-center justify-center w-10 h-10 text-white bg-accent rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg>
              </span>
              <p class="flex-1">New user <span class="font-medium text-gray-700">Jane Doe</span> registered.</p>
              <span class="text-sm text-gray-400">4h ago</span>
            </li>
          </ul>
        </section>
      </main>

      <!-- Footer -->
      <footer class="flex items-center justify-center h-12 text-sm text-gray-500 bg-white border-t border-gray-200">
        © 2025 Tailwind Admin. All rights reserved.
      </footer>
    </div>
  </div>

  <!-- Charts Example JS -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const salesCtx = document.getElementById('sales-chart');
      const usersCtx = document.getElementById('users-chart');

      if (salesCtx) {
        new Chart(salesCtx, {
          type: 'bar',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
              label: 'Sales',
              data: [12000, 15000, 10000, 18000, 22000, 19000],
              backgroundColor: ['#6366f1', '#10b981', '#f59e0b', '#ef4444', '#ec4899', '#0ea5e9'],
              hoverBackgroundColor: ['#4f46e5', '#059669', '#d97706', '#dc2626', '#db2777', '#0369a1'],
              borderRadius: 4,
            }]
          },
          options: {
            responsive: true,
            plugins: { legend: { display: false } }
          }
        });
      }

      if (usersCtx) {
        new Chart(usersCtx, {
          type: 'pie',
          data: {
            labels: ['Organic', 'Referral', 'Social', 'Ads'],
            datasets: [{
              data: [45, 25, 20, 10],
              backgroundColor: ['#10b981', '#6366f1', '#f59e0b', '#ef4444'],
            }]
          },
          options: { responsive: true }
        });
      }
    });
  </script>
</body>
</html>
