@php
$item = $attributes['item'];
@endphp
<div class="card border-0 bg-dark text-white text-truncate mb-3">
    <!-- begin card-body -->
    <div class="card-body">
        <!-- begin title -->
        <div class="mb-3 text-grey">
            <b class="mb-3">{{ $item['title'] }}</b>
            <span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover"
                    data-placement="top" data-content="{{ $item['info'] }}" data-original-title="" title=""></i></span>
        </div>
        <!-- end title -->
        <!-- begin conversion-rate -->
        <div class="d-flex align-items-center mb-1">
            <h2 class="text-white mb-0"><span data-animation="number" data-value="{{ $item['count'] }}">0.00</span>
            </h2>
            <div class="ml-auto">
                <div id="conversion-rate-sparkline"></div>
            </div>
        </div>
        <!-- end conversion-rate -->
        <!-- begin percentage -->
        <div class="mb-4 text-grey">
            Все время
        </div>
        <!-- end percentage -->
        <!-- begin info-row -->
        @foreach ($item['counts'] as $key => $value)
        <div class="d-flex mb-2">
            <div class="d-flex align-items-center">
                <i class="fa fa-circle text-blue f-s-8 mr-2"></i>
                {{ $key }}
            </div>
            <div class="d-flex align-items-center ml-auto">

                <div class="width-50 text-right pl-2 f-w-600"><span data-animation="number"
                        data-value="{{ $value }}">0.00</span></div>
            </div>
        </div>
        @endforeach
        <!-- end info-row -->
    </div>
    <!-- end card-body -->
</div>