<div>
    <x-section title="Daftar Penyakit">

        {{ $modalFormState}}

        <x-crud-table
            :items="$this->penyakit"
            :columns="[
            'kode' => 'Kode Penyakit',
            'nama' => 'Nama Penyakit',
            'probabilitas' => 'Nilai Probabilitas']
            "
        />

<div id="modalForm" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm hidden" wire:ignore.self>
    <div class="bg-white w-full max-w-md p-6 rounded-md shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">Masukan Data</h3>
            <button @click="$wire.dispatch('close-modal')" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
        </div>
        <form class="space-y-4" wire:submit="save">

<div>
    <x-input label="Kode Penyakit" wire:model="form.kode" />
    @error('form.kode')
        <p class="text-red-500 text-sm mt-1}}">{{ $message }}</p>
    @enderror

    <x-input label="Nama Penyakit" wire:model="form.nama" />
    @error('form.nama')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    <x-input label="Nilai Probabilitas" wire:model="form.probabilitas" min="0" max="1" step="0.01" />
    @error('form.probabilitas')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    <x-textarea label="Deskripsi Penyakit" wire:model="form.deskripsi" />
    @error('form.deskripsi')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    <x-textarea label="Solusi Penyakit" wire:model="form.solusi" />
    @error('form.solusi')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

            <div class="flex justify-end gap-2 pt-2">
                <button id="saveAddModalBtn" type="submit" class="btn btn-primary">Simpan</button>

            </div>
        </form>
    </div>
</div>

    </x-section>
</div>
