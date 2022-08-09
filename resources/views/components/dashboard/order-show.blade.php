@php
$model = $attributes['model'];
@endphp

<x-dashboard.info route="order" :model="$model">
    <tr>
        <td><b>Номер Заказа</b></td>
        <td>{{ $model->order_number }}</td>
    </tr>
    {{-- <tr>
        <td><b>Телефон</b></td>
        <td>{{ $model->phone }}</td>
    </tr> --}}
    <tr>
        <td><b>Автомобиль</b></td>
        <td><a href="{{ route('user-car.show', $model->user_car_id) }}">{{
                optional($model->user_car)->model->name
                }} ({{ $model->user_car_id }})</a></td>
    </tr>
    <tr>
        <td><b>Технический центр</b></td>
        <td>{{ optional($model->tech_center)->title }}</td>
    </tr>
    <tr>
        <td><b>Дата</b></td>
        <td>{{ $model->date }}</td>
    </tr>
    <tr>
        <td><b>Тип Заказа</b></td>
        <td>{{ optional($model->order_type_relation)->name }}</td>
    </tr>
    <tr>
        <td><b>Запрос по гарантии</b></td>
        <td>{{ $model->guarantee_text }}</td>
    </tr>
    <tr>
        <td><b>Запись по Акции</b></td>
        <td></td>
    <tr>
        <td><b>Комментрия</b></td>
        <td>{{ $model->description }}</td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
</x-dashboard.info>