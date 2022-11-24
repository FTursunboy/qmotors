<div class="d-flex mb-2">
    <x-dashboard.table-search-form/>
    <a href="{{ route('bonus.create') }}" class="ml-auto btn btn-primary">Добавить</a>
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="status">Статус</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="bonus_type">Тип</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="title">Название</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="points">Баллы</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="remainder">Остаток</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="user_id">Пользователь</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="id">Дейсвителен до</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
            <tr>
                <td><a href="{{ route('bonus.show', $item->id) }}">{{ $item->id }}</a></td>
                <td>{{ $item->status_text }}</td>
                <td>{{ $item->bonus_type_text }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->points }}</td>
                <td>{{ $item->remainder }}</td>
                <td><a href="{{ route('user.show', $item->user_id??1) }}">{{ optional($item->user)->full_name }} ({{
                    $item->user_id
                    }})</a></td>
                <td>{{ localDatetime($item->created_at) }}</td>
                <td>{{$item->burn_date}}</td>
                <td>
                    <div class="d-flex float-right">
                        <a class="btn btn-info mr-2" href="{{ route('bonus.show', $item->id) }}"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('bonus.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                                class="fa fa-pen"></i></a>
                        <form action="{{ route('bonus.delete', $item->id) }}" method="POST">
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
