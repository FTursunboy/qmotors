@php
$model = $attributes['model'];
@endphp

<table class="table table-hover table-valign-middle table-bordered" id="{{ $model->id }}">
    <tbody>
        <tr>
            <td><b>Car Model</b></td>
            <td>{{ $model->model->name }}</td>
        </tr>
        <tr>
            <td><b>User</b></td>
            <td>{{ $model->user->full_name }}</td>
        </tr>
        <tr>
            <td><b>Year</b></td>
            <td>{{ $model->year }}</td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td>{{ $model->status }}</td>
        </tr>
        <tr>
            <td><b>Last Visit</b></td>
            <td>{{ $model->last_visit }}</td>
        </tr>
        <tr>
            <td><b>VIN</b></td>
            <td>{{ $model->vin }}</td>
        </tr>
        <tr>
            <td><b>Mileage</b></td>
            <td>{{ $model->mileage }}</td>
        </tr>
        <tr>
            <td><b>Created at</b></td>
            <td>{{ $model->created_at }}</td>
        </tr>
    </tbody>
</table>