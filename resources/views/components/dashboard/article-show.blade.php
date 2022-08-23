@php
$model = $attributes['model'];
@endphp
<x-dashboard.info route="article" :model="$model">
    <tr>
        <td><b>Заголовок</b></td>
        <td>{{ $model->title }}</td>
    </tr>
    <tr>
        <td><b>Подзаголовок</b></td>
        <td>{{ $model->subtitle }}</td>
    </tr>
    <tr>
        <td><b>Превью</b></td>
        <td><img src="{{ asset($model->preview) }}" width="300"></td>
    </tr>
    <tr>
        <td><b>Текст</b></td>
        <td>{!! $model->text !!}</td>
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