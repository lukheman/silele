<div id="confirmDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm hidden">
    <div class="bg-white w-full max-w-md p-6 rounded-md shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">Konfirmasi Hapus</h3>
            <button id="closeDeleteModalBtn" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
        </div>
        <div class="mb-4">
            <p class="text-gray-700 text-sm">Apakah Anda yakin ingin menghapus data?</p>
        </div>
        <div class="flex justify-end gap-2 pt-2">
            <button id="cancelDeleteBtn" class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">Batal</button>
            <button id="confirmDeleteBtn" class="px-4 py-2 text-sm text-white bg-rose-600 rounded-md shadow hover:bg-rose-700">Iya</button>
        </div>
    </div>
</div>
