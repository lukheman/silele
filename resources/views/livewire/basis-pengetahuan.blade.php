<div>

<!-- Modal Add Data (hidden by default) -->
<div id="modalForm" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm hidden" wire:ignore.self x-data="{ confirmDelete: false, deleteId: null }">
    <div class="bg-white w-full max-w-4xl p-6 rounded-md shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">Gejala Penyakit</h3>
            <button @click="$wire.dispatch('close-modal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <!-- Left Side: Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-md">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Kode Gejala</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nama Gejala</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Probabilitas</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($selectedPenyakit) && $selectedPenyakit->gejala->isNotEmpty())
                            @foreach ($selectedPenyakit->gejala as $gejala)
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $gejala->kode ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $gejala->nama }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $gejala->pivot->probabilitas ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600 flex gap-2">
                                        <button wire:click="editGejalaPenyakit({{ $gejala->id }})" class="px-2 py-1 text-xs font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">Edit</button>
                                        <button @click="confirmDelete = true; deleteId = {{ $gejala->id }}" class="px-2 py-1 text-xs font-medium text-white bg-red-500 rounded hover:bg-red-600">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-sm text-gray-500 text-center">Tidak ada gejala tersedia.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Right Side: Form -->
            <div>
                <div class="mb-4">
                    <x-select label="Kode Gejala" placeholder="Pilih gejala" wire:model="selectedGejala">
                        @foreach ($this->gejala as $item)
                            <option value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }}</option>
                        @endforeach
                    </x-select>
                    @error('selectedGejala')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <x-input type="number" min="0" max="1" step="0.01" label="Nilai Probabilitas" wire:model="probabilitas" />
                    @error('probabilitas')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <input type="hidden" wire:model="selectedGejala" />
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" id="cancelAddModalBtn" wire:click="resetForm" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-300">Reset</button>
                    <button id="saveAddModalBtn" wire:click="saveGejalaPenyakit" type="button" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">Simpan</button>
                </div>
            </div>
        </div>

        <!-- Confirmation Dialog for Delete -->
        <div x-show="confirmDelete" class="fixed inset-0 z-60 flex items-center justify-center bg-black/40 backdrop-blur-sm">
            <div class="bg-white p-6 rounded-md shadow-lg max-w-sm w-full">
                <h4 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h4>
                <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin menghapus gejala ini?</p>
                <div class="flex justify-end gap-2">
                    <button @click="confirmDelete = false; deleteId = null" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Batal</button>
                    <button wire:click="deleteGejalaPenyakit(deleteId)" @click="confirmDelete = false; deleteId = null" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>

<x-section title="Basis Pengetahuan">



<div class="overflow-x-auto">
    <table class="min-w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <x-column>#</x-column>
                <x-column>Kode Penyakit</x-column>
                <x-column>Nama Penyakit</x-column>
                <th class="px-6 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 [&>tr:nth-child(even)]:bg-gray-50">

                @foreach ($this->penyakit as $item)
                <tr class="hover:bg-gray-50">
                    <x-row>{{ $loop->index + $this->penyakit->firstItem()}}</x-row>
                    <x-row>{{ $item->kode}}</x-row>
                    <x-row>{{ $item->nama}}</x-row>
                    <td class="px-6 py-4 text-right space-x-2">
                        <button class="inline-flex items-center px-3 py-2 text-xs font-medium rounded bg-blue-50 text-blue-700 hover:bg-blue-100 transition" wire:click="showGejalaPenyakit({{ $item->id }})">Lihat Gejala Penyakit</button>

                        <!-- <button class="inline-flex items-center px-3 py-2 text-xs font-medium rounded bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition" @click="$wire.dispatch('open-modal')" wire:click="update({{ $item }})">Edit</button> -->
                        <!-- <button class="inline-flex items-center px-3 py-2 text-xs font-medium rounded bg-rose-50 text-rose-700 hover:bg-rose-100 transition confirm-delete-btn" wire:click="delete({{ $item->id }})">Hapus</button> -->
                    </td>

                </tr>
                @endforeach

        </tbody>
    </table>

    <div class="mt-3">

    {{ $this->penyakit->links() }}
    </div>

</div>


</x-section>

</div>
