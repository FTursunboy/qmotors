@php
$chat = $attributes['chat'];
@endphp
<div class="chats bg-light p-20" data-scrollbar="true" data-height="63vh" id="chat-vue-messages" v-scope
    @vue:mounted="mounted">

    <div v-for="(item, index) in messages" :key="index" :class="isOwn(item) ? 'right' : 'left'">
        <span class="date-time" v-text="formatDate(item.created_at)"></span>
        <a href="javascript:;" class="name">
            <span class="label label-primary" v-if="isAdmin(item)">Админ</span>
            <span v-if="isOwn(item)">
                Я
            </span>
        </a>
        <a href="javascript:;" v-if="!isAdmin(item)" class="name"
            v-text="user(item).surname + ' ' + user(item).name"></a>

        <a href="javascript:;" class="image"><img alt="" :src="asset(user(item).avatar)" /></a>
        <div :class="messageClass(item)" @click="console.log(user(item))">
            <a :href="asset(item.photo)" target="blank" v-if="item.photo">
                <img :src="asset(item.photo)" alt="" width="150"> <br><br>
            </a>
            <a :href="asset(item.video)" target="blank" v-if="item.video">
                <video width="150" controls>
                    <source :src="asset(item.video)">
                </video> <br> <br>
            </a>
            @{{ item.message }}
        </div>
    </div>
    {{-- @foreach (items as $item)
    <x-dashboard.chat-message :message="$item" />
    @endforeach --}}
</div>

@push('scripts')
<script src="{{ asset('dash/assets/js/moment.js') }}"></script>

<script type="module">
    import { createApp } from"{{ asset('dash/assets/js/vue-petite.js') }}";
    createApp({
        admin: @json(auth()->guard('admin')->user()),
        messages: [],
        moment: moment(),
        async fetchData(){
            const res = await fetch("{{ route('user.chat.messages', $chat->id) }}");
            this.messages = await res.json();
        },
        async mounted(){
            await this.fetchData();
            setTimeout(() => {
                const container = document.querySelector("#chat-vue-messages");
                container.scrollTo({top:container.scrollHeight, behavior: 'smooth'});
                // container.scrollTop = container.scrollHeight;
            }, 100);
            setInterval(() => {
                this.fetchData();
                setTimeout(() => {
                    const container = document.querySelector("#chat-vue-messages");
                    container.scrollTo({top:container.scrollHeight, behavior: 'smooth'});
                    // container.scrollTop = container.scrollHeight;
                }, 100);
            }, 5000);
        },
        isAdmin(item){
           return item.admin_user != null;
        },
        user(item){
            return item.user??item.admin_user;
        },
        isOwn(item){
            return this.isAdmin(item) && this.user(item).id == this.admin.id;
        },
        asset(item){
            return window.location.origin + item;
        },
        messageClass(item){
            return this.isOwn(item) 
                ? 'message bg-gradient-aqua text-white'
                : 'message';
        },
        formatDate(time){
            return moment.utc(time).local().format('YYYY-MM-DD HH:mm:ss');
        }
    }).mount();
</script>

@endpush

@push('css')
<style>
    .message::before {
        content: none !important;
    }
</style>
@endpush