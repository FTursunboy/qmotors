<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    <a href="{{ route('notification.create') }}" class="ml-auto btn btn-primary">Добавить</a>
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="title">Заголовок</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="text">Текст</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="user_id">Пользовтель</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="notification_type">Тип Уведомление</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="additional_id">Допонительная ссылка</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('notification.show', $item->id) }}">{{ $item->id }}</a></td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->text }}</td>
            <td>
                @if ($item->user_id)
                <a href="{{ route('user.show', $item->user_id) }}">{{ optional($item->user)->full_name }} ~[~]({{
                    $item->user_id
                    }})
                </a>
                @else
                Все пользователи
                @endif
            </td>
            <td>{{ $item->notification_type_text }}</td>
            <td>{{ $item->additional_text }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <div class="d-flex float-right">
                    <a class="btn btn-info mr-2" href="{{ route('notification.show', $item->id) }}"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('notification.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('notification.delete', $item->id) }}" method="POST">
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