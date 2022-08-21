@php
$model = $attributes['model'];
@endphp
<form action="{{ route('review.update', $model->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <x-dashboard.form-input name="order_id" label="Заказ-наряд" class="col-md-6" disabled
            :value="$model->order_id" />
        <x-dashboard.form-input name="rating" label="Рейтинг" class="col-md-6" :value="$model->rating" />
        <x-dashboard.form-textarea name="comment" label="Комментарии" class="col-md-12" :value="$model->comment" />
        <x-dashboard.form-switcher name="moderated" label="Промодирован" :value="$model->moderated" class="col-md-6" />
    </div>
    <div class="d-flex">
        <x-dashboard.back-button />
        <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
    </div>
</form>