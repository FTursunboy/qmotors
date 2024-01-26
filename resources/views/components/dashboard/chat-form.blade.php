@php
$chat = $attributes['chat'];
@endphp
<form action="{{ route('user.chat', $chat->id) }}" enctype="multipart/form-data" method="POST">
    @csrf


    <div class="input-group">


        <input type="text" class="form-control" required name="message" placeholder="Введите ваше сообщение здесь."
               oninput="onInput(this.value)">

        <span class="input-group-append">
            <button class="btn btn-primary invisible" type="submit" id="submit-button"><i class="fab fa-telegram-plane"></i></button>
        </span>

    </div>
</form>


@push('scripts')

    <script>
        function deletePreview(id) {
            var container = document.getElementById('preview-container');
            var img = container.querySelector('img');
            if (img) {
                container.removeChild(img);
            }

            var deleteButtonSmall = container.querySelector('.btn-danger');
            if (deleteButtonSmall) {
                container.removeChild(deleteButtonSmall);
            }

        }
        function previewImage(input) {
            var container = document.getElementById('preview-container');
            var deleteButton = container.querySelector('button');
            if (!deleteButton) {
                deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-sm btn-danger';
                deleteButton.type = 'button';
                deleteButton.style.marginLeft = '5px';
                deleteButton.innerText = 'Удалить';
                deleteButton.onclick = function() {
                    deletePreview(input.id);
                };
                container.appendChild(deleteButton);
            }

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if (input.id === 'photo-id') {
                        var img = container.querySelector('img');
                        if (!img) {
                            img = document.createElement('img');
                            img.style.maxHeight = '200px';
                            img.style.marginTop = '5px';
                            container.appendChild(img);
                        }
                        img.src = e.target.result;
                    } else if (input.id === 'video-id') {
                        var video = container.querySelector('video');
                        if (!video) {
                            video = document.createElement('video');
                            video.style.maxHeight = '200px';
                            video.style.marginTop = '5px';
                            video.controls = true;
                            container.appendChild(video);
                        }
                        video.src = e.target.result;
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }

        }

        function deletePreview(inputId) {
            var input = document.getElementById(inputId);
            input.value = '';
            var container;
            if (inputId === 'photo-id') {
                container = document.getElementById('preview-container');
            } else if (inputId === 'video-id') {
                container = document.getElementById('preview-container-video');
            }
            var preview = container.querySelector('img, video');
            if (preview) {
                container.removeChild(preview);
            }
            var deleteButton = container.querySelector('button');
            if (deleteButton) {
                deleteButton.style.display = 'none';
            }
        }



    </script>


    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        // проверяем, есть ли выбранный файл
        if (formData.get('photo') || formData.get('video')) {
            // отправляем только файл, без текста
            fetch(this.action, {
                method: 'POST',
                body: formData.get('photo') || formData.get('video')
            }).then(function(response) {
                // обрабатываем ответ сервера
            });
        } else if (formData.get('message').trim() !== '') {
            // отправляем текст и файл
            fetch(this.action, {
                method: 'POST',
                body: formData
            }).then(function(response) {

            });
        }

    });

    function onInput(val){
        var element = document.getElementById("submit-button");
        if(val == ''){
            element.classList.add("invisible");
        } else {
            element.classList.remove("invisible");
        }
        console.log(val);
    }

    function onClickButton(id){
        document.getElementById(id).click();
    }

</script>
@endpush
