<div class="flex items-center justify-center mt-20">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md">
        <div class="flex items-center justify-center mb-6">
            <h1 class="text-2xl font-semibold text-green-800">Login</h1>
        </div>
        <div class="space-y-6">
            @if ($errors->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $errors->first('error') }}</span>
                </div>
            @endif
                    @error('email')

                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{$message}}</span>
                </div>

                    @enderror
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required wire:model="email"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                    placeholder="Masukkan email Anda">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" id="password" name="password" required wire:model="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                    placeholder="Masukkan kata sandi Anda">
            </div>
            <button wire:click="login" class="w-full bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700 transition font-semibold">
                Masuk
            </button>
        </div>
        <p class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('registrasi')}}" class="text-green-600 hover:underline">Daftar di sini</a>
        </p>
    </div>
</div>
