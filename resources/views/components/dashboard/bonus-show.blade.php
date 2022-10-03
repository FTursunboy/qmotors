@php
$model = $attributes['model'];
@endphp
<x-dashboard.info route="bonus" :model="$model">
    <tr>
        <td><b>Статус</b></td>
        <td>{{ $model->status_text }}</td>
    </tr>
    <tr>
        <td><b>Тип</b></td>
        <td>{{ $model->bonus_type_text }}</td>
    </tr>
    <tr>
        <td><b>Название</b></td>
        <td>{{ $model->title }}</td>
    </tr>
    <tr>
        <td><b>Баллы</b></td>
        <td>{{ $model->points }}</td>
    </tr>
    <tr>
        <td><b>Остаток</b></td>
        <td>{{ $model->remainder }}</td>
    </tr>
    <tr>
        <td><b>Пользовательь</b></td>
        <td><a href="{{ route('user.show', $model->user_id) }}">{{ $model->user->full_name }} ({{ $model->user_id
                }})</a>
        </td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
    <tr>
        <td><b>Дейсвителен до</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Обновлено</b></td>
        <td>{{ $model->updated_at }}</td>
    </tr>
</x-dashboard.info>