@php
$model = $attributes['model'];
@endphp

<form action="{{ route('reminder.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <x-dashboard.form-input name="null" label="Автомобиль" class="col-md-6" :value="$model->user_car->model->name"
            disabled="1" />
        <x-dashboard.form-input type="datetime-local" name="date" label="Дата" class="col-md-6" :value="$model->date" />
        <x-dashboard.form-textarea class="col-md-12" name="text" :value="$model->text" label="Текст" />
        <x-dashboard.form-switcher name="send" label="Отправить уведомление" class="col-md-12" />
    </div>
    <div class="d-flex">
        <x-dashboard.back-button />
        <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
    </div>
</form>