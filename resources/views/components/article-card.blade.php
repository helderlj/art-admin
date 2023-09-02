<li wire:key="{{ $article->id }}" class='transform transition duration-500 ease-in-out hover:-translate-y-2 hover:shadow-xl
hover:shadow-purple-200 col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow-md {{ ($selected) ? "shadow-purple-600" : "" }}'>

    <div class="flex flex-1 flex-col p-8">
        <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
             src="https://picsum.photos/200/300"
             alt="">
        <h3 class="mt-6 text-sm font-medium text-gray-900">{{ $article->title }}</h3>
        <dl class="mt-1 flex flex-grow flex-col justify-between">
            <dd class="text-sm text-gray-500">{{ $article->category->name }}</dd>
            <dt class="sr-only">Role</dt>

        </dl>
    </div>
    <div>
        <div class="-mt-px flex divide-x divide-gray-200">
            <div class="flex w-0 flex-1">
                <button wire:click="viewArticle({{ $article->id }})"
                   class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="h-5 w-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>

                    Resumo
                </button>
            </div>
            <div class="-ml-px flex w-0 flex-1">
                <button wire:click="addToCart({{ $article->id }})"
                   class="relative inline-flex w-0 flex-1 items-center justify-start ml-4 gap-x-2 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="h-5 w-5 text-gray-400 @if($selected) text-green-400 @endif">
                        <path fill-rule="evenodd"
                              d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                              clip-rule="evenodd"/>
                    </svg>
                    {{ ($selected) ? "Selecionado" : "Selecionar" }}
                </button>
            </div>
        </div>
    </div>
</li>
