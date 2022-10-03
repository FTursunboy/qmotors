@php
$model = $attributes['model'];
@endphp


<div class="row">
    <x-dashboard.image-uploader name="avatar" label="Аватар" :default-image="asset($model->avatar)" class="col-md-12" />
    <x-dashboard.form-input name="surname" label="Фамилия" class="col-md-6" :value="$model->surname" />
    <x-dashboard.form-input name="name" label="Имя" class="col-md-6" :value="$model->name" />
    <x-dashboard.form-input name="patronymic" label="Отчество" class="col-md-6" :value="$model->patronymic" />
    <x-dashboard.form-input name="phone_number" label="Номер телефона" class="col-md-6" :value="$model->phone_number" />
    <x-dashboard.form-input type="email" name="email" label="Эл. адрес" class="col-md-6" :value="$model->email" />
    <x-dashboard.form-input type="date" name="birthday" label="Дата рождения" class="col-md-6"
        :value="$model->birthday" />
    <x-dashboard.form-select label="Пол" name="gender" option="name" :options="$genders" :value="$model->gender"
        class="col-md-6" />
    <x-dashboard.form-select label="Подтвержден" name="is_complete" option="name" :options="$statuses"
        :value="$model->is_complete" class="col-md-6" />
    <x-dashboard.form-switcher name="agree_notification" label="Согласие на прием пушей"
        :value="$model->agree_notification" class="col-md-6" />
    <x-dashboard.form-switcher name="agree_sms" label="Согласие на прием СМС" :value="$model->agree_sms"
        class="col-md-6" />
    <x-dashboard.form-switcher name="agree_calls" label="Согласие на прием звонков" :value="$model->agree_calls"
        class="col-md-6" />
    <x-dashboard.form-switcher name="agree_data" label="Согласие на обработку данных - обязательный пункт"
        :value="$model->agree_data" class="col-md-6" />

</div>
<div class="d-flex">
    <x-dashboard.back-button />
    <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
</div>