@php
    $model = $attributes['model'];
@endphp

<x-dashboard.info route="order" :model="$model">
    <tr>
        <td><b>Номер Заказа</b></td>
        <td>{{ $model->order_number }}</td>
    </tr>
     <tr>
        <td><b>Номер телефон пользователя</b></td>
        <td>@if($model->user_car && $model->user_car->user)
                <a href="{{ route('user.show', $model->user_car->user_id ?? 1) }}">
                    {{ $model->user_car->user->name ?? ' ' . ' ' . $model->user_car->user->phone_number ?? ' ' }}
                </a>
            @else
                <a href=""> </a>
            @endif
        </td>
    </tr>
    <tr>
        <td><b>Автомобиль</b></td>
        <td><a href="{{ route('user-car.show', $model->user_car_id) }}">{{ $model->user_car->title }}</a>
        </td>
    </tr>
    <tr>
        <td><b>Пробег</b></td>
        <td>{{ $model->mileage }}</td>
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
        <td><b>Запрос по бесплатной диагностике</b></td>
        <td>{{ $model->free_diagnostics_text }}</td>
    </tr>
    <tr>
        <td><b>Номер телефона</b></td>
        <td>{{ $model->phone }}</td>
    <tr>
    <tr>
        <td><b>Запись по Акции</b></td>
        <td>{{ optional($model->stock)->title }}</td>
    <tr>
        <td><b>Комментрия</b></td>
        <td>{{ $model->description }}</td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>

</x-dashboard.info>
