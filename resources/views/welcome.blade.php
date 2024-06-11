@extends('templates.layout')
@section('title', 'Bioclin')
@section('content')

    <section class="sm:block w-full h-full sm:px-0">
        @if($heros[0]->image)
            <div
                class="w-full h-[550px] md:h-[700px] relative bg-cover bg-no-repeat bg-center md:rounded-[0px] md:pt-0 pt-12"
                style="background-image: url('{{asset('storage/'.$heros[0]->image)}}');" fetchpriority="high">


                @if($heros[0]->title)
                    <div class="hidden md:flex bg-white/75 absolute bottom-16 px-6 pl-48 py-8 spr-6">
                        <h3 class="font-bold uppercase text-lg sm:text-4xl title text-bioclin">
                            {{--                    {{__('welcome.desc_hero')}}--}}
                            {{$heros[0]->title}}
                        </h3>
                    </div>
                @endif
                <div
                    class="flex flex-col sm:w-96 border-2 border-white rounded-3xl sm:absolute sm:right-0 sm:top-0 sm:mt-10 sm:mr-10 justify-center items-center p-4">
                    <div class="bg-white/70 w-full h-full rounded-3xl flex flex-col gap-6 py-6">
                        <livewire:select-filter-home/>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <!--  FIM HERO  -->
    <!--  INICIO SOBRE NOS  -->
    <section class="w-full max-w-7xl mx-auto bg-zinc-50 md:py-28 py-14" id="about">
        <div class="w-full max-w-7xl mr-auto flex flex-col md:flex-row gap-5">
            <div class="w-full md:max-w-2xl">
                <img
                    src="{{asset('img/novasede.webp')}}"
                    alt="Fachada fabrica nova">
            </div>
            <div class="w-full md:max-w-2xl flex flex-col justify-between px-2 gap-3">
                <div class="flex flex-col justify-between items-start gap-3 whitespace-pre-line">
                    <h1 class="text-azul-bioclin text-4xl capitalize">{{__('welcome.sobre')}}</h1>
                    <h2 class="text-zinc-600 text-2xl">{{__('welcome.qualidade')}}</h2>
                    <p class="text-base leading-6 text-zinc-600">{{__('welcome.sobre_nos')}}</p>
                </div>
                <a href="{{route('timelines.index')}}" aria-label="saiba mais sobre a bioclin"
                   class="border-2 border-cinza-bioclin text-azul-bioclin
                   px-16 py-4 self-start rounded font-medium hover:bg-cinza-bioclin font-medium hover:text-white
                   duration-200">
                    {{__('welcome.saiba_mais')}}
                </a>
            </div>

        </div>

    </section>
    <!--  FIM SOBRE NOS  -->
    <!--  INICIO LINHAS  -->
    <section class="w-full h-full bg-bioclin" id="lines">
        <div class="w-full max-w-7xl mx-auto h-full px-4 md:py-28 py-14">
            <div class="w-full flex flex-col gap-14 items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl lg:text-6xl text-white capitalize">
                        {{__('welcome.titulo_linha')}}
                    </h1>
                </div>
                <div class="w-full flex">
                    <div class="w-full flex flex-wrap justify-center items-center gap-10">
                        @foreach($lines as $line)
                            <div
                                class="relative h-44 w-44 text-center flex justify-center items-center hover:scale-110 duration-200">
                                <div class="text-center">
                                    <img src="{{asset('storage/'.$line->logo)}}" alt="{{$line->name}}"
                                         class="rounded-xl border-2 shadow-2xl shadow-cinzabioclin">
                                </div>
                                <div class="absolute bottom-3">
                                    <a href="{{route('lines.show', [$line->slug])}}"
                                       class="capitalize hover:text-cinzabioclin duration-200 hover:scale-105"
                                       aria-label="Saiba mais sobre as linhas da bioclin">
                                        <small>{{__('welcome.saiba_mais')}}</small>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Inicio serviços-->
    <section class="w-full h-full">
        <div class="w-full max-w-7xl mx-auto h-full px-4 md:py-28 py-14" id="services">
            <div class="flex flex-col items-center gap-14">
                <div class="flex flex-col justify-center items-center gap-5 leading-8">
                    <div>
                        <h1 class="text-3xl md:text-4xl lg:text-6xl text-bioclin">
                            {{__('welcome.institucional')}}
                        </h1>
                    </div>
                    {{--                    <div>--}}
                    {{--                        <p>--}}
                    {{--                            {{__('welcome.desc_institucional')}}--}}
                    {{--                        </p>--}}
                    {{--                    </div>--}}
                </div>
                <div class="w-full flex flex-wrap justify-center items-center gap-6">

                    @foreach($services as $service)
                        <div
                            class="flex flex-row items-center gap-3 min-w-96 border bg-slate-50 rounded-xl shadow-2xl shadow-gray-300 ">
                            <div class="w-32 h-32 bg-cover bg-no-repeat bg-left-bottom rounded-l-xl"
                                 style="background-image: url('{{@asset('storage/'.$service->image)}}')">
                            </div>
                            <div class="flex flex-col px-8">
                                <div>
                                    <a href='@if ($service->route === '#')  @else {{route("$service->route")}} @endif'
                                       aria-label="Saiba mais sobre os serviços">
                                        <h1 class="text-2xl text-bioclin">{{$service->name}}</h1>
                                    </a>
                                </div>
                                <div>
                                    <a href='@if ($service->route === '#')  @else {{route("$service->route")}} @endif'
                                       aria-label="Saiba mais sobre os serviços">
                                        <small class="hover:text-cinzabioclin duration-200 hover:scale-105">
                                            {{__('welcome.saiba_mais')}}</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--  INICIO PARCEIROS  -->
    <section class="w-full h-full bg-bioclin" id="lines">
        <div class="w-full max-w-7xl mx-auto h-full px-4 md:py-28 py-14">
            <div class="w-full flex flex-col gap-14 items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl lg:text-6xl text-white capitalize">
                        {{__('welcome.titulo_parceiros')}}
                    </h1>
                </div>
                <div class="w-full flex">
                    <div class="w-full flex flex-wrap justify-center items-center gap-6">

                        @foreach($partners as $partner)
                            <a href="{{$partner->link}}" target="_blank">
                                <div
                                    class="bg-white relative h-44 w-44 text-center flex justify-center border items-center hover:scale-110 duration-200 rounded-full shadow-2xl shadow-cinzabioclin">
                                    <div class="text-center rounded-full">
                                        <img src="{{asset('storage/'.$partner->image)}}" alt="{{$partner->name}}"
                                             class="shadow-cinzabioclin rounded-full">
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('scripts')
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        <script>
            $('#category-form').submit(function (event) {
                var category = $('#categorySelect').val();
                window.location.href = "{{ url('/products') }}/" + category;
                event.preventDefault(); // Evita que o formulário seja enviado normalmente
            });
        </script>
    @endsection

{{--    https://packagist.org/packages/outhebox/laravel-translations--}}

@endsection
