<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    <a href="{{ route('article.create') }}" class="ml-auto btn btn-primary">Добавить</a>
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            Превью
        </th>
        <th>
            <x-column-order-caret column="title">Заголовок</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="subtitle">Подзаголовок</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('article.show', $item->id) }}">{{ $item->id }}</a></td>
            <td><img src="{{ customAsset($item, 'preview') }}" width="100"></td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->subtitle }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <div class="d-flex float-right">
                    <a class="btn btn-info mr-2" href="{{ route('article.show', $item->id) }}"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('article.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('article.delete', $item->id) }}" method="POST">
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