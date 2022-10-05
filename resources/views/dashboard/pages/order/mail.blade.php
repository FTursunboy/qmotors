<h1 class="page-header">Заказ #{{ $model->id }}</h1>
<table>
    <tr>
        <td><b>Описание</b></td>
        <td>{{ $model->description }}</td>
    </tr>
    <tr>
        <td><b>Пробег</b></td>
        <td>{{ $model->mileage }}</td>
    </tr>
    <tr>
        <td><b>Дата</b></td>
        <td>{{ $model->date }}</td>
    </tr>
    <tr>
        <td><b>Гарантия</b></td>
        <td>{{ $model->guarantee_text }}</td>
    </tr>
    <tr>
        <td><b>Бесплатная диагностика</b></td>
        <td>{{ $model->free_diagnostics_text }}</td>
    </tr>
    <tr>
        <td><b>Номер Заказа</b></td>
        <td>{{ $model->order_number }}</td>
    </tr>
    <tr>
        <td><b>Модель авто</b></td>
        <td>{{ optional(optional($model->user_car)->model)->name }}</td>
    </tr>
    <tr>
        <td><b>Номер авто</b></td>
        <td>{{ optional($model->user_car)->number }}</td>
    </tr>
    <tr>
        <td><b>Номер заказа</b></td>
        <td>{{ $model->number }}</td>
    </tr>
    <tr>
        <td><b>Название акции</b></td>
        <td>{{ optional($model->stock)->title }}</td>
    <tr>
</table>
{{-- @dd($url); --}}
<p><a href="{{ route('order.show', $model->id) }}">Подробнее</a></p>