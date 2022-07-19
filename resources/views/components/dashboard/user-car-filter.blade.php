<div>
    <form action="">
        <x-dashboard.form-select label="Модель Автомобиля" name="model_id" option="name" :options="$models" />
        <x-dashboard.form-select label="Ползаватель" name="user_id" option="full_name" :options="$users" />
        <div class="d-flex">
            <button class="btn btn-primary">Фильтровать</button>
            <a class="btn btn-warning ml-auto" href="{{ url()->current() }}">Очистить</a>
        </div>
    </form>

</div>