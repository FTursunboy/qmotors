@php
$model = $attributes['model'];
@endphp

<form action="{{ route('user-car.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $model->id }}">
    <div class="row">
        <x-dashboard.form-select name="status" label="Статус" option="name" :options="$statuses" class="col-md-6"
            :value="$model->status" />
        <x-dashboard.form-select name="model_id" label="Модель Автомобиля" option="name" :options="$models"
            class="col-md-6" :value="$model->car_model_id" />
        <x-dashboard.form-input type="text" name="year" label="Год" class="col-md-6" :value="$model->year" />
        <x-dashboard.form-input type="text" name="mileage" label="Пробег" class="col-md-6" :value="$model->mileage" />
        <x-dashboard.form-input type="text" name="vin" label="ВИН" class="col-md-6" :value="$model->vin" />
        <x-dashboard.form-input type="date" name="last_visit" label="Последнее Посещение" class="col-md-6"
            :value="$model->last_visit_date" />

    </div>
    <div class="d-flex">
        <x-dashboard.back-button />
        <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
    </div>
</form>