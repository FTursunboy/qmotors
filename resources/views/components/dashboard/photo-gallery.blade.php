@php
$photos = $attributes['photos'];
$name = $attributes['photo'] ?? 'photo';
// dd($name);
@endphp

@if (count($photos)>0)
@push('css')
<link href="{{ asset('/dash/assets/plugins/superbox/superbox.min.css') }}" rel="stylesheet" />
@endpush


<h2 class="page-header">Картинки</h2>

<div class="superbox">
    @foreach ($photos as $item)
    <div class="superbox-list">
        <a href="javascript:;" class="superbox-img">
            <img data-img="{{ asset($item->$name) }}" />
            <span style="background: url({{ asset($item->$name) }});"></span>
        </a>
    </div>
    @endforeach
</div>

@push('scripts')
<script src="{{ asset('/dash/assets/plugins/superbox/jquery.superbox.min.js') }}"></script>
<script src="{{ asset('/dash/assets/js/demo/gallery-v2.demo.js') }}"></script>

@endpush
@endif