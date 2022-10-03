<x-dashboard.filter-form>
    <x-dashboard.form-input label="Пользовательь" name="user" :value="request('user')" />
    <x-dashboard.form-input label="Заголовок" name="title" :value="request('title')" />
    <x-dashboard.form-input label="Текст" name="text" :value="request('text')" />
    <x-dashboard.form-input label="Тип Уведомление" name="notification_type" :value="request('notification_type')" />
    <x-dashboard.form-input label="Допонительная ссылка" name="additional_id" :value="request('additional_id')" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>