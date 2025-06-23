<label class="inline-flex items-center">
    <input type="checkbox" class="form-checkbox text-blue-600" {{ isset($checked) ? 'checked' : ''}} wire:model="{{ $attributes->get('wire:model')}}" value="{{ $attributes->get('value')}}"/>
    <span class="ml-2">{{ $label }}</span>
</label>
