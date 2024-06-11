<!DOCTYPE html>
<html lang="pt-br" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>Bioclin</title>
    <link rel="stylesheet" href="../styles/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="/assets/img/Favicon.png" type="image/x-icon">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bioclin: '#044871',
                        primary: '#1e40af',
                        footer: '#f3efef',
                    },
                }
            }
        }
    </script>
    <style>
        #description ul li {
            margin-bottom: 5px;
            list-style: inside;
        }
    </style>
</head>
<body>


    <main class="bg-slate-200 min-h-screen">
        <header class="w-full border-b border-slate-400 px-2 py-3 bg-bioclin shadow-2xl">
            <div class="w-full flex max-w-7xl mx-auto">
                <div class="flex items-center">
                    <img src="{{@asset('/img/Logo_Bioclin_Branca.png')}}" alt="Logo Bioclin" class="h-7 mr-7">
                    <nav class="hidden sm:flex items-center gap-3 text-slate-100">
                        <a href="#" class="hover:text-slate-400 duration-200 px-2  py-2 rounded hover:bg-blue-950 ">
                            Home
                        </a>
                        <a href="#about"
                           class="hover:text-slate-400 duration-200 px-2  py-2 rounded hover:bg-blue-950 ">
                            Sobre
                            nós
                        </a>
                        <a href="#lines"
                           class="hover:text-slate-400 duration-200 px-2  py-2 rounded hover:bg-blue-950 ">
                            Linhas
                        </a>
                        <a href="#services"
                           class="hover:text-slate-400 duration-200 px-2  py-2 rounded hover:bg-blue-950 ">
                            Conteúdos
                            Técnicos
                        </a>
                        <a href="#contacts"
                           class="hover:text-slate-400 duration-200 px-2  py-2 rounded hover:bg-blue-950 ">
                            Contatos
                        </a>
                    </nav>
                </div>
            </div>
        </header>

        <section class="flex flex-col-reverse md:flex-row justify-center w-full mx-auto max-w-7xl py-8 px-20 rounded">
            <div class="w-full bg-slate-50 rounded-l-xl">
                <div class="p-4">
                    <div class="grid md:grid-cols-4 border rounded">
                        <div class="hidden md:grid md:col-span-3 py-2 justify-items-center content-center">
                            <img src="{{@asset('/storage').'/'.$product->images[0]->file[0]}}" alt="">
                        </div>
                        <div class="grid gap-2 bg-slate-100 shadow-lg border">
                            @forelse($product->images[0]->file as $image)
                                <img src="{{@asset('/storage').'/'.$image}}" alt="" class="bg-white">
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="p-2 md:p-12" id="description">


                    <div id="accordion-flush" data-accordion="open"
                         data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                         data-inactive-classes="text-gray-500 dark:text-gray-400">
                        @forelse($product->descriptions as $description)
                            <h2 id="accordion-flush-heading-{{$description->id}}">
                                <button type="button"
                                        class="flex items-center justify-between w-full py-5 px-2 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                        data-accordion-target="#accordion-flush-body-{{$description->id}}" aria-expanded="true"
                                        aria-controls="accordion-flush-body-1">
                                    <span class="text-lg md:text-2xl font-medium text-bioclin">{{$description->name}}</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-{{$description->id}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$description->id}}">
                                <div class="px-2 py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="text-gray-500 dark:text-gray-400"> {!! $description->description !!}</p>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>


{{--                    @forelse($product->descriptions as $description)--}}
                    {{--                        <h3 class="text-3xl font-medium text-bioclin mt-4">--}}
                    {{--                            {{$description->name}}--}}
                    {{--                        </h3>--}}
                    {{--                        <p class="px-4 py-2 ml-2">--}}
                    {{--                            {!! $description->description !!}--}}
                    {{--                        </p>--}}
                    {{--                    @empty--}}
                    {{--                    @endforelse--}}
                </div>
            </div>

            <div class="w-full h-full bg-bioclin basis-1/2 rounded-r-3xl hover:shadow-md">
                <div class="p-4 text-white">
                    <h1 class="text-4xl font-bold text-left">{{$product->name}}</h1>
                </div>
                <div class="p-4">
                    <div class="w-full bg-slate-50 px-2 py-4 rounded">
                        <ul>
                            <li>
                                <span class="font-medium text-bioclin">Código Produto:</span> {{$product->cod_prod}}
                            </li>
                            <li>
                                <span class="font-medium text-bioclin">SKU:</span> {{$product->sku_id}}
                            </li>
                            <li class="mt-3">
                                <span class="font-medium text-xl text-bioclin">Links:</span>
                                <ol class="px-3 py-1">
                                    @forelse($product->attachments as $attachment)
                                        @if(!$attachment->register)
                                            <li class="p-2">
                                                <a href="{{@asset('/storage').'/'.$attachment->file}}" target="_blank" class="text-bioclin underline hover:no-underline hover:text-slate-300 hover:duration-200">{{$attachment->name}}
                                                    - Expira: {{$attachment->expiration_date}}</a>
                                            </li>
                                        @else
                                            <li class="p-2">
                                                <a href="https://consultas.anvisa.gov.br/#/genericos/q/?numeroRegistro={{$attachment->register}}" target="_blank" class="text-bioclin underline hover:no-underline hover:text-slate-300 hover:duration-200">{{$attachment->name}}
                                                    - Expira: {{$attachment->expiration_date}}</a>
                                            </li>
                                        @endif

                                    @empty
                                    @endforelse
                                </ol>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
