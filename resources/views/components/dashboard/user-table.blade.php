<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    <a href="{{ route('user.create') }}" class="ml-auto btn btn-primary">Добавить</a>
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="avatar">Аватар</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="phone_number">Номер телефона</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="surname">Фамилия</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="name">Имя</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="patronymic">Очество</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="is_complete">Подтвержён</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="gender">Пол</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('user.show', $item->id) }}">{{ $item->id }}</a></td>
            <td class="with-img"><img src="{{ asset($item->avatar) }}" alt="avatar" width="100"></td>
            <td>{{ $item->phone_number }}</td>
            <td> {{ $item->surname }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->patronymic }}</td>
            <td>{{ $item->is_complete_text }}</td>
            <td>{{ $item->gender_text }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <div class="d-flex float-right">
                    <a class="btn btn-info mr-2" href="{{ route('user.show', $item->id) }}"><i
                            class="fa fa-eye"></i></a>
                    <a class="btn btn-warning mr-2" href="{{ route('user.chat', $item->id) }}"><i
                            class="fa fa-comment"></i></a>
                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('user.delete', $item->id) }}" method="POST">
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