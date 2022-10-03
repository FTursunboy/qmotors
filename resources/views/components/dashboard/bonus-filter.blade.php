<x-dashboard.filter-form>
    <x-dashboard.form-input label="Пользовательь" name="user" :value="request('user')" />
    <x-dashboard.form-select label="Статус" name="status" option="name" :options="$statuses" />
    <x-dashboard.form-select label="Тип" name="bonus_type" option="name" :options="$bonusTypes" />
    <x-dashboard.form-range-input label="Баллы" name="points" type="number" />
    <x-dashboard.form-range-input label="Остаток" name="remainder" type="number" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>