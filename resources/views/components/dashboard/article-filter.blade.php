<x-dashboard.filter-form>
    <x-dashboard.form-input label="Заголовок" name="title" :value="request('title')" />
    <x-dashboard.form-input label="Подзаголовок" name="subtitle" :value="request('subtitle')" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>