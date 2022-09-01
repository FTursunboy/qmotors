@php
$model = $attributes['model'];
@endphp

<div class="row">
  {{--
  <x-dashboard.form-input name="null" label="Автомобиль" class="col-md-6" :value="$model->user_car->model->name"
    disabled="1" /> --}}

  <x-dashboard.form-select name="user_car_id" label="Автомобиль" option="title" :options="$cars" class="col-md-6"
    :value="$model->user_car_id" />
  <x-dashboard.form-select name="tech_center_id" label="Технический центр" option="title" :options="$techCenters"
    class="col-md-6" :value="$model->tech_center_id" />
  <x-dashboard.form-select name="free_diagnostic_type_id" label="Тип" option="name" :options="$types" class="col-md-6"
    :value="$model->free_diagnostic_type_id" />
  <x-dashboard.form-input type="datetime-local" name="date" label="Дата" class="col-md-6" :value="$model->date" />
</div>
<div class="d-flex">
  <x-dashboard.back-button />
  <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
</div>