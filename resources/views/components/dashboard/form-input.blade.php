<div class="form-group {{ $attributes['class'] }}">
    <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    <input type="{{ $attributes['type'] }}" name="{{ $attributes['name'] }}" class="form-control"
        id="{{ $attributes['name'] }}-id" value="{{ old($attributes['name'], $attributes['value']) }}" />
    @error($attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>