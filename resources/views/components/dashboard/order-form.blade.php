@php
$model = $attributes['model'];
@endphp

<form action="{{ route('order.update', $model->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <x-dashboard.form-input name="null" label="Автомобиль" class="col-md-6" :value="$model->user_car->model->name"
      disabled="1" />
    {{--
    <x-dashboard.form-select name="user_car_id" label="Автомобиль" option="model->name" :options="$cars"
      class="col-md-6" :value="$model->user_car_id" /> --}}
    <x-dashboard.form-select name="tech_center_id" label="Технический центр" option="title" :options="$techCenters"
      class="col-md-6" :value="$model->tech_center_id" />
    <x-dashboard.form-input name="order_number" label="Номер Заказа" class="col-md-6" :value="$model->order_number" />
    {{--
    <x-dashboard.form-input name="phone" label="Телефон" class="col-md-6" :value="$model->phone" /> --}}
    <x-dashboard.form-input type="datetime-local" name="date" label="Дата" class="col-md-6" :value="$model->date" />
    <x-dashboard.form-select name="order_type_id" label="Тип Заказа" option="name" :options="$orderTypes"
      class="col-md-6" :value="$model->order_type_id" />
    <x-dashboard.form-select name="stock_id" label="Акция" option="title" :options="$stocks" class="col-md-6"
      :value="$model->stock_id" />
    <x-dashboard.form-switcher name="guarantee" label="Запрос по гарантии" class="col-md-6"
      :value="$model->guarantee" />
    <x-dashboard.form-switcher name="free_diagnostics" label="Запрос по бесплатная диагностика" class="col-md-6"
      :value="$model->free_diagnostics" />
  </div>
  <div class="d-flex">
    <x-dashboard.back-button />
    <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
  </div>
</form>