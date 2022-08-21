<div class="{{ $attributes['class'] }} mb-2">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" @if ($attributes['value']) checked @endif
            id="customSwitch1-{{ $attributes['name'] }}">
        <input type="hidden" name="{{ $attributes['name'] }}" id="customSwitch1-{{ $attributes['name'] }}-input">
        <label class="custom-control-label" for="customSwitch1-{{ $attributes['name'] }}">{{ $attributes['label']
            }}</label>
    </div>
</div>

@push('scripts')
<script>
    $("#customSwitch1-{{ $attributes['name'] }}").on('change', function(){
        $("#customSwitch1-{{ $attributes['name'] }}-input").val(this.checked ? 1 : 0);
        // this.value = this.checked;
        // alert(this.value);
    }).change();
</script>
@endpush