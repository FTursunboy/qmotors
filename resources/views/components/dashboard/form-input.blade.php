<div class="form-group {{ $attributes['class'] }}">
    @if ($attributes['label'])
    <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    @endif
    <input type="{{ $attributes['type'] }}" name="{{ $attributes['name'] }}" class="form-control"
        id="{{ $attributes['name'] }}-id" value="{{ old($attributes['name'], $attributes['value']) }}"
        placeholder="{{ $attributes['placeholder'] }}" />
    @error($attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>