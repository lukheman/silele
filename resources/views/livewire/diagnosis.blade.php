<div>

<x-section title="Diagnosis">
    <div wire:show="!showHasil">
        <p class="mb-2 font-medium">Pilih Gejala:</p>
        <div class="grid grid-cols-1 gap-2">
            @foreach ($this->gejala as $item)
            <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <input
                    type="checkbox"
                    wire:model="selectedGejala"
                    value="{{ $item->id }}"
                    id="gejala-{{ $item->id }}"
                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer"
                />
                <label for="gejala-{{ $item->id }}" class="ml-3 text-sm font-medium text-gray-900 cursor-pointer flex-grow">
                    {{ $item->nama }}
                </label>
            </div>
            @endforeach
        </div>

    <x-button wire:click="startDiagnosis" class="mt-2">Diagnosis</x-button>
    </div>


<div class="mt-8 flex justify-center" wire:show="showHasil">
    <div class="w-full max-w-lg rounded-xl p-8 flex flex-col gap-6">
        <div class="text-2xl font-semibold text-center text-gray-800">
            {{ $diagnosaPenyakit->nama ?? 'Tidak ada penyakit terdeteksi' }}
        </div>
        <div class="text-sm text-gray-600 bg-gray-50 rounded-lg p-5 border border-gray-100">
            <strong class="text-gray-700">Deskripsi:</strong>
            <p class="mt-2">{{ $diagnosaPenyakit->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
        </div>
        <div class="text-sm text-gray-600 bg-gray-50 rounded-lg p-5 border border-gray-100">
            <strong class="text-gray-700">Solusi:</strong>
            <p class="mt-2">{{ $diagnosaPenyakit->solusi ?? 'Tidak ada solusi tersedia.' }}</p>
        </div>
        <x-button wire:click="resetDiagnosis">Diagnosis Lagi</x-button>
    </div>
</div>
</x-section>

</div>
