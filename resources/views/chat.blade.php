<x-app-layout >
    <div class="flex flex-col py-12 flex-grow items-center" x-data="{ open: false }">
        <template x-teleport="body">
            <div x-show="open" class="left-0 top-0 fixed w-screen h-screen bg-black/50 flex justify-center items-center">
                <form method="POST"  @click.outside="open = false" class="flex flex-col gap-4 w-80 h-fit bg-white p-6 rounded-lg" action={{"/messages/$chat->id"}}>
                    @csrf
                    <div class="relative">
                        <h2 class="text-center text-xl font-bold">Add User To Chat</h2>
                        <button @click="open = !open" type="button" class="absolute right-0 top-1/2 -translate-y-1/2 flex gap-2 ml-auto rounded-md p-1 hover:bg-gray-200 group transition cursor-pointer">
                            <x-lucide-x class="w-6 h-6 stroke-gray-700 group-hover:stroke-black" />
                        </button>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="username" class="text-lg">Username</label>
                        <x-text-input class="w-full" placeholder="John Smith" id="username" name="username"/>
                    </div>
                    <button class="text-base px-3 py-2 bg-gray-800 text-white hover:bg-gray-700 rounded-md">Add User</button>
                </form>
            </div>
        </template>
        <div class="flex flex-col flex-grow max-w-7xl w-full items-center sm:px-6 lg:px-8">
            <div class="flex flex-col flex-grow flex-col bg-white w-full bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="flex flex-col py-8 px-10 text-gray-900 text-gray-100 flex-grow gap-6">
                    <div class="flex items-center gap-4">
                        <a class="flex items-center justify-center rounded-md w-8 h-8 hover:bg-gray-200 group transition cursor-pointer" href={{url()->previous()}}>
                            <x-lucide-chevron-left class="w-6 h-6 stroke-gray-700 group-hover:stroke-black" />
                        </a>
                        <h1 class="text-xl font-bold">{{ __($chat->name) }}</h1>
                        <button @click="open = !open" class="flex gap-2 ml-auto rounded-md px-3 py-2 hover:bg-gray-200 group transition cursor-pointer">
                            Add User
                            <x-lucide-plus class="w-6 h-6 stroke-gray-700 group-hover:stroke-black" />
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow gap-4">
                        @foreach ($chat->messages as $message)
                            <div class="flex gap-2 bg-indigo-300 text-black px-3 py-2 rounded-md">
                                <span>{{$message->user->name}}</span> |
                                <p>{{$message->content}}</p>
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
