<x-dashboard.table-search-form />
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>#</th>
        <th>Photo</th>
        <th><a href="javascript:;" onclick="order('id')">ID</a></th>
        <th>Name Uz</th>
        <th>Name Ru</th>
        <th>Description Uz</th>
        <th>Description Ru</th>
        <th><a href="javascript:;" onclick="order('price')">Price</a></th>
        <th>Status</th>
        <th>Actions</th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td>{{ $index+1 }}</td>
            <td><img class="rounded-lg" style="height: 50px" src="{{ asset('storage/product/'.$item->photo) }}"
                    alt="photo" />
            </td>
            <td>#{{ $item->id }}</td>
            <td>{{ $item->translate('uz')->name }}</td>
            <td>{{ $item->translate('ru')->name }}</td>
            <td>{{ $item->translate('uz')->description }}</td>
            <td>{{ $item->translate('ru')->description }}</td>
            <td>USZ {{ beautyPrice($item->price) }}</td>
            <td>
                <form action="{{ route('dashboard.products.verify', $item->id) }}" method="POST"
                    id="verify-from-{{ $item->id }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="false">
                    <input type="checkbox" @if($item->status == 1) checked @endif name="status" value="true">
                </form>
            </td>
            <td>
                <div class="d-flex float-right">
                    <button type="submit" class="btn btn-success mr-2" form="verify-from-{{ $item->id }}">Save</button>
                    <a href="{{ route('dashboard.products.edit', $item->id) }}" class="btn btn-info mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('dashboard.products.delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Ты уверен?')" class="btn btn-danger"><i
                                class="fa fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->withQueryString()->links() }}