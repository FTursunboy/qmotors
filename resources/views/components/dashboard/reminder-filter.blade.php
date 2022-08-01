<x-dashboard.filter-form>
    <x-dashboard.form-select label="Модель Автомобиля" name="model_id" option="name" :options="$models" />
    <x-dashboard.form-range-input label="Дата" name="date" type="date" />
    <x-dashboard.form-input label="Текст" name="text" :value="request('text')" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>