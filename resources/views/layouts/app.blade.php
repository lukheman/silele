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

<!-- Toastfy -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>
<body class="antialiased text-gray-800 bg-gray-100">

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>


        document.addEventListener('livewire:initialized', () => {

            Livewire.on('toast', ({ message, variant }) => {
                const borderColors = {
                    success: "#10b981", // Tailwind CSS 4 emerald-500
                    warning: "#facc15", // Tailwind CSS 4 yellow-400
                    error: "#f43f5e"    // Tailwind CSS 4 rose-500
                };

                Toastify({
                    text: message,
                    duration: 3000,
                    close: false,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "#ffffff", // White background
                        border: `2px solid ${borderColors[variant] || "#374151"}`, // Tailwind CSS 4 gray-700 for default
                        color: "#111827", // Tailwind CSS 4 gray-900 for text
                        borderRadius: "0.375rem", // Tailwind CSS 4 rounded-md
                        boxShadow: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.05)" // Tailwind CSS 4 shadow-md
                    },
                }).showToast();
            });



            Livewire.on('deleteConfirmation', ({ message }) => {
                Swal.fire({
                    title: message,
                    icon: "warning",
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-danger'
                    },
                    confirmButtonText: "Ya, Hapus",
                    showClass: {
                        popup: 'animate__animated animate__fadeIn animate__faster' // Entrance animation
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut animate__faster' // Exit animation
                    }
                }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('deleteConfirmed');
                        }
                    });
            });

            Livewire.on('close-modal', () => {

                const modal = document.getElementById('modalForm');
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');


            });

            Livewire.on('open-modal', () => {

                const modal = document.getElementById('modalForm');

                // show modal form
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');

                // Optional: close modal on ESC
                document.addEventListener('keydown', (e) => {
                    if (!modal.classList.contains('hidden') && e.key === 'Escape') {
                        closeModal();
                    }
                });

            });



        });

<!-- Modal logic for Tambah Data -->






        </script>

        @stack('scripts')


    <!-- Toastfy -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



</body>
</html>
