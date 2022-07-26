<x-dashboard.filter-form>
    <x-dashboard.form-input label="Название" name="title" :value="request('title')" />
    <x-dashboard.form-input label="Телефон" name="phone" :value="request('phone')" />
    <x-dashboard.form-input label="Адрес" name="address" :value="request('address')" />
    <x-dashboard.form-input label="Широта" name="lat" :value="request('lat')" />
    <x-dashboard.form-input label="Долгота" name="lng" :value="request('lng')" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>