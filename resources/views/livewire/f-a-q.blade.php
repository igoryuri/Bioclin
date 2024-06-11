<div class="w-full max-w-7xl mx-auto px-2 bg-white mt-6 h-svh">

    <div>
        <h1 class="text-5xl text-bioclin font-semibold px-6 py-6">FAQ - {{__('faq.frequentes')}}</h1>
    </div>

    <div class="flex flex-col gap-4 hs-accordion-group w-full px-6 py-4">
        <div class="hs-accordion" id="hs-basic-heading-one">
            <button class="px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none" aria-controls="hs-basic-collapse-one">
                <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
                {{__('faq.transporte')}}
            </button>
            <div id="hs-basic-collapse-one" class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-one">
                <p class="text-gray-800 dark:text-neutral-200">
                    {!! __('faq.detailTransporte') !!}
                </p>
            </div>
        </div>

        <div class="hs-accordion" id="hs-basic-heading-two">
            <button class="px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none" aria-controls="hs-basic-collapse-two">
                <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
                {{__('faq.agua')}}
            </button>
            <div id="hs-basic-collapse-two" class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-two">
                <p class="text-gray-800 dark:text-neutral-200">
                    {!! __('faq.detailAgua') !!}
                </p>
            </div>
        </div>

        <div class="hs-accordion" id="hs-basic-heading-three">
            <button class="px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none" aria-controls="hs-basic-collapse-three">
                <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
                {{__('faq.calibradores')}}
            </button>
            <div id="hs-basic-collapse-three" class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-three">
                <p class="text-gray-800 dark:text-neutral-200">
                    {!! __('faq.detailCalibradores') !!}
                </p>
            </div>
        </div>
        <div class="hs-accordion" id="hs-basic-heading-four">
            <button class="px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none" aria-controls="hs-basic-collapse-four">
                <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
                {{__('faq.dedicados')}}
            </button>
            <div id="hs-basic-collapse-four" class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-four">
                <p class="text-gray-800 dark:text-neutral-200">
                    {!! __('faq.detailDedicados') !!}
                </p>
            </div>
        </div>
        <div class="hs-accordion" id="hs-basic-heading-five">
            <button class="px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none" aria-controls="hs-basic-collapse-five">
                <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
                {{__('faq.equipamentos')}}
            </button>
            <div id="hs-basic-collapse-five" class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-five">
                <p class="text-gray-800 dark:text-neutral-200">
                    {!! __('faq.detailEquipamentos') !!}
                </p>
            </div>
        </div>
        <div class="hs-accordion" id="hs-basic-heading-six">
            <button class="px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none" aria-controls="hs-basic-collapse-six">
                <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
                {{__('faq.testes')}}
            </button>
            <div id="hs-basic-collapse-six" class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-six">
                <p class="text-gray-800 dark:text-neutral-200">
                    {!! __('faq.detailTestes') !!}
                </p>
            </div>
        </div>
    </div>
</div>
