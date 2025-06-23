<div>

    <x-section title="Riwayat Diagnosis">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <x-column>#</x-column>
                        <x-column>Tanggal Pemeriksaan</x-column>
                        @if (auth()->user()->role === 'admin')
                            <x-column>Nama Peternak</x-column>
                        @endif
                        <x-column>Diagnosa Penyakit</x-column>
                        <x-column>Probabilitas</x-column>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 [&>tr:nth-child(even)]:bg-gray-50">

                    @foreach ($this->riwayat as $item)
                    <tr class="hover:bg-gray-50">
                        <x-row>{{ $loop->index + $this->riwayat->firstItem()}}</x-row>
                        <x-row>{{ $item->created_at }}</x-row>

                        @if (auth()->user()->role === 'admin')
                            <x-row>{{ $item->peternak->name }}</x-row>
                        @endif
                        <x-row>{{ $item->penyakit->nama }}</x-row>
                        <x-row>{{ $item->probabilitas }}</x-row>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="mt-3">

                {{ $this->riwayat->links() }}
            </div>

        </div>

    </x-section>

</div>
