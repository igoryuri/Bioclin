<div class="flex justify-center w-full fixed bottom-5 privacy-alert" id="dismiss-unstyled">
    <div class="max-w-7xl w-full bg-blue-100 border shadow-lg border-blue-200 text-sm text-blue-800 rounded-lg p-4"
         role="alert">
        <div class="flex">
            <div class="flex-shrink-0 py-3">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 16v-4"></path>
                    <path d="M12 8h.01"></path>
                </svg>
            </div>
            <div class="flex-1 md:flex md:justify-between ms-2">
                <p class="text-sm py-3 px-4">
                    Utilizamos cookies e outras tecnologias para personalizar nossos conteúdos durante a sua navegação em nossa plataforma e em serviços de terceiros parceiros. Ao navegar pelo site, você concorda com tal monitoramento para estas finalidades. Em caso de dúvidas, clique em mais informações para acessar a nossa Política de Privacidade.
                </p>
                <p class="flex gap-4 text-sm mt-3 md:mt-0 md:ms-6">
                    <a class="transition-all duration-100 bg-slate-500 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border text-gray-200 hover:text-slate-500 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                       href="{{@asset('storage/privacy/Politica-de-Privacidade-Bioclin.pdf')}}"
                       data-hs-remove-element="#dismiss-unstyled"
                        target="_blank">
                        {{__('welcome.saiba_mais')}}
                    </a>
                    <button id="accept-privacy"
                            class="transition-all duration-100 bg-blue-500 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border text-gray-200 hover:text-blue-500 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none">
                        Aceitar
                    </button>
                </p>
            </div>
            <div class="ps-3 ms-auto ml-4">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button"
                            class="inline-flex bg-blue-100 rounded-lg p-1.5 text-blue-500 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-50 focus:ring-blue-600"
                            data-hs-remove-element="#dismiss-unstyled">
                        <span class="sr-only">Dismiss</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>