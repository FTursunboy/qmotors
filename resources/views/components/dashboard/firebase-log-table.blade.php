<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    {{-- <a href="{{ route('user.create') }}" class="ml-auto btn btn-primary">Добавить</a> --}}
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            ID
        </th>
        <th>
            Респонс
        </th>
        <th>
            Токены
        </th>
        <th>
            Данние
        </th>
        <th>
            Дата
        </th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr class="@if(json_decode($item->response)->success)bg-green-transparent-3 @else bg-red-transparent-3 @endif">
            <td>{{ $item->id }}</td>
            <td>
                {{ ($item->response) }}
            </td>
            <td>
                <pre>{{ ($item->fcmtokens) }}</pre>
            </td>
            <td>
                <pre>@json(json_decode($item->data))</pre>
            </td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->withQueryString()->links() }}