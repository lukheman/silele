<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="font-['Poppins'] bg-gray-100">
    <!-- Header with Navbar -->
    <header class="bg-green-700 text-white py-4 sticky top-0 z-50">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <h1 class="text-2xl font-semibold">PakarLee</h1>
            </div>
            <nav class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
                <a href="{{ route('landing')}}" class="hover:text-green-300 transition">Beranda</a>
                <a href="{{ route('landing')}}#features" class="hover:text-green-300 transition">Fitur</a>
                <a href="{{ route('landing')}}#how-it-works" class="hover:text-green-300 transition">Cara Kerja</a>
                <a href="{{ route('landing')}}#diagnosis" class="hover:text-green-300 transition">Diagnosis</a>
                <a href="{{ route('login')}}" class="hover:text-green-300 transition">Login</a>
            </nav>
        </div>
    </header>

        {{ $slot }}

</body>
</html>
