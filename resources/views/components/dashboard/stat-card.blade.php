<div class="widget widget-stats bg-{{ $attributes['color'] }}">
    <div class="stats-icon"><i class="fa fa-{{ $attributes['icon'] }}"></i></div>
    <div class="stats-info">
        <h4>{{ $attributes['title'] }}</h4>
        <p>{{ $attributes['count'] }}</p>
    </div>
    <div class="stats-link">
        <a href="{{ $attributes['url'] }}">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
    </div>
</div>