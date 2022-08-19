@php
$model = $attributes['model'];
@endphp
<x-dashboard.info route="review" :model="$model">
    <tr>
        <td><b>Рейтинг</b></td>
        <td>{{ $model->rating }}</td>
    </tr>
    <tr>
        <td><b>Комментарии</b></td>
        <td>{{ $model->comment }}</td>
    </tr>
    <tr>
        <td><b>Промодирирован</b></td>
        <td>{{ $model->moderated_text }}</td>
    </tr>
    <tr>
        <td><b>Заказ-наряд</b></td>
        <td><a href="{{ route('order.show', $model->order_id) }}">{{ $model->order_id }}</a></td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
    <tr>
        <td><b>Обновлено</b></td>
        <td>{{ $model->updated_at }}</td>
    </tr>
</x-dashboard.info>