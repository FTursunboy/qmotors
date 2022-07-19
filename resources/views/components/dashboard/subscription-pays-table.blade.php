<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>ID</th>
        <th>Status</th>
        {{-- <th>Delivery Status</th> --}}
        <th>Day</th>
        <th>Delivery Date</th>
        <th>Payed Date</th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr @if($item->status_id == 3) class="bg-lime-transparent-5" @endif>
            <td>#{{ $item->id }}</td>
            <td>{{ $item->status->name }}</td>
            {{-- <td>{{ $item->delivery_status->name }}</td> --}}
            <td>{{ weekday($item->day)['name'] }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->updated_at }}</td>
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->links() }}