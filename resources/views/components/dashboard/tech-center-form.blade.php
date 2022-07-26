@php
$model = $attributes['model'];
@endphp

<div class="row">
    <x-dashboard.form-input name="title" label="Название" class="col-md-6" :value="$model->title" />
    <x-dashboard.form-input name="phone" label="Телефон" class="col-md-6" :value="$model->phone" />
    <x-dashboard.form-input name="address" label="Очество" class="col-md-6" :value="$model->address" />
    <x-dashboard.form-input name="url" label="Url" class="col-md-6" :value="$model->url" />
    <x-dashboard.form-input name="lat" label="Широта" class="col-md-6" :value="$model->lat" />
    <x-dashboard.form-input name="lng" label="Долгота" class="col-md-6" :value="$model->lng" />
    <div class="col-md-12">
        <div class="input-group" style="display: none;">
            <input type="text" class="form-control" onchange="$('#hidden-'+$(this).attr('id')).val($(this).val())"
                id="items-address" placeholder="Введите адрес">
            <span class="input-group-addon"><button type="button" class="btn btn-link btn-xs" id="button">найти
                    на карте</button></span>
        </div>
        <input type="hidden" id="items-coordinate_x" onchange="$('#hidden-'+$(this).attr('id')).val($(this).val())">
        <input type="hidden" id="items-coordinate_y" onchange="$('#hidden-'+$(this).attr('id')).val($(this).val())">
        <div id="map" style="height:250px; position: relative;"></div>
        <div id="marker"></div>
    </div>
</div>
<div class="d-flex mt-2">
    <x-dashboard.back-button />
    <button type="submit" class="btn btn-success ml-auto">Сохранять</button>
</div>

@push('scripts')
<script type="text/javascript"
    src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=2f80532e-919c-44e6-9334-2d6aaf4870cd"></script>

