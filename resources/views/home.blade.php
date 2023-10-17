<x-app-layout>
    <div class="py-12">
        <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 gap-8">
            <form action="/chats" method="post" class="flex gap-6 mx-auto">
                @csrf
                <x-text-input class="block w-48" name="chatName" required autofocus autocomplete="username" />
                <x-primary-button class="px-3 py-2 text-slate-50 w-fit">Add Chat</x-primary-button>
            </form>
            <div class="flex gap-8">
                @foreach ($chats as $chat)
                    <a href={{"/chats/$chat->id"}}>
                        <div class="flex flex-col w-48 px-6 py-4 bg-white rounded-lg shadow gap-2">
                            <h1 class="text-center w-full uppercase">{{ $chat->name }}</h1>
                            <span class="text-slate-600 text-center text-sm">
                                {{$chat->created_at->format('j F, Y')}}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
