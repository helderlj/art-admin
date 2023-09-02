<!-- Modal Artigo -->
<div class="flex justify-center ">
    <div
        x-data="{
            show: @entangle($attributes->wire('model')).defer
        }"
        x-show="show"
        style="display: none"
        x-on:keydown.escape.prevent.stop="show = false"
        role="dialog"
        aria-modal="true"
        x-id="['modal-title']"
        :aria-labelledby="$id('modal-title')"
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
                class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
            >
                <!-- Title -->
                <h2 class="text-3xl font-bold" :id="$id('modal-title')">Confirm</h2>

                <!-- Content -->
                <p class="mt-2 text-gray-600">Are you sure you want to learn how to create an awesome modal?</p>

                <!-- Buttons -->
                <div class="mt-8 flex space-x-2">
                    <button type="button" x-on:click="show = false"
                            class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                        Confirm
                    </button>

                    <button type="button" x-on:click="show = false"
                            class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
