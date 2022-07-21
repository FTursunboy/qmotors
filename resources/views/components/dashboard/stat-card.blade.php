<div class="widget widget-stats bg-{{ $attributes['color'] }}">
    <div class="stats-icon"><i class="fa fa-{{ $attributes['icon'] }}"></i></div>
    <div class="stats-info">
        <h4>{{ $attributes['title'] }}</h4>
        <p>{{ $attributes['count'] }}</p>
    </div>
    <div class="stats-link">
        <a href="{{ $attributes['url'] }}">Посмотреть детали <i class="fa fa-arrow-alt-circle-right"></i></a>
    </div>
</div>

{{-- <div class="widget widget-stats bg-{{ $attributes['color'] }}">
    <div class="stats-icon stats-icon-lg"><i class="fa fa-{{ $attributes['icon'] }} fa-fw"></i></div>
    <div class="stats-content">
        <div class="stats-title">{{ $attributes['title'] }}</div>
        <div class="stats-number">{{ $attributes['count'] }}</div>
        <div class="stats-progress progress">
            <div class="progress-bar" style="width: 70.1%;"></div>
        </div>
        <div class="stats-desc">Better than last week (70.1%)</div>
    </div>
</div> --}}