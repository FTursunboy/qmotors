<div class="table-responsive">
    <table class="table table-hover table-striped table-valign-middle table-bordered text-center"
        id="{{ $attributes['id'] }}">
        @if (isset($header))
        <thead>
            <tr>
                {{ $header }}
            </tr>
        </thead>
        @endif
        <tbody>
            {{ $body }}
        </tbody>
    </table>
    @if ($attributes['length'] == 0)
    <p class="text-center">Результатов не найдено</p>
    @endif
</div>

@push('scripts')
<script>
    function order(order) {
        const curr_order = @json(request('order'));
        if (curr_order == order) order = `-${order}`
        const current_url = @json(url()->full());
        location.href = updateQueryStringParameter(current_url,'order',order);
    }
</script>
@endpush