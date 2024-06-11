@extends('templates.layout')
@section('content')
        <div class="w-full max-w-7xl mx-auto px-2 bg-white mt-6 h-svh">

            <div class="hs-accordion-group">
                <div>
                    <h1 class="text-5xl text-bioclin font-semibold px-6 py-6">{{__('pol-ent-env.polEntEnvTitle')}}</h1>
                </div>

                <div class="hs-accordion active px-10 py-8" id="hs-basic-heading-one">
                    <button class="px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none" aria-controls="hs-basic-collapse-one">
                        <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                        <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                        </svg>
                        {{__('pol-ent-env.polEnvEnt')}}
                    </button>
                    <div id="hs-basic-collapse-one" class="px-6 py-5 hs-accordion-content w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-heading-one">
                        <p class="text-gray-800 dark:text-neutral-200">
                           {!! __('pol-ent-env.detailPolEnvEnt') !!}
                        </p>
                    </div>
                </div>
            </div>

        </div>
@endsection