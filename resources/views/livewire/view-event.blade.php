<div x-data="{ checkout: true }">
    <div class="min-h-full relative">
        <x-checkout-bar :selecionados="count($this->selectedArticles)"/>
        <header class="bg-white shadow fixed top-28 h-28 w-full z-30">

            <div class="mx-auto max-w-7xl flex justify-between items-center md:justify-start">
                <h1 class="text-3xl my-auto font-bold tracking-tight text-gray-900 h-full md:w-1/2 text-center">EVENTO
                    - {{ $this->event->name }}</h1>

                <div class="hidden md:block w-1/2 h-full">
                    <div class="ml-10 flex flex-col flex-wrap space-x-4 h-28">
                        @foreach($this->eventCategories as $category)
                            <a wire:click="toggleCategory({{ $category->id }})" href="#"
                               class="text-gray-300 hover:bg-gray-700 @if(in_array($category->id, $this->selectedCategories)) bg-gray-700 @endif hover:text-white rounded-md px-3 py-2 text-sm font-medium">{{ $category->name }}</a>
                        @endforeach
                        @if(!empty($this->selectedCategories))
                            <a href="#" wire:click="clearCategories()"
                               class="text-blue-300 rounded-md px-3 py-2 text-sm font-medium">
                                Limpar filtro
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <main class="relative top-52">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">


                <ul role="list" class="mt-4 mb-10 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($this->filteredEventArticles as $article)
                        @php
                            in_array($article->id, $this->selectedArticles) ? $selected = true : $selected = false;
                        @endphp
                        <x-article-card :article="$article" :selected="$selected"/>
                    @endforeach
                </ul>
                {{--            --}}

            </div>
        </main>
    </div>



    @if(isset($focusArticle))
        <x-article-modal name="article-modal" title="{{ $focusArticle->title }}" id="{{ $focusArticle->id }}">
            @slot('body')
                {{ $focusArticle->subtitle }}
            @endslot
        </x-article-modal>
    @endif

    <x-checkout-modal/>

</div>
