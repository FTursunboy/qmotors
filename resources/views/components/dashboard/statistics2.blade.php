<div class="row">
    @foreach ($statistics as $item)
    <div class="col-xl-3 col-md-6">
        <x-dashboard.stat-card2 :item="$item" />
    </div>
    @endforeach
</div>