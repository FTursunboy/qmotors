@php
$pages = [10,20,50,100];
@endphp
<div class="d-flex justify-content-between mb-2 form-inline">
    <div>
        Показать
        <select name="per_page" class="custom-select" id="per_page" onchange="per_page()">
            @foreach ($pages as $item)
            <option value="{{ $item }}" @if ($item==request()->get('per_page', 20)) selected @endif>{{ $item }}</option>
            @endforeach
        </select> записи
    </div>
    {{-- <label class="font-weight-bold">Search:
        <input type="text" name="search" class="ml-2 form-control" value="{{ request('search') }}"
            onchange="this.form.submit()" autofocus>
    </label> --}}
</div>

<script>
    function per_page() {
        const per_page = document.getElementById("per_page").value;
        const current_url = @json(url()->full());
        location.href = updateQueryStringParameter(current_url,'per_page',per_page);
    }
</script>