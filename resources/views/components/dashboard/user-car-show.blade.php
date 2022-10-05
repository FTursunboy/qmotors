@php
$model = $attributes['model'];
@endphp
<x-dashboard.info route="user-car" :model="$model">
    <tr>
        <td><b>Модель Автомобиля</b></td>
        <td>{{ $model->model->name }}</td>
    </tr>
    <tr>
        <td><b>Пользователь</b></td>
        <td>{{ $model->user->full_name }}</td>
    </tr>
    <tr>
        <td><b>Год</b></td>
        <td>{{ $model->year }}</td>
    </tr>
    <tr>
        <td><b>Статус</b></td>
        <td>{{ $model->status_text }}</td>
    </tr>
    <tr>
        <td><b>Последнее Посещение</b></td>
        <td>{{ $model->last_visit }}</td>
    </tr>
    <tr>
        <td><b>ВИН</b></td>
        <td>{{ $model->vin }}</td>
    </tr>
    <tr>
        <td><b>Пробег</b></td>
        <td>{{ $model->mileage }}</td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
</x-dashboard.info>