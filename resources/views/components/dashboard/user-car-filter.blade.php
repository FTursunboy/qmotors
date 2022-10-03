<x-dashboard.filter-form>
    <x-dashboard.form-input label="Номер" name="number" :value="request('number')" />
    <x-dashboard.form-select label="Модель Автомобиля" name="model_id" option="name" :options="$models" />
    <x-dashboard.form-select label="Статус" name="status" option="name" :options="$statuses" />
    <x-dashboard.form-input label="Пользовательь" name="user" :value="request('user')" />
    <x-dashboard.form-input label="ВИН" name="vin" :value="request('vin')" />
    <x-dashboard.form-range-input label="Год" name="year" type="number" />
    <x-dashboard.form-range-input label="Пробег" name="mileage" type="number" />
    <x-dashboard.form-range-input label="Бесплатная Диагностика" name="free_diagnostics" type="date" />
    <x-dashboard.form-range-input label="Напоминание" name="reminder" type="date" />
    <x-dashboard.form-range-input label="Заказ" name="order" type="date" />
    <x-dashboard.form-range-input label="Последнее Посещение" name="last_visit" type="date" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>