<x-dashboard.filter-form>
    {{--
    <x-dashboard.form-select label="Заказ-наряд" name="order_id" option="name" :options="$orders" /> --}}
    <x-dashboard.form-range-input label="Рейтинг" name="rating" type="number" />
    <x-dashboard.form-input label="Комментарии" name="comment" :value="request('comment')" />
    <x-dashboard.form-range-input label="Создано" name="created_at" type="date" />
    <x-dashboard.form-range-input label="Обновлено" name="updated_at" type="date" />
</x-dashboard.filter-form>