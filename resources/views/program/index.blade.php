@extends('templates.layout')
@section('title', 'Bioclin '.ucfirst(__('welcome.protocolo')))
@section('content')

    <div class="w-full max-w-10xl mx-auto bg-slate-50 px-4 py-6">
        <div class="w-full max-w-10xl mx-auto p-4 border rounded-lg" id="accordion-collapse" data-accordion="collapse">
            <h1 class="text-4xl font-semibold px-2 py-4 w-full bg-slate-50 text-bioclin capitalize">{{__('welcome.protocolo')}}</h1>

            <div class="flex flex-col gap-3">

                @foreach($programmings as $programming)
                    <button type="button" class="w-full hs-collapse-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold border border-transparent bg-bioclin
                    text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            id="hs-basic-collapse-{{$programming->id}}"
                            data-hs-collapse="#hs-basic-collapse-heading-{{$programming->id}}">
                        <svg class="hs-collapse-open:rotate-180 flex-shrink-0 size-4 text-white"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                        <span class="truncate text-base md:text-lg lg:text-xl font-semibold">
                         {{$programming->name}}
                        </span>
                    </button>
                    <div id="hs-basic-collapse-heading-{{$programming->id}}"
                         class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300 pl-6  border py-4"
                         aria-labelledby="hs-basic-collapse-{{$programming->id}}">
                        @foreach($programming->attachmentProgrammings as $attachment)
                            <div class="mt-5">
                                <div class="flex items-center hover:underline duration-200 hover:text-cyan-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-6 h-6 mr-3 text-red-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                    </svg>
                                    <a href="{{@asset('storage/'.$attachment->file)}}"
                                       target="_blank">{{str_replace('equipments/', '', $attachment->file)}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>

        </div>
    </div>

@endsection
