@php
$model = $attributes['model'];
@endphp
<x-dashboard.info route="notification" :model="$model">
    <tr>
        <td><b>Заголовок</b></td>
        <td>{{ $model->title }}</td>
    </tr>
    <tr>
        <td><b>Текст</b></td>
        <td>{{ $model->text }}</td>
    </tr>
    <tr>
        <td><b>Пользователь</b></td>
        <td>
            @if ($model->user_id)
            <a href="{{ route('user.show', $model->user_id) }}">{{ optional($model->user)->full_name }} ({{
                $model->user_id
                }})</a>
            @else
            Все пользователи
            @endif
        </td>
    </tr>
    <tr>
        <td><b>Тип Уведомления</b></td>
        <td>{{ $model->notification_type_text }}</td>
    </tr>
    <tr>
        <td><b>Допонительная ссылка</b></td>
        <td>{{ $model->additional_text }}</td>
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