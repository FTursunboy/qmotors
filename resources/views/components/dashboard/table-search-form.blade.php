@php
$pages = [10,20,50,100];
@endphp
<form action="" class="d-flex justify-content-between mb-2 form-inline">
    <input type="hidden" name="order" value="{{ request()->get('order', '-id') }}">
    <div>
        Show
        <select name="per_page" id="" class="custom-select" onchange="this.form.submit()">
            @foreach ($pages as $item)
            <option value="{{ $item }}" @if ($item==request()->get('per_page', 20)) selected @endif>{{ $item }}</option>
            @endforeach
        </select> entries
    </div>
    {{-- <label class="font-weight-bold">Search:
        <input type="text" name="search" class="ml-2 form-control" value="{{ request('search') }}"
            onchange="this.form.submit()" autofocus>
    </label> --}}
</form>

<script>
    function order(order) {
        const curr_order = @json(request('order'));
        if (curr_order == order) order = `-${order}`
        const current_url = @json(url()->full());
        location.href = updateQueryStringParameter(current_url,'order',order);
    }

    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }
    }
</script>