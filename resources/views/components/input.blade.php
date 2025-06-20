
<div>
@if (isset($disabled))

    <label class="block mb-1 text-sm font-medium text-gray-400" for="input-disabled">{{ $label }}</label>
    <input id="input-disabled" type="{{ $type ?? 'text'}}" class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-md text-gray-400" placeholder="{{ $placeholder ?? ''}}" disabled wire:model={{ $attributes->get('wire:model') }} />

@else
    <label class="block mb-1 text-sm font-medium">{{ $label }}</label>
    <input type="{{ $type ?? 'text'}}" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="{{ $placeholder ?? ''}}"  />
@endif
</div>
