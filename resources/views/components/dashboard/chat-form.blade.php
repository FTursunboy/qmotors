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
        <input type="text" class="form-control" required name="message" placeholder="Введите ваше сообщение здесь."
            oninput="onInput(this.value)">
        <span class="input-group-append">
            <button class="btn btn-primary invisible" type="submit" id="submit-button"><i
                    class="fab fa-telegram-plane"></i></button>
        </span>
    </div>
</form>

@push('scripts')
<script>
    function onClickButton(id){
        document.getElementById(id).click();
    }
    function onInput(val){
        var element = document.getElementById("submit-button");
        if(val == ''){
            element.classList.add("invisible");
        } else {
            element.classList.remove("invisible");  
        }
        console.log(val);
    }
</script>
@endpush