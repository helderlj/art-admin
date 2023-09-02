@props(['id', 'title'])
<!-- Modal Artigo -->
<div class="flex justify-center">
    <div
        x-data="{
            show: false
        }"
        x-show="show"
        style="display: none"
        x-on:keydown.escape.window="show = false"
        x-on:close-modal.window="show = false"
        x-on:open-modal.window="show = true"
        role="dialog"
        aria-modal="true"

        class="fixed inset-0 z-40 overflow-y-auto">
        <!-- Overlay -->
        <div x-show="show" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-75"></div>
        <!-- Panel -->
        <div
            x-show="show" x-transition
            x-on:click="show = false"
            class="relative flex min-h-screen items-center justify-center p-4"
        >
            <div
                x-on:click.stop
                x-trap.noscroll.inert="show"
                class="relative h-1/2 w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg flex flex-col space-y-10">

                <img class="mx-auto h-96 w-1/2 flex-shrink-0 rounded-xl shadow-lg"
                     src="https://picsum.photos/600/200"
                     alt="">

                <div>
                    <!-- Title -->
                    <h2 class="text-3xl font-bold">{{ $title }}</h2>
                    <!-- Body -->
                    <p class="mt-2 text-gray-600">{{ $body }}</p>
                </div>

                <!-- Buttons -->
                <div class="mt-8 flex space-x-2 justify-start">
                    <button wire:click="addToCart({{ $id }})" type="button" x-on:click="show = false"
                            class="rounded-md border border-gray-200 bg-green-200 px-5 py-2.5 flex space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <span>Desejo receber por email</span>
                    </button>

                    <button type="button" x-on:click="show = false"
                            class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
