<div>
  <label class="block mb-1 text-sm font-medium">{{ $label }}</label>
  <div class="progress-bar progress-bar-{{ $variant ?? 'primary' }}">
    <div class="progress-bar-inner" style="width: {{$value}};"></div>
  </div>
</div>
