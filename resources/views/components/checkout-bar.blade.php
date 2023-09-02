<nav {{ $attributes->class(['bg-purple-800 h-28 fixed w-full z-30']) }}>
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
            <span class="w-1/3 text-right text-lg text-gray-100 font-bold">{{$selecionados ?? 0}} Artigos Selecionados</span>
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
            <span @click="checkout = true" class="w-1/3 text-left text-lg text-gray-100 font-bold cursor-pointer">Clique aqui</span>
        </div>
    </div>
</nav>
