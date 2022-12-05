<div class="d-flex mb-2">
    <x-dashboard.table-search-form/>
    {{-- <a href="{{ route('user.create') }}" class="ml-auto btn btn-primary">Добавить</a> --}}
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            ID
        </th>
        <th>
            Телефон номер
        </th>
        <th>
            СМС
        </th>
        <th>
            Дата
        </th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ buildPhone($item->phone_number) }}</td>
                <td>{{ ($item->message) }}</td>
                <td>{{ localDatetime($item->created_at) }}</td>
            </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->withQueryString()->links() }}
