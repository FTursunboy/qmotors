@php
    $model = $attributes['model'];
@endphp

<div class="row">
    <x-dashboard.user-car-select class="col-md-6" :value="$model->user_car" required/>
    <x-dashboard.form-select name="tech_center_id" label="Технический центр" option="title" :options="$techCenters"
                             class="col-md-6" :value="$model->tech_center_id"/>
    <x-dashboard.form-input name="order_number" label="Номер Заказа" class="col-md-6" :value="$model->order_number"/>
    <x-dashboard.form-input name="mileage" label="Пробег" class="col-md-6" :value="$model->mileage"/>
    <x-dashboard.form-select name="order_type_id" label="Тип Заказа" option="name" :options="$orderTypes"
                             class="col-md-6"
                             :value="$model->order_type_id"/>
    <x-dashboard.form-select name="stock_id" label="Акция" option="title" :options="$stocks" class="col-md-6"
                             :value="$model->stock_id"/>
    <x-dashboard.form-input type="datetime-local" name="date" label="Дата" class="col-md-6" :value="$model->date"/>
    <x-dashboard.form-input name="phone" label="Номер телефон клиента" class="col-md-6" :value="$model->phone"/>
    <x-dashboard.form-input name="url" label="Url" class="col-md-6" :value="$model->url"/>
    <x-dashboard.form-switcher name="guarantee" label="Запрос по гарантии" class="col-md-3" :value="$model->guarantee"/>
    <x-dashboard.form-switcher name="free_diagnostics" label="Запрос по бесплатной диагностике" class="col-md-3"
                               :value="$model->free_diagnostics"/>
    <x-dashboard.form-textarea name="description" label="Описание" class="col-md-12" :value="$model->description"/>
</div>
<div class="d-flex">
    <x-dashboard.back-button/>
    <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
</div>
