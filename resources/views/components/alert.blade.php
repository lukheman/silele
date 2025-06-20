<div class="alert alert-{{ $variant ?? 'primary'}}">
    @if (isset($icon))

{{ $icon}}

    @endif
  <div><span class="alert-content">{{ $label }}</span> {{ $slot }}</div>
</div>
