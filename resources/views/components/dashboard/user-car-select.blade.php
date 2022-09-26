@php
// $options = $attributes['options'];
// $option = $attributes['option'];
$name = $attribute['name']??'user_id';
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
    <label for="{{ $name }}-id">{{ $attributes['label']??'Автомобиль' }}</label>
    <select name="user_car_id" class="form-control" id="{{ $name }}-id" @if($attributes['required']) required @endif>
        @if(!$attributes['not-nullable'])
        <option value="{{ optional($attributes['value'])->id }}" selected>{{ optional($attributes['value'])->title }}
        </option>
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
            placeholder:'Введите ид или название модели',
            ajax: {
                url: "{{ route('user-car.list') }}",
                data: function (params) {
                    var query = {
                        search: params.term,
                        per_page: params.per_page || 100,
                        page: params.page || 1
                    }
                    return query;
                },
                dataType: 'json',
                processResults: function (data, params) {
                    return {
                        results: $.map(data.result, function(obj) {
                            return { 
                                id: obj.id,
                                text: obj.title,
                            };
                        }),
                        pagination: {
                            more: (data.page * 100) < data.filteredCount
                        }
                    };
                }
            },
        });
    });

    // $("#{{ $name }}-id").select2({
    //     ajax: {
    //         url: 'https://api.github.com/search/repositories',
    //         data: function (params) {
    //             var query = {
    //                 search: params.term,
    //                 page: params.page || 1
    //             }
    //             return query;
    //         }
    //     }
    // });
</script>
@endpush