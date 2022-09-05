@php
$chat = $attributes['chat'];
@endphp
<form action="{{ route('user.chat', $chat->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div style="display: none">
        <input type="file" name="photo" id="photo-id">
        <input type="file" name="video" id="video-id">
        <input type="file" name="file" id="file-id">
    </div>
    <div class="input-group">
        <div class="btn-group">
            <button class="btn btn-primary" type="button" onclick="onClickButton('photo-id')"><i
                    class="fa fa-image"></i></button>
            <button class="btn btn-primary" type="button" onclick="onClickButton('video-id')"><i
                    class="fa fa-video"></i></button>
            {{-- <button class="btn btn-primary" type="button" onclick="onClickButton('file-id')"><i
                    class="fa fa-paperclip"></i></button> --}}
        </div>
        <input type="text" class="form-control" name="message" placeholder="Введите ваше сообщение здесь.">
        <span class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fab fa-telegram-plane"></i></button>
        </span>
    </div>
</form>

@push('scripts')
<script>
    function onClickButton(id){
        document.getElementById(id).click();
    }
</script>
@endpush