<div class="card-stats card-stats-{{ $variant ?? 'primary'}}">
  <div class="card-stats-content">
    @if (isset($icon))

    <div class="card-stats-icon">
        {{ $icon }}

    </div>

    @endif
    <div>
      <p class="card-stats-label">{{ $slot }}</p>
      <p class="card-stats-value">{{ $value ?? 0 }}</p>
    </div>
  </div>
</div>
