<div class="d-flex mb-2">
    <x-dashboard.table-search-form />
    <a href="{{ route('free-diagnostic.create') }}" class="ml-auto btn btn-primary">Добавить</a>
</div>
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>
            <x-column-order-caret column="id">ID</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="user_car_id">Автомобиль</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="tech_center_id">Технический центр</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="free_diagnostic_type_id">Тип</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="date">Дата</x-column-order-caret>
        </th>
        <th>
            <x-column-order-caret column="created_at">Создано</x-column-order-caret>
        </th>
        <th></th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td><a href="{{ route('free-diagnostic.show', $item->id) }}">{{ $item->id }}</a></td>
            <td> <a href="{{ route('user-car.show', $item->user_car_id) }}">{{
                    optional(optional($item->user_car)->model)->name
                    }} ({{ $item->user_car_id }})</a></td>
            <td>
                <a href="{{ route('tech-center.show', $item->tech_center_id) }}">
                    {{ optional($item->tech_center)->title }}
                </a>
            </td>
            <td>{{ optional($item->free_diagnostic_type)->name }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ localDatetime($item->created_at) }}</td>
            <td>
                <div class="d-flex float-right">
                    <a class="btn btn-info mr-2" href="{{ route('free-diagnostic.show', $item->id) }}"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('free-diagnostic.edit', $item->id) }}" class="btn btn-primary mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('free-diagnostic.delete', $item->id) }}" method="POST">
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