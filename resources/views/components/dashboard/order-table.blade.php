<div class="d-flex mb-2">
    <x-dashboard.table-search-form/>
    <a href="{{ route('order.create') }}" class="ml-auto btn btn-primary">Добавить</a>
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="order_number">Номер Заказа</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="user_car_id">Автомобиль</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="mileage">Пробег</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="tech_center_id">Технический центр</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="date">Дата</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="order_type_id">Тип Заказа</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="order_status">Статус</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="guarantee">Запрос по гарантии</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="guarantee">Запрос по бесплатной диагностике</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="stock_id">Запись по Акции</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
            <tr>
                <td><a href="{{ route('order.show', $item->id) }}">{{ $item->id }}</a></td>
                <td>{{ $item->order_number }}</td>
                <td><a href="{{ route('user-car.show', $item->user_car_id) }}">{{ $item->user_car->title ?? null }}</a></td>
                <td>{{ $item->mileage }}</td>
                <td>{{ optional($item->tech_center)->title }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ optional($item->order_type_relation)->name }}</td>
                <td>{{ $item->orderStatus->title ?? null }}</td>
                <td>{{ $item->guarantee_text }}</td>
                <td>{{ $item->free_diagnostics_text }}</td>
                <td>{{ $item->stock_text }}</td>
                <td>{{ localDatetime($item->created_at) }}</td>
                <td>
                    <div class="d-flex float-right">
                        <a class="btn btn-info mr-2" href="{{ route('order.show', $item->id) }}"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('order.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                                class="fa fa-pen"></i></a>
                        <form action="{{ route('order.delete', $item->id) }}" method="POST">
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
