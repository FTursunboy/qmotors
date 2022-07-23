@php
$model = $attributes['model'];
@endphp

<table class="table table-hover table-valign-middle table-bordered" id="{{ $model->id }}">
    <tbody>
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
    </tbody>
</table>
<div class="d-flex">
    <x-dashboard.back-button />
    <a href="{{ route('user-car.edit', $model->id) }}" class="btn btn-primary ml-auto mr-2 ">Изменить</a>
    <form action="{{ route('user-car.delete', $model->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Ты уверен?')">Удалить</button>
    </form>
</div>