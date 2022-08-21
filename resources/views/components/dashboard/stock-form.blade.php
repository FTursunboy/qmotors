@php
$model = $attributes['model'];
@endphp

<div class="row">
    <x-dashboard.form-input name="title" label="Заголовок" class="col-md-6" :value="$model->title" />
    <x-dashboard.form-input name="subtitle" label="Подзаголовок" class="col-md-6" :value="$model->subtitle" />
    <x-dashboard.form-textarea name="description" label="Описание" class="col-md-12" :value="$model->description" />
    <x-dashboard.form-text-editor name="text" label="Текст" class="col-md-12" :value="$model->text" />
</div>
<div class="d-flex">
    <x-dashboard.back-button />
    <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
</div>