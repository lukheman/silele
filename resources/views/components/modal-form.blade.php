@props([
    'fields' => []
])

<!-- Modal Add Data (hidden by default) -->
<div id="modalForm" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm hidden" wire:ignore.self>
    <div class="bg-white w-full max-w-md p-6 rounded-md shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">Masukan Data</h3>
            <button @click="$wire.dispatch('close-modal')" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
        </div>
        <form class="space-y-4" wire:submit="save">

            @foreach ($fields as $field => $label)

                <x-input label="{{ $label }}" wire:model="form.{{ $field }}"  />
                @error("form." . $field)

                    {{ $message }}

                @enderror

            @endforeach

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" id="cancelAddModalBtn" class="btn">Cancel</button>
                <button id="saveAddModalBtn" type="submit" class="btn btn-primary">Simpan</button>

            </div>
        </form>
    </div>
</div>
