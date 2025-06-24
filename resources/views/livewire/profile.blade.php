<div>
    <x-section title="Profile">
        <div class="flex flex-col items-center gap-4 mb-6">
            <img src="{{ asset('storage/' . (auth()->user()->photo ?? '')) }}" alt="avatar" class="w-24 h-24 rounded-full border-4 border-blue-100 shadow" />
            <div class="relative" wire:submit.prevent="updateProfilePhoto">
                <form>

                <input type="file" id="profile-photo" class="" wire:model="photo" accept="image/*" />
                <button type="sumbit" class="mt-2 px-3 py-1 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700">Edit Foto</button>
                </form>
            </div>
            <div class="text-center">
                <div class="text-xl font-semibold text-gray-700">{{ $name }}</div>
                <div class="text-gray-500 text-sm">{{ $email }}</div>
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium" for="profile-name">Nama</label>
                <input id="profile-name" type="text" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" wire:model="name" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium" for="profile-email">Email</label>
                <input id="profile-email" type="email" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" wire:model="email" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium" for="profile-password">Password</label>
                <input id="profile-password" type="password" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Kosongkan jika tidak diubah" wire:model="password"/>
            </div>
            <div class="flex justify-end">
                <button type="button" wire:click="updateProfile" class="px-4 mt-3 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </div>
    </x-section>
</div>
