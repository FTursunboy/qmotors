@php
$model = $attributes['model'];
@endphp
<table class="table table-hover table-valign-middle table-bordered" id="{{ $model->id }}">
    <tbody>
        {{ $slot }}
    </tbody>
</table>
<div class="d-flex">
    <x-dashboard.back-button />
    <a href="{{ route($attributes['route'] . '.edit', $model->id) }}" class="btn btn-primary ml-auto mr-2 ">Изменить</a>
    <form action="{{ route($attributes['route'] . '.delete', $model->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Ты уверен?')">Удалить</button>
    </form>
</div>