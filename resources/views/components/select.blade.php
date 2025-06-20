<div>
    <label class="block mb-1 text-sm font-medium" for="input-select">{{ $label ?? '' }}</label>
    <select id="input-select" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" wire:model="{{ $attributes->get('wire:model')}}">
        @if (isset($placeholder)) <option>{{ $placeholder }}</option> @endif
        {{ $slot }}
    </select>
</div>
