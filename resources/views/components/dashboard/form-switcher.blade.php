<div class="{{ $attributes['class'] }} mb-2">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" name="{{ $attributes['name'] }}" @if ($attributes['value'])
            checked @endif id="customSwitch1-{{ $attributes['name'] }}">
        <label class="custom-control-label" for="customSwitch1-{{ $attributes['name'] }}">{{ $attributes['label']
            }}</label>
    </div>
</div>