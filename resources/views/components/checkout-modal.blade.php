<!-- Modal Checkout -->
<div class="flex justify-center ">
    <div
        x-show="checkout"
        style="display: none"
        x-on:keydown.escape.window="checkout = false"
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
                class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg flex flex-col space-y-4"
            >
                <!-- Title -->
                <h2 class="text-3xl font-bold uppercase" :id="$id('modal-title')">Preencha todos os campos para
                    receber os artigos em seu email</h2>
                <hr>

                <form wire:submit="checkout()" class="flex flex-col space-y-4">
                    <div class="sm:col-span-3">
                        <label for="nome" class="block text-md font-medium leading-6 text-gray-900">Nome
                            Completo</label>
                        <div class="mt-1 border-b border-gray-600">
                            <input wire:model="name" type="text" required name="nome" id="nome"
                                   class="appearance-none bg-transparent border-none w-full text-gray-700 leading-tight focus:outline-none">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-1 border-b border-gray-600">
                            <input wire:model="email" type="email" required name="email" id="email" autocomplete="given-name"
                                   class="appearance-none bg-transparent border-none w-full text-gray-700 leading-tight focus:outline-none">
                        </div>
                    </div>
                    <div class="flex w-full space-x-2">
                        <div class="w-1/2">
                            <label for="documento" class=" text-sm font-medium leading-6 text-gray-900">Número do
                                Conselho Profissional</label>
                            <div class="mt-1 border-b border-gray-600">
                                <input wire:model="document" type="text" required name="documento" id="documento" autocomplete="given-name"
                                       class="appearance-none bg-transparent border-none w-full text-gray-700 leading-tight focus:outline-none">
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label for="uf" class=" text-sm font-medium leading-6 text-gray-900">UF</label>
                            <div class="mt-1 border-b border-gray-600">
                                <select wire:model="uf" required id="uf" name="uf" class="appearance-none bg-transparent border-none w-full text-gray-700 leading-tight focus:outline-none">
                                    <option value="" class="disabled hidden">Selecione</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="EX">Estrangeiro</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-between items-start space-x-4">
                        <div class="mt-2">
                            <input type="checkbox" required name="disclaimer-1" id="disclaimer-1"
                                   class="border-2 w-6 h-6 ring-2 ring-gray-900">
                        </div>
                        <label for="disclaimer-1" class="block text-md font-medium leading-6 text-gray-900">
                            Declaro para fins de direito, sob as penas da lei, que as informações prestadas são
                            verdadeiras e autênticas (fiéis à verdade e condizentes com a realidade).
                        </label>
                    </div>
                    <div class="w-full flex justify-between items-start space-x-4">
                        <div class="mt-2">
                            <input type="checkbox" required name="disclaimer-2" id="disclaimer-2"
                                   class="border-2 w-6 h-6 ring-2 ring-gray-900">
                        </div>
                        <label for="disclaimer-2" class="block text-sm font-medium leading-6 text-gray-900">
                            Afirmo que os documentos são para meu uso exclusivo, com finalidade única de esclarecer
                            questionamentos científicos, sendo vetada a sua reprodução, cópia, distribuição ou qualquer
                            outro uso diverso que não o educacional pessoal, de acordo com a Lei 9.610/1998.
                        </label>

                    </div>
                    <div class="w-full flex justify-between items-start space-x-4">
                        <div class="mt-2">
                            <input type="checkbox" required name="disclaimer-3" id="disclaimer-3"
                                   class="border-2 w-6 h-6 ring-2 ring-gray-900">
                        </div>
                        <label for="disclaimer-3" class="block text-sm font-medium leading-6 text-gray-900">
                            Declaro/aceito, de forma livre e inequívoca, que minhas informações de contato sejam
                            utilizadas para o envio do material solicitado e para a proteção dos direitos autorais ou de
                            titularidade, nos termos da legislação aplicável. Ao aceitar os termos aqui previstos estou
                            expressamente manifestando que concordo com o tratamento dos meus dados pessoais (nome,
                            e-mail, número de conselho profissional) pela Sanofi, suas afiliadas, coligadas e empresas
                            pertencentes ao grupo Sanofi para os fins mencionados. Você pode consultar a Política de
                            Privacidade completa em:
                            <a target="_blank" href="https://www.sanofi.com.br/pt/politica-de-privacidade" class="text-purple-400">política-de-privacidade</a>
                        </label>
                    </div>
                    <!-- Buttons -->
                    <div class="mt-20 flex space-x-2">
                        <button type="submit"
                                class="rounded-md border border-gray-200 bg-green-200 px-5 py-2.5 flex space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                            <span>Solicitar leitura dos artigos</span>
                        </button>

                        <button type="button" x-on:click="checkout = false"
                                class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                            Fechar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

