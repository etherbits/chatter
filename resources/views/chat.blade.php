<x-app-layout>
    <div class="flex flex-col py-12 flex-grow items-center">
        <div class="flex flex-col flex-grow max-w-7xl w-full items-center sm:px-6 lg:px-8">
            <div class="flex flex-col flex-grow flex-col bg-white w-full bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="flex flex-col py-8 px-10 text-gray-900 text-gray-100 flex-grow gap-6">
                    <div class="flex items-center gap-4">
                        <a class="flex items-center justify-center rounded-md w-8 h-8 hover:bg-gray-200 group transition cursor-pointer" href={{url()->previous()}}>
                            <x-lucide-chevron-left class="w-6 h-6 stroke-gray-700 group-hover:stroke-black" />
                        </a>
                        <h1 class="text-xl font-bold">{{ __($chat->name) }}</h1>
                    </div>
                    <div class="flex flex-col flex-grow">
                        <p>start</p>
                    </div>
                    <form class="flex gap-4">
                        <x-text-input class="w-full" placeholder="messsage..."/>
                        <x-primary-button>Send</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
