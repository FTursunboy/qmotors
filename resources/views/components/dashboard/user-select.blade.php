@php
// $options = $attributes['options'];
// $option = $attributes['option'];
$name = $attribute['name']??'user_car_id';
if(isset($attributes['value'])){
if(old($name)){
$selected = old($name);
}else {
$selected = $attributes['value'];
}
}else{
$selected = request()->get($name, null);
}
$defaultOptionLabel = $attributes['default-option-label']??'----------';
@endphp
<div class="form-group {{ $attributes['class'] }}">
    <label for="{{ $name }}-id">{{ $attributes['label']??'Пользователь' }}</label>
    <select name="{{ $name }}" class="form-control" id="{{ $name }}-id" @if($attributes['required']) required @endif>
        @if(!$attributes['not-nullable'])
        <option value="{{ null }}">{{ $defaultOptionLabel }}</option>
        @endif
        {{-- @foreach ($options as $item)
        <option value="{{ $item['id'] }}" @if ($selected!==null and $item['id']==$selected) selected @endif>
            {{ $item[$option] }}</option>
        @endforeach --}}
    </select>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $("#{{ $name }}-id").select2({
            placeholder: "Введите ид , номер телефон или фио (Оставьте пустым, чтобы выбрать всех пользователей)",
            allowClear: true,
            ajax: {
                url: "{{ route('user.list') }}",
                dataType: 'json',
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                processResults: function (data) {
                    return {
                        results: $.map(data, function(obj) {
                            return { id: obj.id, text: obj.fullname };
                        })
                    };
                }
            },
        });
    });
</script>
@endpush