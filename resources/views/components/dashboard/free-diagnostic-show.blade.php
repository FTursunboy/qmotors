@php
$model = $attributes['model'];
@endphp

<x-dashboard.info route="free-diagnostic" :model="$model">

    <tr>
        <td><b>Автомобиль</b></td>
        <td><a href="{{ route('user-car.show', $model->user_car_id) }}">{{
                optional(optional($model->user_car)->model)->name
                }} ({{ $model->user_car_id }})</a></td>
    </tr>
    <tr>
        <td><b>Технический центр</b></td>
        <td><a href="{{ route('tech-center.show', $model->tech_center_id) }}">
                {{optional($model->tech_center)->title }}
            </a>
        </td>
    </tr>
    <tr>
        <td><b>Дата</b></td>
        <td>{{ $model->date }}</td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
</x-dashboard.info>