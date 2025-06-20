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

  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased text-gray-800 bg-gray-100">

  <div class="flex h-screen" x-data="{ openSidebar: false }">
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

</body>
</html>
