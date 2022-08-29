@php
$model = $attributes['model'];
@endphp

<div class="row">
    <x-dashboard.form-input name="title" label="Заголовок" class="col-md-6" :value="$model->title" required />
    <x-dashboard.form-select label="Пользователь" name="user_id" option="full_name" :options="$users"
        :value="$model->user_id" class="col-md-6" required />
    <x-dashboard.form-input type="number" name="notification_type" label="Тип Уведомления" class="col-md-6"
        :value="$model->notification_type" required />
    <x-dashboard.form-input type="number" name="additional_id" label="Допонительная ссылка" class="col-md-6"
        :value="$model->additional_id" required />
    <x-dashboard.form-textarea name="text" label="Текст" class="col-md-12" :value="$model->text" />
    <x-dashboard.form-switcher name="send" label="Отправить уведомление" class="col-md-12" />
</div>
<div class="d-flex">
    <x-dashboard.back-button />
    <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
</div>