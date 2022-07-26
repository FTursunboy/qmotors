@php
$model = $attributes['model'];
@endphp
<x-dashboard.info route="tech-center" :model="$model">
    <tr>
        <td><b>Название</b></td>
        <td>{{ $model->title }}</td>
    </tr>
    <tr>
        <td><b>Телефон</b></td>
        <td>{{ $model->phone }}</td>
    </tr>
    <tr>
        <td><b>Адрес</b></td>
        <td>{{ $model->address }}</td>
    </tr>
    <tr>
        <td><b>Url</b></td>
        <td><a href="{{ $model->url }}" target="blank">{{ $model->url }}</a></td>
    </tr>
    <tr>
        <td><b>Широта</b></td>
        <td>{{ $model->lat }}</td>
    </tr>
    <tr>
        <td><b>Долгота</b></td>
        <td>{{ $model->lng }}</td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
</x-dashboard.info>