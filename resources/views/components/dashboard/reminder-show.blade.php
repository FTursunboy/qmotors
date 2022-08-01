@php
$model = $attributes['model'];
@endphp
<x-dashboard.info route="reminder" :model="$model">
    <tr>
        <td><b>Автомобиль</b></td>
        <td><a href="{{ route('user-car.show', $model->user_car_id) }}">{{
                optional($model->user_car)->model->name
                }} ({{ $model->user_car_id }})</a></td>
    </tr>
    <tr>
        <td><b>Дата</b></td>
        <td>{{ $model->date }}</td>
    </tr>
    <tr>
        <td><b>Текст</b></td>
        <td>{{ $model->text }}</td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
</x-dashboard.info>