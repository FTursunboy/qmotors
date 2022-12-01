@php
    $model = $attributes['model'];
@endphp
<x-dashboard.info route="user" :model="$model">
    <tr>
        <td><b>Эл. адрес</b></td>
        <td>{{ $model->email }}</td>
    </tr>
    <tr>
        <td><b>Телефон</b></td>
        <td><a href="tel:{{ buildPhone($model->phone_number) }}">{{ $model->phone_number }}</a></td>
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
    <tr>
        <td>
            <a target="blank" href="{{ route('user.chat', $model->id) }}">
                <b class="text-dark">Чат</b>
                <i class="fa fa-external-link-alt"></i></a>
        </td>
    </tr>
</x-dashboard.info>
