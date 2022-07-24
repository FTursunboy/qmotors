<div class="btn-group btn-group-justified mb-2">
    <a class="btn btn-default @if(request('guarantee')==null) active @endif"
        href="{{ request()->fullUrlWithQuery(['guarantee' => null]) }}">Все ({{ $all }})</a>
    <a class="btn btn-default @if(request('guarantee')=='1') active @endif"
        href="{{ request()->fullUrlWithQuery(['guarantee' => true]) }}">Гарантийный ({{
        $guarantee }})</a>
    <a class="btn btn-default @if(request('guarantee')=='0') active @endif"
        href="{{ request()->fullUrlWithQuery(['guarantee' => false]) }}">Не Гарантийный ({{ $all
        -
        $guarantee }})</a>
</div>