<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>#</th>
        <th>Time</th>
        <th>Action</th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>
                <form action="{{ route('dashboard.delivery-times.update', $item->id) }}" method="POST"
                    id="delivery-time-from-{{ $item->id }}">
                    @csrf
                    @method('PUT')
                    <x-dashboard.form-input name="value" type="text" :value="$item->value" />
                </form>
            </td>
            <td>
                <div class="btn-group"></div>
                <button type="submit" class="btn btn-success" form="delivery-time-from-{{ $item->id }}">Save</button>
                <button type="submit" onclick="return confirm('Ты уверен?')" class="btn btn-danger"
                    form="delete-form-{{ $item->id }}"><i class="fa fa-trash"></i></button>
                <form action="{{ route('dashboard.delivery-times.delete', $item->id) }}" method="POST"
                    id="delete-form-{{ $item->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->withQueryString()->links() }}