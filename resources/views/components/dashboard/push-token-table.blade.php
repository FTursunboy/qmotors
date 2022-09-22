<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    {{-- <a href="{{ route('user.create') }}" class="ml-auto btn btn-primary">Добавить</a> --}}
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="phone_number">Номер телефона</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="surname">Фамилия</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="name">Имя</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="patronymic">Очество</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="gender">Пол</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="device_token">Токен</x-column-order-caret>
        </th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('user.show', $item->id) }}">{{ $item->id }}</a></td>
            <td><a href="tel:{{ $item->phone_number }}">{{ $item->phone_number }}</a></td>
            <td>{{ $item->surname }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->patronymic }}</td>
            <td>{{ $item->gender_text }}</td>
            <td>{{ $item->device_token }}</td>
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->withQueryString()->links() }}