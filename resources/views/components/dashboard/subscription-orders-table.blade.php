<x-dashboard.default-table>
    <x-slot name="header">
        <th>ID</th>
        <th>Consumer</th>
        <th>Phone</th>
        <th style="width: 250px">Products</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Next Delivery Date</th>
        <th>Delivery Time</th>
        <th>Address</th>
        <th>Instruction</th>
        {{-- <th>Action</th> --}}
        {{-- <th>Ordered Date</th> --}}
    </x-slot>
    <x-slot name="body">
        @foreach ($orders as $index => $item)
        <tr class="{{ $item->trBgColor() }}">
            <td>#{{ $item->id }}</td>
            <td>{{ $item->client->full_name }}</td>
            <td><a href="tel:{{ $item->client->phone }}">{{ $item->client->phone }}</a></td>
            <td>
                <ol class="list-group">
                    @foreach ($item->order_products as $el)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $el->product->name }}
                        <span class="badge badge-primary badge-pill">{{ beautyPrice($el->product->price) }} </span>x {{
                        $el->count
                        }}
                    </li>
                    @endforeach
                </ol>
            </td>
            <td>{{ beautyPrice($item->totalPrice()) }}</td>
            <td class="{{ $item->status_id == 3 ? 'bg-lime-transparent-5' : '' }}">
                {{ $item->payStatus() }}
            </td>
            <td style="width: 80px">
                @if ($item->status_id < 5) {{ $item->nextDeliveryDate() }}
                    @endif
            </td>
            <td>{{ $item->delivery_time }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->instructions }}</td>
            {{-- <td><a href="{{ route('dashboard.orders.edit', $item->id) }}" class="btn btn-primary"><i
                        class="fa fa-pen"></i></a>
            </td> --}}
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $orders->links() }}