<script>
    function mapF() {
        $('#button').bind('click', function (e) {
            geocode();
        });

        const cord_x = ($("#lat-id").val()) ? $("#lat-id").val() : 55.63535;
        const cord_y = ($("#lng-id").val()) ? $("#lng-id").val() : 37.543578;

        // Указывается идентификатор HTML-элемента.
        map = new ymaps.Map('map', {
            zoom: 10,
            center: [cord_y, cord_x],
            controls: []
        });

        map.controls.add(
            new ymaps.control.TypeSelector(
                ['yandex#map', 'yandex#hybrid', 'yandex#satellite']
            )
        );

        placemark = new ymaps.Placemark(map.getCenter(), {}, {
            preset: 'islands#redDotIconWithCaption',
            draggable: true
        });

        map.geoObjects.add(placemark);

        placemark.events.add('dragend', function (e) {
            var coordinates = placemark.geometry.getCoordinates();
            var myGeocoder = ymaps.geocode(coordinates, {
                results: 1
            });
            myGeocoder.then(
                function (res) {
                    var street = res.geoObjects.get(0);
                    address = street.properties.get('description') + ', ' + street.properties.get('name');
                    //$("#items-address").val(address);
                    $("#lat-id").val(coordinates[1]);
                    $("#lng-id").val(coordinates[0]);
                }
            );
        });

        map.controls.add('zoomControl');
        map.controls.add('geolocationControl');

        function geocode() {
            // Забираем запрос из поля ввода.
            var request = $('#items-address').val();
            // Геокодируем введённые данные.
            ymaps.geocode(request).then(function (res) {
                var obj = res.geoObjects.get(0),
                    error, hint;

                if (obj) {
                    // Об оценке точности ответа геокодера можно прочитать тут: https://tech.yandex.ru/maps/doc/geocoder/desc/reference/precision-docpage/
                    switch (obj.properties.get('metaDataProperty.GeocoderMetaData.precision')) {
                        case 'exact':
                            break;
                        case 'number':
                        case 'near':
                        case 'range':
                            error = 'Неточный адрес, требуется уточнение';
                            hint = "Уточните {{ trans('messages.Number') }} дома";
                            break;
                        case 'street':
                            error = 'Неполный адрес, требуется уточнение';
                            hint = "Уточните {{ trans('messages.Number') }} дома";
                            break;
                        case 'other':
                        default:
                            error = 'Неточный адрес, требуется уточнение';
                            hint = 'Уточните адрес';
                    }
                } else {
                    error = 'Адрес не найден';
                    hint = 'Уточните адрес';
                }

                // Если геокодер возвращает пустой массив или неточный результат, то показываем ошибку.
                if (error) {
                    showError(error);
                    // showMessage(hint);
                } else {
                    showResult(obj);
                }
            }, function (e) {
                console.log(e)
            })
        }

        function showResult(obj) {
            // Удаляем сообщение об ошибке, если найденный адрес совпадает с поисковым запросом.
            $('#items-address').removeClass('input_error');
            $('#notice').css('display', 'none');

            var mapContainer = $('#map'),
                bounds = obj.properties.get('boundedBy'),
                // Рассчитываем видимую {{ trans('messages.Region') }}ь для текущего положения пользователя.
                mapState = ymaps.util.bounds.getCenterAndZoom(
                    bounds,
                    [mapContainer.width(), mapContainer.height()]
                ),
                // Сохраняем полный адрес для сообщения под картой.
                address = [obj.getCountry(), obj.getAddressLine()].join(', '),
                // Сохраняем укороченный адрес для подписи метки.
                shortAddress = [obj.getThoroughfare(), obj.getPremiseNumber(), obj.getPremise()].join(' ');
            // Убираем контролы с карты.
            mapState.controls = [];
            // Создаём карту.
            createMap(mapState, shortAddress);
            // Выводим сообщение под картой.
            showMessage(address);
        }

        function showError(message) {
            $('#notice').text(message);
            $('#items-address').addClass('input_error');
            $('#notice').css('display', 'block');
            // Удаляем карту.
            // if (map) {
            //     map.destroy();
            //     map = null;
            // }
        }

        function createMap(state, caption) {
            // Если карта еще не была создана, то создадим ее и добавим метку с адресом.
            if (!map) {
                map = new ymaps.Map('map', state);
                placemark = new ymaps.Placemark(
                    map.getCenter(), {
                        iconCaption: caption,
                        balloonContent: caption
                    }, {
                        draggable: true,
                        preset: 'islands#redDotIconWithCaption'
                    });
                map.geoObjects.add(placemark);

                var coordinates = placemark.geometry.getCoordinates();
                $("#items-coordinate_x").val(coordinates[0]);
                $("#items-coordinate_y").val(coordinates[1]);

                placemark.events.add('dragend', function (e) {
                    var coordinates = placemark.geometry.getCoordinates();
                    var myGeocoder = ymaps.geocode(coordinates, {
                        results: 1
                    });
                    myGeocoder.then(
                        function (res) {
                            var street = res.geoObjects.get(0);
                            address = street.properties.get('description') + ', ' + street.properties.get('name');
                            $("#items-address").val(address);
                            $("#items-coordinate_x").val(coordinates[0]);
                            $("#items-coordinate_y").val(coordinates[1]);
                        }
                    );
                });
                // Если карта есть, то выставляем новый центр карты и меняем данные и позицию метки в соответствии с найденным адресом.
            } else {
                map.setCenter(state.center, state.zoom);
                placemark.geometry.setCoordinates(state.center);
                placemark.properties.set({
                    iconCaption: caption,
                    balloonContent: caption
                });

                var coordinates = placemark.geometry.getCoordinates();
                $("#items-coordinate_x").val(coordinates[0]);
                $("#items-coordinate_y").val(coordinates[1]);

                placemark.events.add('dragend', function (e) {
                    var coordinates = placemark.geometry.getCoordinates();
                    var myGeocoder = ymaps.geocode(coordinates, {
                        results: 1
                    });
                    myGeocoder.then(
                        function (res) {
                            var street = res.geoObjects.get(0);
                            address = street.properties.get('description') + ', ' + street.properties.get('name');
                            $("#items-address").val(address);
                            $("#items-coordinate_x").val(coordinates[0]);
                            $("#items-coordinate_y").val(coordinates[1]);
                        }
                    );
                });
            }
        }

        function showMessage(message) {
            $('#messageHeader').text('Данные получены:');
            $('#message').text(message);
        }
    }

    function changeLatitude(e) {
        const arr = placemark.geometry.getCoordinates();
        arr[0] = e.target.value;
        placemark.geometry.setCoordinates(arr)
        map.setCenter(arr)
    }

    function changeLongitude(e) {
        const arr = placemark.geometry.getCoordinates();
        arr[1] = e.target.value;
        placemark.geometry.setCoordinates(arr)
        map.setCenter(arr)
    }

    $(document).ready(function () {
        setTimeout(() => mapF(), 1000);
        // mapF();
    });
</script>
@endpush