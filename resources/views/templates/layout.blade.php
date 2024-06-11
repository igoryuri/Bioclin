<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth focus:scroll-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="@if(isset($product)) @yield('meta-description')
          @else A Quibasa-Bioclin é uma indústria mineira focada na produção e desenvolvimento de kits de diagnósticos para laboratório de análises clínicas.
          @endif">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;600;700&display=swap">

    <link rel="icon" href="{{@asset('img/Favicon.png')}}">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" as="style"
          onload="this.onload=null;this.rel='stylesheet'"/>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/showdown/dist/showdown.min.js"></script>

    <title>@yield('title')</title>


</head>
<body class="bg-zinc-50 min-h-screen font-open-sans">

<header class="p-4 sticky top-0 z-50 bg-white">
    <div class="w-full md:max-w-7xl 2xl:max-w-10xl mx-auto">
        <div class="w-full flex md:flex-row flex-col items-center gap-5 justify-between">
            <div class="w-44">
                <a href="{{route('home')}}" aria-label="link para home do site">
                    <img src="{{@asset('img/Bioclin-Digital-Fundo-Transparente.webp')}}" alt="Logo Bioclin"
                         class="h-10">
                </a>
            </div>
            <div class="w-full hidden md:w-3/5 md:flex justify-center items-center">
                <nav>
                    <ul class="flex gap-12">
                        <li class="capitalize hover:border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('home')}}" aria-label="link para home do site">Home</a>
                        </li>
                        <li class="capitalize hover:border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('home')}}#about"
                               aria-label="link para Sobre nós">{{__('welcome.sobre')}}</a>
                        </li>
                        <li class="capitalize hover:border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('home')}}#lines" aria-label="link para Linhas">{{__('welcome.linhas')}}</a>
                        </li>
                        <li class="capitalize hover:border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('products.index')}}"
                               aria-label="link para Produtos">{{__('welcome.produtos')}}</a>
                        </li>
                        <li class="capitalize hover:border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('index-email')}}" aria-label="link para Contatos">
                                {{__('welcome.contatos')}}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="w-full md:max-w-80">
                <div class="relative">
                    <form action="{{ route('home.search', request()->query()) }}">
                        <input type="search"
                               class="w-full pl-10 pr-8 py-1 border rounded-full"
                               placeholder="{{__('welcome.busca')}}" name="search" id="search"/>
                        <div class="absolute inset-y-0 left-0 pl-3
                    flex items-center
                    pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 text-slate-300">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                            </svg>

                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-row gap-1">

                @foreach(config('localization.locales') as $locale)
                    <a href="{{route('localization', $locale)}}"
                       class="hover:underline duration-200 @if(app()->getLocale() != $locale) grayscale @endif">
                        <x-icon name="flag-language-{{ $locale }}" class="w-6 h-6" aria-label="{{ $locale }} link"/>
                    </a>
                @endforeach

            </div>
            <div x-data="{ open: false }" class="absolute left-0">
                <div class="container mx-auto flex justify-between items-center p-4">
                    <button @click="open = !open" class="md:hidden text-bioclin" aria-label="hamburguer button">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>
                </div>
                <div x-show="open" class="md:hidden w-96">
                    <ul class="bg-white p-4 flex flex-col gap-12 text-center">
                        <li class="capitalize border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('home')}}" aria-label="link para home do site">Home</a>
                        </li>
                        <li class="capitalize border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('home')}}#about"
                               aria-label="link para Sobre nós">{{__('welcome.sobre')}}</a>
                        </li>
                        <li class="capitalize border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('home')}}#lines"
                               aria-label="link para Linhas">{{__('welcome.linhas')}}</a>
                        </li>
                        <li class="capitalize border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="{{route('products.index')}}"
                               aria-label="link para Produtos">{{__('welcome.produtos')}}</a>
                        </li>
                        <li class="capitalize border-b border-cinzabioclin cursor-pointer hover:text-cinzabioclin text-bioclin text-xl duration-200 hover:duration-200 ease-in-out transition-all hover:transition-all">
                            <a href="#" aria-label="link para Contatos" data-modal-target="crud-modal"
                               data-modal-toggle="crud-modal">{{__('welcome.contatos')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

@if (session('status'))

    <!-- Toast -->
    <div id="dismiss-toast" class="absolute top-12 end-5 z-50">
        <div class="max-w-xs bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg" role="alert">
            <div class="flex p-4">
                {{ session('status') }}
                <div class="ms-auto">
                    <button type="button"
                            class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-teal-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100"
                            data-hs-remove-element="#dismiss-toast">
                        <span class="sr-only">Close</span>
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
    <!-- End Toast -->
@endif
@if (session('error'))

    <!-- Toast -->
    <div id="dismiss-toast" class="absolute top-12 end-5 z-50">
        <div class="max-w-xs bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg" role="alert">
            <div class="flex p-4">
                {{ session('status') }}
                <div class="ms-auto">
                    <button type="button"
                            class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-teal-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100"
                            data-hs-remove-element="#dismiss-toast">
                        <span class="sr-only">Close</span>
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
    <!-- End Toast -->
@endif

@yield('content')
@extends('templates.contact')

<footer class="bg-white mt-4">
    <div class="mx-auto w-full max-w-screen-xl">
        <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">{{__('welcome.duvidas')}}</h2>
                <ul class="text-gray-500 font-medium">

                    <li class="mb-4">
                        <a href="{{route('faq')}}" class="hover:underline">{{__('welcome.faq')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('send-receiver')}}" class="hover:underline">{{__('welcome.pol_env_ent')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('exchange-return')}}"
                           class="hover:underline">{{__('pol-troca-dev.polTrocaDevTitle')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{@asset('storage/privacy/Politica-de-Privacidade-Bioclin.pdf')}}" target="_blank"
                           class="hover:underline">{{__('welcome.privacidade')}}</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">{{__('welcome.institucional')}}</h2>
                <ul class="text-gray-500 font-medium">
                    <li class="mb-4">
                        <a href="{{route('home')}}#about"
                           class="hover:underline capitalize">{{__('welcome.bioclin')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('address')}}"
                           class="hover:underline capitalize">{{__('welcome.como_chegar')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class=" hover:underline" data-modal-target="default-modal"
                           data-modal-toggle="default-modal"
                        >{{__('welcome.distribuidores')}}</a>
                    </li>
                    @if(app()->getLocale() === 'pt-br')
                        <li class="mb-4">
                            <a href="{{route('jobs')}}" class="capitalize">{{__('welcome.trabalhe_conosco')}}</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{route('relatorio')}}" class="capitalize">Relatório de Transparência Salarial</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">{{__('welcome.menu')}}</h2>
                <ul class="text-gray-500 font-medium">
                    <li class="mb-4">
                        <a href="{{route('home')}}" class="hover:underline capitalize">{{__('Home')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('home')}}#about" class="hover:underline capitalize">{{__('welcome.sobre')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('home')}}#lines"
                           class="hover:underline capitalize">{{__('welcome.linhas')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('products.index')}}"
                           class="hover:underline capitalize">{{__('welcome.produtos')}}</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('index-email')}}" aria-label="link para Contatos"
                           class="hover:underline capitalize">{{__('welcome.contatos')}}</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Download</h2>
                <ul class="text-gray-500 font-medium">
                    <li class="mb-4">
                        <a href="https://apps.apple.com/br/app/bioclin-quibasa/id6456453662"
                           class="hover:underline uppercase">iOS</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://play.google.com/store/apps/details?id=br.com.bioclin.app&pcampaignid=web_share"
                           class="hover:underline">Android</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="px-4 py-6 bg-gray-100 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-600 sm:text-center">© 2024 <a href="{{route('home')}}">Bioclin™</a>. {{__('welcome.rigths')}}.
        </span>
            <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
                <a href="https://www.facebook.com/bioclinglobal/?locale=pt_BR"
                   class="text-gray-600 hover:text-gray-900">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                              d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="https://www.instagram.com/bioclinglobal/" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-4 h-4" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor"
                         viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                    </svg>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="https://www.linkedin.com/company/bioclin/mycompany/" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-4 h-4" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor"
                         viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path
                            d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                    </svg>
                    <span class="sr-only">Linkedin</span>
                </a>
                <a href="https://www.youtube.com/c/BioclinDiagnostica" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-4 h-4" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor"
                         viewBox="0 0 576 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path
                            d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                    </svg>
                    <span class="sr-only">Youtube</span>
                </a>
            </div>
        </div>
    </div>
</footer>

{{--Alerta LGPD--}}

@if(session('show_privacy_alert'))

    <x-cookie/>

@endif
<script>
    document.getElementById('accept-privacy').addEventListener('click', function () {
        // Faz uma requisição AJAX para a rota '/set-cookie'
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/set-cookie', true);
        xhr.onload = function () {
            if (xhr.status == 200) {
                // A requisição foi bem-sucedida
                // Oculta o alerta de privacidade (ou faz qualquer outra ação desejada)
                document.querySelector('.privacy-alert').style.display = 'none';
            } else {
                // A requisição falhou
                console.error('Ocorreu um erro ao tentar definir o cookie.');
            }
        };
        xhr.send();
    });
</script>

{{--fim lgpd--}}

<div id="chat_tm2" style="display: none"></div>

<script>var TM2_URL = "https://bioclin.tm2digital.com/chat";
    var TM2_TOKEN = "muEqz-ictuf-Kwaji-mKJFn-lobIw";
    var url = TM2_URL + "/api/webchat/" + TM2_TOKEN;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var done = !1;
            var script = document.createElement("script");
            script.async = !0;
            script.type = "application/javascript";
            script.src = TM2_URL + "/api/webchat/js/" + TM2_TOKEN;
            document.getElementById("chat_tm2").innerHTML = this.response;
            script.onreadystatechange = script.onload = function (e) {
                if (!done && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
                    done = !0;
                    startTm2Chat()
                }
            };
            document.getElementsByTagName("HEAD").item(0).appendChild(script)
        }
    };
    xhr.send();</script>

@extends('templates.modal')

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@yield('scripts')

</body>
</html>




