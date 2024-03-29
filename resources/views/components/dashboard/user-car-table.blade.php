<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    <a href="{{ route('user-car.create') }}" class="ml-auto btn btn-primary">Добавить</a>
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="number">Номер</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="car_model_id">Модель Автомобиля</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="user_id">Пользователь</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="year">Год</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="status">Статус</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="last_visit">Последнее Посещение</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="vin">ВИН</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="mileage">Пробег</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('user-car.show', $item->id) }}">{{ $item->id }}</a></td>
            <td>{{ $item->number }}</td>
            <td>{{ optional($item->model)->name }}</td>
            <td> <a href="{{ route('user.show', $item->id) }}">{{
                    optional($item->user)->full_name
                    }}</a></td>
            <td>{{ $item->year }}</td>
            <td>{{ $item->status_text }}</td>
            <td>{{ $item->last_visit }}</td>
            <td>{{ $item->vin }}</td>
            <td>{{ $item->mileage }}</td>
            <td>{{ localDatetime($item->created_at) }}</td>
            <td>
                <div class="d-flex float-right">
                    <a class="btn btn-info mr-2" href="{{ route('user-car.show', $item->id) }}"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('user-car.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('user-car.delete', $item->id) }}" method="POST">
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
