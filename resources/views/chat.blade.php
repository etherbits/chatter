<x-app-layout >
    <div class="flex flex-grow py-12 justify-center" x-data="{ open: false }">
        <template x-teleport="body">
            <div x-show="open" class="left-0 top-0 fixed w-screen h-screen bg-black/50 flex justify-center items-center">
                <form method="POST"  @click.outside="open = false" class="flex flex-col gap-4 w-80 h-fit bg-white p-6 rounded-lg" action={{"/chats/$chat->id/add-user"}}>
                    @csrf
                    <div class="relative">
                        <h2 class="text-center text-xl font-bold">Add User To Chat</h2>
                        <button @click="open = !open" type="button" class="absolute right-0 top-1/2 -translate-y-1/2 flex gap-2 ml-auto rounded-md p-1 hover:bg-gray-200 group transition cursor-pointer">
                            <x-lucide-x class="w-6 h-6 stroke-gray-700 group-hover:stroke-black" />
                        </button>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-lg">Name</label>
                        <x-text-input class="w-full" placeholder="John Smith" id="name" name="name"/>
                    </div>
                    <button class="text-base px-3 py-2 bg-gray-800 text-white hover:bg-gray-700 rounded-md">Add User</button>
                </form>
            </div>
        </template>
        <div class="flex flex-grow max-w-7xl w-full sm:px-6 lg:px-8">
            <div class="flex flex-grow bg-white w-full bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="flex flex-col py-8 px-10 text-gray-900 text-gray-100 flex-grow gap-6">
                    <div class="flex items-center gap-4">
                        <a class="flex items-center justify-center rounded-md w-8 h-8 hover:bg-gray-200 group transition cursor-pointer" href="/">
                            <x-lucide-chevron-left class="w-6 h-6 stroke-gray-700 group-hover:stroke-black" />
                        </a>
                        <h1 class="text-xl font-bold">{{ __($chat->name) }}</h1>
                        <div class="flex gap-2">
                        @foreach ($chat->users as $user)
                            <div class="flex gap-2 text-black bg-neutral-100 px-3 py-2 rounded-md">
                                <span>{{$user->name}}</span>
                            </div>
                        @endforeach
                        </div>
                        <button @click="open = !open" class="flex gap-2 ml-auto rounded-md px-3 py-2 hover:bg-gray-200 group transition cursor-pointer">
                            Add User
                            <x-lucide-plus class="w-6 h-6 stroke-gray-700 group-hover:stroke-black" />
                        </button>
                    </div>
                    <div class="flex flex-col-reverse h-full gap-6 items-start overflow-auto px-4 py-2">
                        @foreach ($chat->messages->sortDesc() as $message)
                            @php
                                $isSender = $message->user->id == $user_id;
                            @endphp
                            <div @class([ "flex flex-col gap-1", "ml-auto items-end" => !$isSender])>
                                <div>
                                    <span class="text-gray-700">{{$message->user->name}}</span>
                                    <span class="text-sm text-gray-500">{{$message->created_at->format("j/m/y h:m:s")}} UTC</span>
                                </div>
                                <div @class(["flex gap-2 px-3 py-2 rounded-md shadow-md w-fit",
                                            "text-black" => $isSender,
                                            "bg-indigo-500 text-white" => !$isSender])>
                                    <p>{{$message->content}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <form action={{"/messages/$chat->id"}} method="POST" class="flex gap-4">
                        @csrf
                        <x-text-input class="w-full" placeholder="messsage..." name="content"/>
                        <x-primary-button>Send</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
