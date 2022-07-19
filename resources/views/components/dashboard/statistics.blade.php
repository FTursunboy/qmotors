<div class="row">
    {{-- @dd($statistics) --}}
    @foreach ($statistics as $item)
    {{-- @dd($item) --}}
    <div class="col-xl-3 col-md-6">
        <x-dashboard.stat-card :color="$item['color']" :title="$item['title']" :icon="$item['icon']"
            :count="$item['count']" :url="$item['url']" />
    </div>
    @endforeach
</div>