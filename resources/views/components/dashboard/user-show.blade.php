@php
$model = $attributes['model'];
@endphp
<table class="table table-hover table-valign-middle table-bordered" id="{{ $model->id }}">
    <tbody>
        <tr>
            <td><b>Эл. адрес</b></td>
            <td>{{ $model->email }}</td>
        </tr>
        <tr>
            <td><b>Телефон</b></td>
            <td><a href="tel:{{ $model->phone_number }}">{{ $model->phone_number }}</a></td>
        </tr>
        <tr>
            <td><b>ФИО</b></td>
            <td>{{ $model->full_name }}</td>
        </tr>
        <tr>
            <td><b>Пол</b></td>
            <td>{{ $model->gender_text }}</td>
        </tr>
        <tr>
            <td><b>День рождения</b></td>
            <td>{{ $model->birthday }}</td>
        </tr>
        <tr>
            <td><b>Дополнительный номер телефона</b></td>
            <td><a href="tel:{{ $model->addtional_phone_number }}">{{ $model->addtional_phone_number }}</a></td>
        </tr>
    </tbody>
</table>
<div class="d-flex">
    <x-dashboard.back-button />
    {{-- <a href="{{ route('user-car.edit', $model->id) }}" class="btn btn-primary ml-auto mr-2 ">Изменить</a>
    <form action="{{ route('user-car.delete', $model->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Ты уверен?')">Удалить</button>
    </form> --}}
</div>