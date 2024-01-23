@php
    $model = $attributes['model'];
@endphp

<x-dashboard.info route="order" :model="$model">
    <tr>
        <td><b>Номер Заказа</b></td>
        <td>{{ $model->order_number }}</td>
    </tr>
    {{-- <tr>
        <td><b>Телефон</b></td>
        <td>{{ $model->phone }}</td>
    </tr> --}}
    <tr>
        <td><b>Автомобиль</b></td>
        <td><a href="{{ route('user-car.show', $model->user_car_id) }}">{{ $model->user_car->title }}</a>
        </td>
    </tr>
    <tr>
        <td><b>Пробег</b></td>
        <td>{{ $model->mileage }}</td>
    </tr>
    <tr>
        <td><b>Технический центр</b></td>
        <td>{{ optional($model->tech_center)->title }}</td>
    </tr>
    <tr>
        <td><b>Дата</b></td>
        <td>{{ $model->date }}</td>
    </tr>
    <tr>
        <td><b>Тип Заказа</b></td>
        <td>{{ optional($model->order_type_relation)->name }}</td>
    </tr>
    <tr>
        <td><b>Запрос по гарантии</b></td>
        <td>{{ $model->guarantee_text }}</td>
    </tr>
    <tr>
        <td><b>Запрос по бесплатной диагностике</b></td>
        <td>{{ $model->free_diagnostics_text }}</td>
    </tr>
    <tr>
        <td><b>Номер телефона</b></td>
        <td>{{ $model->phone }}</td>
    <tr>
    <tr>
        <td><b>Url</b></td>
        <td>{{ $model->url }}</td>
    <tr>
    <tr>
        <td><b>Запись по Акции</b></td>
        <td>{{ optional($model->stock)->title }}</td>
    <tr>
        <td><b>Комментрия</b></td>
        <td>{{ $model->description }}</td>
    </tr>
    <tr>
        <td><b>Создано</b></td>
        <td>{{ $model->created_at }}</td>
    </tr>
    <tr>
        <td><b>Работы</b></td>
        <td>
            <table class="table table-bordered table-striped">
                <thead>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Кол-во</th>
                <th>Часы</th>
                <th>Цена</th>
                <th>Скидка</th>
                <th>Сумма</th>
                </thead>
                <tbody>
                @foreach($model->order_works as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->count}}</td>
                        <td>{{$item->hours}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->discount}}</td>
                        <td>{{$item->sum}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td><b>Части</b></td>
        <td>
            <table class="table table-bordered table-striped">
                <thead>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Скидка</th>
                <th>Сумма</th>
                </thead>
                <tbody>
                @foreach($model->order_spares as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->count}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->discount}}</td>
                        <td>{{$item->sum}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</x-dashboard.info>
