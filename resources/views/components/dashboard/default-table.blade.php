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
    <p class="text-center">No result found</p>
    @endif
</div>