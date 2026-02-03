<div>

    <x-section title="Diagnosis">
        <div wire:show="!showHasil">
            <p class="mb-2 font-medium">Pilih Gejala:</p>
            <div class="grid grid-cols-1 gap-2">
                @foreach ($this->gejala as $item)
                    <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <input type="checkbox" wire:model="selectedGejala" value="{{ $item->id }}"
                            id="gejala-{{ $item->id }}"
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer" />
                        <label for="gejala-{{ $item->id }}"
                            class="ml-3 text-sm font-medium text-gray-900 cursor-pointer flex-grow">
                            {{ $item->kode}} - {{ $item->nama }}
                        </label>
                    </div>
                @endforeach
            </div>

            <x-button wire:click="startDiagnosis" class="mt-2">Diagnosis</x-button>
        </div>

        <div class="mt-4" wire:show="showHasil">
            @if ($hasilDiagnosis && $hasilDiagnosis->count() > 0)
                {{-- Hasil Tertinggi --}}
                @php $tertinggi = $hasilDiagnosis->first(); @endphp
                <div class="mb-6 p-6 bg-green-50 border-2 border-green-200 rounded-xl">
                    <div class="text-center mb-4">
                        <span class="inline-block px-3 py-1 bg-green-600 text-white text-sm font-semibold rounded-full">
                            Hasil Diagnosis Tertinggi
                        </span>
                    </div>

                    <div class="flex flex-col md:flex-row gap-6">
                        {{-- Gambar --}}
                        <div class="flex-shrink-0 w-full md:w-48">
                            @if (!empty($tertinggi->photo))
                                <img src="{{ asset('storage/' . $tertinggi->photo) }}"
                                    alt="{{ $tertinggi->nama }}"
                                    class="w-full h-48 rounded-lg shadow-md object-cover">
                            @else
                                <div class="w-full h-48 rounded-lg bg-gray-100 border border-gray-200 flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-xs text-gray-400 mt-2">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>

                        <div class="flex-grow">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $tertinggi->nama }}</h3>
                                <div class="mt-2 md:mt-0 text-right">
                                    <span class="text-3xl font-bold text-green-600">{{ $tertinggi->persentase }}%</span>
                                    <p class="text-sm text-gray-500">Probabilitas</p>
                                </div>
                            </div>

                            <div class="text-sm text-gray-600 bg-white rounded-lg p-4 border border-gray-100 mb-3">
                                <strong class="text-gray-700">Deskripsi:</strong>
                                <p class="mt-1">{{ $tertinggi->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
                            </div>

                            <div class="text-sm text-gray-600 bg-white rounded-lg p-4 border border-gray-100">
                                <strong class="text-gray-700">Solusi:</strong>
                                <p class="mt-1">{{ $tertinggi->solusi ?? 'Tidak ada solusi tersedia.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Semua Hasil --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Semua Hasil Diagnosis</h3>
                        <p class="text-sm text-gray-500">Diurutkan berdasarkan probabilitas tertinggi</p>
                    </div>

                    <div class="divide-y divide-gray-100">
                        @foreach ($hasilDiagnosis as $index => $penyakit)
                            <div class="p-5 {{ $index === 0 ? 'bg-green-50' : 'hover:bg-gray-50' }} transition-colors">
                                {{-- Header: Ranking, Photo, Nama, Probabilitas --}}
                                <div class="flex items-center gap-4 mb-4">
                                    {{-- Ranking --}}
                                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full {{ $index === 0 ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-600' }} font-bold">
                                        {{ $index + 1 }}
                                    </div>

                                    {{-- Photo --}}
                                    <div class="flex-shrink-0 w-16 h-16">
                                        @if (!empty($penyakit->photo))
                                            <img src="{{ asset('storage/' . $penyakit->photo) }}" alt="{{ $penyakit->nama }}"
                                                class="w-16 h-16 rounded-lg object-cover">
                                        @else
                                            <div class="w-16 h-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Nama --}}
                                    <div class="flex-grow">
                                        <span class="text-xs font-medium {{ $index === 0 ? 'text-green-600' : 'text-gray-500' }} uppercase">{{ $penyakit->kode }}</span>
                                        <h4 class="text-lg font-bold text-gray-800">{{ $penyakit->nama }}</h4>
                                    </div>

                                    {{-- Probabilitas --}}
                                    <div class="flex-shrink-0 text-right">
                                        <span class="text-2xl font-bold {{ $index === 0 ? 'text-green-600' : 'text-gray-700' }}">
                                            {{ $penyakit->persentase }}%
                                        </span>
                                        <p class="text-xs text-gray-400">{{ $penyakit->probabilitas }}</p>
                                    </div>
                                </div>

                                {{-- Deskripsi --}}
                                <div class="mb-3 p-4 rounded-lg {{ $index === 0 ? 'bg-green-100/50' : 'bg-gray-50' }}">
                                    <strong class="text-sm text-gray-700">Deskripsi:</strong>
                                    <p class="mt-1 text-sm text-gray-600">{{ $penyakit->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
                                </div>

                                {{-- Solusi --}}
                                <div class="p-4 rounded-lg {{ $index === 0 ? 'bg-green-100/50' : 'bg-gray-50' }}">
                                    <strong class="text-sm text-gray-700">Solusi:</strong>
                                    <p class="mt-1 text-sm text-gray-600">{{ $penyakit->solusi ?? 'Tidak ada solusi tersedia.' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Tombol Ulangi --}}
            <div class="mt-6 text-center">
                <x-button wire:click="resetDiagnosis">Diagnosis Lagi</x-button>
            </div>
        </div>
    </x-section>

</div>