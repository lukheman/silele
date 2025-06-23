<div class="flex items-center justify-center mt-20">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex items-center justify-center mb-6">
            <h1 class="text-2xl font-semibold text-green-800">Daftar</h1>
        </div>
        <form wire:submit.prevent="register" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" wire:model="name" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                    placeholder="Masukkan nama Anda">
                @error('name')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                    placeholder="Masukkan email Anda">
                @error('email')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" id="password" wire:model="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                    placeholder="Masukkan kata sandi Anda">
                @error('password')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                <input type="password" id="password_confirmation" wire:model="password_confirmation" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                    placeholder="Konfirmasi kata sandi Anda">
                @error('password_confirmation')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700 transition font-semibold">
                Daftar
            </button>
        </form>
        @if (session('message'))
            <div class="mt-4 text-center text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mt-4 text-center text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif
        <p class="mt-4 text-center text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-green-600 hover:underline">Masuk di sini</a>
        </p>
    </div>
</div>
