@php
$options = $attributes['options'];
$option = $attributes['option'];
if(isset($attributes['value'])){
if(old($attributes['name'])){
$selected = old($attributes['name']);
}else {
$selected = $attributes['value'];
}
}else{
$selected = request()->get($attributes['name'], null);
}
@endphp
<div class="form-group {{ $attributes['class'] }}">
    <label for="{{ $attributes['name'] }}-id">{{ $attributes['label'] }}</label>
    <select name="{{ $attributes['name'] }}" class="select2 form-control" id="{{ $attributes['name'] }}-id">
        @if(!$attributes['not-nullable'])
        <option value="{{ null }}">----------</option>
        @endif
        @foreach ($options as $item)
        <option value="{{ $item['id'] }}" @if ($selected!==null and $item['id']==$selected) selected @endif>
            {{ $item[$option] }}</option>
        @endforeach
    </select>
    @error($attributes['name'])
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>