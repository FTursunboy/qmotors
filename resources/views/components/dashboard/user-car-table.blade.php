<x-dashboard.table-search-form />
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="car_model_id">Car Model</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="user_id">User</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="year">Year</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="status">Status</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="last_visit">Last Visit</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="vin">VIN</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="mileage">Mileage</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Created At</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('user-car.show', $item->id) }}">{{ $item->id }}</a></td>
            <td>{{ optional($item->model)->name }}</td>
            <td>{{ optional($item->user)->full_name }}</td>
            <td>{{ $item->year }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->last_visit }}</td>
            <td>{{ $item->vin }}</td>
            <td>{{ $item->mileage }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <div class="d-flex float-right">
                    <a class="btn btn-info mr-2" href="{{ route('user-car.show', $item->id) }}"><i
                            class="fa fa-eye"></i></a>
                    <a href="#" class="btn btn-primary mr-2"><i class="fa fa-pen"></i></a>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i
                                class="fa fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->withQueryString()->links() }}