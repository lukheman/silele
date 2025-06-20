<div>
    <label class="block mb-1 text-sm font-medium">{{ $label}}</label>
    <textarea rows="3" class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="{{ $placeholder ?? ''}}" wire:model="{{ $attributes->get('wire:model')}}"></textarea>
</div>
