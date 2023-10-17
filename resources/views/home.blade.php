<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="/chats" method="post">
                @csrf
                <input placeholder="friends group" name="chatName"/>
                <button class="px-3 py-2 bg-indigo-500 text-slate-50 w-fit rounded-sm">Add Chat</button>
            </form>
            @foreach ($chats as $chat)
                <p>{{ $chat->name }}</p>
            @endforeach
        </div>
    </div>
</x-app-layout>
