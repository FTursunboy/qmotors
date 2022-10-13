<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    {{-- <a href="{{ route('user.create') }}" class="ml-auto btn btn-primary">Добавить</a> --}}
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="rating">Рейтинг</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="comment">Комментарии</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="moderated">Модерация</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="order_id">Заказ-наряд</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Обновлено</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('review.show', $item->id) }}">{{ $item->id }}</a></td>
            <td>{{ $item->rating }}</td>
            <td>{{ $item->comment }}</td>
            <td>{{ $item->moderated_text }}</td>
            <td>
                @if ($item->order_id)
                <a href="{{ route('order.show', $item->order_id) }}">{{ $item->order_id }}</a>
                @else
                Заказ не выбран
                @endif
            </td>
            <td>{{ localDatetime($item->created_at) }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>
                <div class="d-flex float-right">
                    <a class="btn btn-info mr-2" href="{{ route('review.show', $item->id) }}"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('review.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('review.delete', $item->id) }}" method="POST">
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