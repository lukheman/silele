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

  <!-- Chart.js -->
  <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

</head>
<body class="antialiased text-gray-800 bg-gray-100">

<!-- x-data="{ openSidebar: false }" -->
  <div class="flex h-screen" >
    @include('layouts.sidebar')


<!-- Main content -->
<div class="flex flex-col flex-1 min-w-0 md:ml-0">
    <!-- Top bar -->
    @include('layouts.header')

    <!-- Content -->
    <main class="flex-1 overflow-y-auto p-6">
    {{ $slot }}
    </main>

    <!-- Footer -->
    @include('layouts.footer')
</div>

  </div>


  <!-- Modal logic for Tambah Data -->
  <script>
    // Modal logic for Tambah Data
    const openBtn = document.getElementById('openAddModalBtn');
    const closeBtn = document.getElementById('closeAddModalBtn');
    const cancelBtn = document.getElementById('cancelAddModalBtn');
    const modal = document.getElementById('addDataModal');

    function openModal() {
    console.log(openBtn);
      modal.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    }
    function closeModal() {
      modal.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    }
    if (openBtn && closeBtn && cancelBtn && modal) {
      openBtn.addEventListener('click', openModal);
      closeBtn.addEventListener('click', closeModal);
      cancelBtn.addEventListener('click', closeModal);
      // Optional: close modal on ESC
      document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('hidden') && e.key === 'Escape') closeModal();
      });
    }
  </script>

  <!-- Profile dropdown logic -->
  <script>
    // Profile dropdown logic
    (function() {
      const btn = document.getElementById('profileDropdownBtn');
      const menu = document.getElementById('profileDropdownMenu');
      let open = false;

      function openMenu() {
        menu.classList.remove('hidden');
        open = true;
      }
      function closeMenu() {
        menu.classList.add('hidden');
        open = false;
      }
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (open) {
          closeMenu();
        } else {
          openMenu();
        }
      });
      document.addEventListener('click', function(e) {
        if (open && !menu.contains(e.target) && e.target !== btn) {
          closeMenu();
        }
      });
      document.addEventListener('keydown', function(e) {
        if (open && e.key === 'Escape') {
          closeMenu();
        }
      });
    })();
  </script>

  <script>
    (function() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebarOverlay');
      const toggleBtn = document.getElementById('sidebarToggleBtn');
      function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      }
      function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      }
      if (toggleBtn && sidebar && overlay) {
        toggleBtn.addEventListener('click', function(e) {
          e.stopPropagation();
          if (sidebar.classList.contains('-translate-x-full')) {
            openSidebar();
          } else {
            closeSidebar();
          }
        });
        overlay.addEventListener('click', closeSidebar);
        // Optional: close sidebar on ESC
        document.addEventListener('keydown', function(e) {
          if (!sidebar.classList.contains('-translate-x-full') && e.key === 'Escape') {
            closeSidebar();
          }
        });
      }
    })();
  </script>


</body>
</html>
