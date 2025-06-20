<label class="inline-flex items-center">
    <input type="radio" class="form-radio text-blue-600" {{ isset($checked) ? 'checked' : null}} wire:model="{{ $attributes->get('wire:model')}}"/>
    <span class="ml-2">{{ $label }}</span>
</label>
