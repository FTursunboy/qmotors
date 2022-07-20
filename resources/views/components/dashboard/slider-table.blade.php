<x-dashboard.table-search-form />
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>#</th>
        <th>Photo</th>
        <th>Title Uz</th>
        <th>Title Ru</th>
        <th>Text Uz</th>
        <th>Text Ru</th>
        <th>Link</th>
        <th>Actions</th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>
                <img class="rounded__circle" src="{{ asset('storage/slider/'.$item->photo) }}" alt="photo" />
            </td>
            <td>{{ $item->translate('uz')->title }}</td>
            <td>{{ $item->translate('ru')->title }}</td>
            <td>{{ $item->translate('uz')->text }}</td>
            <td>{{ $item->translate('ru')->text }}</td>
            <td><a href="{{ $item->link }}" target="blank">{{ $item->link }}</a></td>
            <td>
                <div class="btn-group">
                    <a href="{{ route('dashboard.sliders.edit', $item->id) }}" class="btn btn-info"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('dashboard.sliders.delete', $item->id) }}" method="POST">
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