<x-dashboard.filter-form>
    <x-dashboard.form-select label="Технический центр" name="tech_center_id" option="title" :options="$techCenters" />
    <x-dashboard.form-range-input label="Дата" name="date" type="date" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>