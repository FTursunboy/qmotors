@php
$model = $attributes['model'];
@endphp


<div class="row">
    <x-dashboard.form-select label="Пользователь" name="user_id" option="full_name" :options="$users"
        :value="$model->user_id" class="col-md-6" />
    <x-dashboard.form-select label="Тип" name="bonus_type" option="name" :options="$bonusTypes"
        :value="$model->bonus_type" class="col-md-6" />
    <x-dashboard.form-input name="points" label="Баллы" class="col-md-6" :value="$model->points" />
    <x-dashboard.form-input name="title" label="Название" class="col-md-6" :value="$model->title" />
</div>
<div class="d-flex">
    <x-dashboard.back-button />
    <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
</div>