<div class="chats bg-light p-20" data-scrollbar="true" data-height="63vh" id="chat-messages">
    @foreach ($messages as $item)
    <x-dashboard.chat-message :message="$item" />
    @endforeach
</div>