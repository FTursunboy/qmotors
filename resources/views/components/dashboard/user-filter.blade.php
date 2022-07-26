<x-dashboard.filter-form>
    <x-dashboard.form-input label="Номер телефона" name="phone_number" :value="request('phone_number')" />
    <x-dashboard.form-input label="Фамилия" name="surname" :value="request('surname')" />
    <x-dashboard.form-input label="Имя" name="name" :value="request('name')" />
    <x-dashboard.form-input label="Очество" name="patronymic" :value="request('patronymic')" />
    <x-dashboard.form-select label="Подтвержён" name="is_complete" option="name" :options="$statuses" />
    <x-dashboard.form-select label="Пол" name="gender" option="name" :options="$genders" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>