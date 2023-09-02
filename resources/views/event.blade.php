<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body x-data="{ open: false }">


<div class="min-h-full relative">
    <nav class="bg-purple-800 h-28 fixed w-full z-50">
        <div
            class="mx-auto h-full my-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex items-center justify-center md:justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8 hidden md:block"
                         src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                         alt="Your Company">
                </div>
            </div>
            <div class="flex items-center justify-center w-full md:w-80">
                <span class="w-1/3 text-right">0 Artigos Selecionados</span>
                <div class="w-1/3 text-center">
                    <button type="button"
                            class="relative rounded-full bg-purple-800 p-1 text-purple-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">CHECKOUT</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-16 h-16">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                    </button>
                </div>
                <span class="w-1/3 text-left">Click aqui</span>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow fixed top-28 w-full z-50">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-center md:justify-start">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">ARTIGOS DO EVENTO</h1>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                       aria-current="page">Dashboard</a>
                    <a href="#"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Team</a>
                    <a href="#"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Projects</a>
                    <a href="#"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
                    <a href="#"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Reports</a>
                </div>
            </div>
        </div>
    </header>
    <main class="relative top-44">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            {{--            --}}
            <ul role="list" class="mt-4 mb-10 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @for($i = 0; $i < 30; $i++)
                    <li x-on:click="open = true"
                        class="transform transition duration-500 ease-in-out hover:-translate-y-2 hover:shadow-xl hover:shadow-purple-200 col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                        <div class="flex flex-1 flex-col p-8">
                            <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
                                 src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                 alt="">
                            <h3 class="mt-6 text-sm font-medium text-gray-900">Jane Cooper</h3>
                            <dl class="mt-1 flex flex-grow flex-col justify-between">
                                <dt class="sr-only">Title</dt>
                                <dd class="text-sm text-gray-500">Paradigm Representative</dd>
                                <dt class="sr-only">Role</dt>
                                <dd class="mt-3">
                                    <span
                                        class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Admin</span>
                                </dd>
                            </dl>
                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="flex w-0 flex-1">
                                    <a href="mailto:janecooper@example.com"
                                       class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path
                                                d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z"/>
                                            <path
                                                d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z"/>
                                        </svg>
                                        Email
                                    </a>
                                </div>
                                <div class="-ml-px flex w-0 flex-1">
                                    <a href="tel:+1-202-555-0170"
                                       class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        Call
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endfor
            </ul>
            {{--            --}}

        </div>
    </main>
</div>

<div class="flex justify-center fixed bottom-0">

    <!-- Modal -->
    <div
        x-show="open"
        style="display: none"
        x-on:keydown.escape.prevent.stop="open = false"
        role="dialog"
        aria-modal="true"
        x-id="['modal-title']"
        :aria-labelledby="$id('modal-title')"
        class="fixed inset-0 z-10 overflow-y-auto"
    >
        <!-- Overlay -->
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-75"></div>

        <!-- Panel -->
        <div
            x-show="open" x-transition
            x-on:click="open = false"
            class="relative flex min-h-screen items-center justify-center p-4"
        >
            <div
                x-on:click.stop
                x-trap.noscroll.inert="open"
                class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
            >
                <!-- Title -->
                <h2 class="text-3xl font-bold" :id="$id('modal-title')">Confirm</h2>

                <!-- Content -->
                <p class="mt-2 text-gray-600">Are you sure you want to learn how to create an awesome modal?</p>

                <!-- Buttons -->
                <div class="mt-8 flex space-x-2">
                    <button type="button" x-on:click="open = false"
                            class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                        Confirm
                    </button>

                    <button type="button" x-on:click="open = false"
                            class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
