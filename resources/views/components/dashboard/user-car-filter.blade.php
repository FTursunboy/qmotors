<div>
    <form action="">

        <x-dashboard.form-select label="Модель Автомобиля" name="model_id" option="name" :options="$models" />
        <x-dashboard.form-select label="Статус" name="status" option="name" :options="$statuses" />
        <x-dashboard.form-input label="Пользаватель" name="user" :value="request('user')" />
        <x-dashboard.form-input label="ВИН" name="vin" :value="request('vin')" />
        <x-dashboard.form-range-input label="Год" name="year" type="number" />
        <x-dashboard.form-range-input label="Пробег" name="mileage" type="number" />
        <x-dashboard.form-range-input label="Безплатная Диагностика" name="free_diagnostics" type="date" />
        <x-dashboard.form-range-input label="Напоминание" name="reminder" type="date" />
        <x-dashboard.form-range-input label="Заказ" name="order" type="date" />
        <x-dashboard.form-range-input label="Последнее Посещение" name="last_visit" type="date" />
        <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
        <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />

        <div class="d-flex">
            <button class="btn btn-primary">Фильтровать</button>
            <a class="btn btn-warning ml-auto" href="{{ url()->current() }}">Очистить</a>
        </div>
    </form>

</div>