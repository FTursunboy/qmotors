<x-dashboard.default-table>
    <x-slot name="header">
        <th>ID</th>
        <th>Consumer</th>
        <th>Phone</th>
        <th style="width: 250px">Products</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Delivery Date</th>
        <th>Delivery Time</th>
        <th>Delivery Status</th>
        <th>Address</th>
        <th>Instruction</th>
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
            <td>{{ $item->totalPrice() }}</td>
            <td class="{{ $item->status_id == 3 ? 'bg-lime-transparent-5':'' }}">{{ $item->payStatus() }}</td>
            <td style="width: 80px">{{ $item->delivery_date }}</td>
            <td>{{ $item->delivery_time }}</td>
            <td>
                {{-- {{ $item->delivery_status->name }} --}}
                <form action="{{ route('dashboard.orders.one-time.delivery', $item->id) }}" method="POST"
                    class="form-inline">
                    @csrf
                    @method('PUT')
                    <select name="status" id="delivery-status-id" class="form-control" onchange="this.form.submit()">
                        @foreach (\App\Models\DeliveryStatus::all() as $el)
                        <option value="{{ $el->id }}" @if($el->id == $item->delivery_status_id) selected @endif>{{
                            $el->name }}</option>
                        @endforeach
                    </select>
                    {{-- <button type="submit" class="btn btn-success">Save</button> --}}
                </form>
            </td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->instructions }}</td>
            {{-- <td>{{ $item->created_at }}</td> --}}
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $orders->links() }}