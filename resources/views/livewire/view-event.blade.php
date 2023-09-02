<div x-data="{ artigo: false, checkout: false }">
    <div class="min-h-full relative">
        <x-checkout-bar :selecionados="count($this->selectedArticles)"/>
        <header class="bg-white shadow fixed top-28 h-28 w-full z-30">

            <div class="mx-auto max-w-7xl flex justify-between items-center md:justify-start">
                <h1 class="text-3xl my-auto font-bold tracking-tight text-gray-900 h-full md:w-1/2 text-center">EVENTO - {{ $this->event->name }}</h1>

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

    <livewire:modal/>
    <!-- Modal Checkout -->
    <div class="flex justify-center ">
        <div
            x-show="checkout"
            style="display: none"
            x-on:keydown.escape.prevent.stop="checkout = false"
            role="dialog"
            aria-modal="true"
            x-id="['modal-title']"
            :aria-labelledby="$id('modal-title')"
            class="fixed inset-0 z-40 overflow-y-auto">
            <!-- Overlay -->
            <div x-show="checkout" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-75"></div>
            <!-- Panel -->
            <div
                x-show="checkout" x-transition
                x-on:click="checkout = false"
                class="relative flex min-h-screen items-center justify-center p-4">
                <div
                    x-on:click.stop
                    x-trap.noscroll.inert="checkout"
                    class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
                >
                    <!-- Title -->
                    <h2 class="text-3xl font-bold uppercase" :id="$id('modal-title')">Preencha todos os campos para receber os artigos em seu email</h2>
                    <hr>
                    <!-- Content -->
                    <p class="my-6 text-gray-600">MODAL DE CHECKOUT</p>

                    <div class="sm:col-span-3">
                        <label for="nome" class="block text-sm font-medium leading-6 text-gray-900">Nome Completo</label>
                        <div class="mt-2">
                            <input type="text" name="nome" id="nome" autocomplete="given-name"
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1
                                   ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                   focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="given-name"
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1
                                   ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                   focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="documento" class="block text-sm font-medium leading-6 text-gray-900">Número do Conselho Profissional</label>
                        <div class="mt-2">
                            <input type="text" name="documento" id="documento" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="disclaimer-1" class="block text-sm font-medium leading-6 text-gray-900">
                            Declaro para fins de direito, sob as penas da lei, que as informações prestadas são verdadeiras e autênticas (fiéis à verdade e condizentes com a realidade).
                        </label>
                        <div class="mt-2">
                            <input type="checkbox" name="disclaimer-1" id="disclaimer-1" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="disclaimer-2" class="block text-sm font-medium leading-6 text-gray-900">
                            Afirmo que os documentos são para meu uso exclusivo, com finalidade única de esclarecer questionamentos científicos, sendo vetada a sua reprodução, cópia, distribuição ou qualquer outro uso diverso que não o educacional pessoal, de acordo com a Lei 9.610/1998.
                        </label>
                        <div class="mt-2">
                            <input type="checkbox" name="disclaimer-2" id="disclaimer-2" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="disclaimer-2" class="block text-sm font-medium leading-6 text-gray-900">
                            Declaro/aceito, de forma livre e inequívoca, que minhas informações de contato sejam utilizadas para o envio do material solicitado e para a proteção dos direitos autorais ou de titularidade, nos termos da legislação aplicável. Ao aceitar os termos aqui previstos estou expressamente manifestando que concordo com o tratamento dos meus dados pessoais (nome, e-mail, número de conselho profissional) pela Sanofi, suas afiliadas, coligadas e empresas pertencentes ao grupo Sanofi para os fins mencionados. Você pode consultar a Política de Privacidade completa em:
                            <a target="_blank" href="https://www.sanofi.com.br/pt/politica-de-privacidade">política-de-privacidade</a>
                        </label>
                        <div class="mt-2">
                            <input type="checkbox" name="disclaimer-2" id="disclaimer-2" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>





                    {{--                    <input type="email" name="email" id="email">--}}
{{--                    <input type="text" name="documento" id="documento">--}}
{{--                    <select name="uf" id="uf">--}}
{{--                        <option value="">Selecione</option>--}}
{{--                        <option value="sp">São Paulo</option>--}}
{{--                    </select>--}}

                    <!-- Buttons -->
                    <div class="mt-8 flex space-x-2">
                        <button type="button" x-on:click="checkout = false"
                                class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                            Confirm
                        </button>

                        <button type="button" x-on:click="checkout = false"
                                class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
