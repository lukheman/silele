<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
    <h2 class="text-lg font-semibold">{{ $modelName ?? '' }}</h2>
    <div class="flex items-center gap-2 w-full sm:w-auto">
        <!-- <input x-model="search" type="text" placeholder="Search..." class="px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm w-32" /> -->
        <x-button @click="$wire.dispatch('open-modal'); $wire.dispatch('resetForm')">Tambah {{ $modelName ?? '' }}</x-button>
    </div>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <x-column>#</x-column>
                @foreach ($columns as $column => $label)
                    <x-column>{{ ucfirst($label)}}</x-column>
                @endforeach
                <!-- column for action -->
                <th class="px-6 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 [&>tr:nth-child(even)]:bg-gray-50">

                @foreach ($items as $item)
                <tr class="hover:bg-gray-50">
                    <x-row>{{ $loop->index + $items->firstItem()}}</x-row>
                    @foreach ($columns as $column => $label)
                    <x-row>{{ $item->$column}}</x-row>
                    @endforeach

                <td class="px-6 py-4 text-right space-x-2">
                    <!-- <button class="inline-flex items-center px-3 py-2 text-xs font-medium rounded bg-blue-50 text-blue-700 hover:bg-blue-100 transition">Detail</button> -->
                    <button class="inline-flex items-center px-3 py-2 text-xs font-medium rounded bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition" @click="$wire.dispatch('open-modal')" wire:click="update({{ $item }})">Edit</button>
                    <button class="inline-flex items-center px-3 py-2 text-xs font-medium rounded bg-rose-50 text-rose-700 hover:bg-rose-100 transition confirm-delete-btn" wire:click="delete({{ $item->id }})">Hapus</button>
    </td>

                </tr>
                @endforeach

        </tbody>
    </table>

    <div class="mt-3">

    {{ $items->links() }}
    </div>

</div>
