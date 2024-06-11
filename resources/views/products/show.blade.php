@php use Illuminate\Support\Str; @endphp
@extends('templates.layout')
@section('title', "Bioclin ".$product->name)
@section('meta-description', $product->meta_description ?: $product->name)
@section('content')
    <main class="min-h-screen">
        <div class="flex sm:flex-row flex-col gap-3 max-w-7xl mx-auto py-4 bg-zinc-50 min-h-[550px]">
            <div class="md:basis-2/5 rounded-lg flex flex-col justify-between p-1">
                <div class="w-full flex flex-col gap-2 p-4">
                    <div>
                        <h1 class="sm:text-2xl text-xl font-medium uppercase">{{$product->name}}</h1>
                        <div class="flex flex-row py-2 justify-center items-center">
                            <small class="text-xs"><span class="font-bold">REF:</span> #{{$product->sku_id}}</small>
                            <div class="flex grow justify-end text-gray-600 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                          d="M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:hidden md:basis-3/5 rounded-lg flex w-full text-center items-center bg-gray-800">
                    <div class="grid grid-flow-col gap-2 w-full h-96 md:h-full p-4">
                        @if( $product->images !== null && empty($product->images))
                            @foreach($product->images as $image)
                                <div
                                    class="row-span-2 col-span-2 grid place-items-center bg-cover bg-no-repeat bg-center cursor-pointer shadow-lg shadow-gray-500 rounded-md"
                                    style="background-image: url('{{@asset("storage/".$image)}}')"
                                    data-fancybox="gallery"
                                    data-caption="{{$image}}" data-src='{{@asset("storage/".$image)}}'>
                                </div>
                            @endforeach
                        @else
                            <div
                                class="row-span-2 col-span-2 grid place-items-center bg-cover bg-no-repeat bg-center cursor-pointer shadow-gray-500 grayscale"
                                style="background-image: url('{{@asset('img/products/none.webp')}}')">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-3 p-4 h-full">
                    <div>
                        <div
                            class="text-base text-gray-600 text-left">{!! Str::markdown($product->info) !!}</div>
                    </div>
                </div>

{{--                <div class="flex sm:flex-row flex-col p-4 justify-between">--}}
{{--                    <div class="px-3 py-2 bg-bioclin border border-white rounded-lg text-white text-sm">--}}
{{--                        <span>{{__('products.cod_prod')}}: </span>--}}
{{--                        <span class="font-semibold">{{$product->cod_prod}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="px-3 py-2 bg-bioclin border border-white rounded-lg text-white text-sm">--}}
{{--                        <span>{{__('products.sku')}}: </span>--}}
{{--                        <span class="font-semibold">{{$product->sku_id}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="px-3 py-2 bg-bioclin border border-white rounded-lg text-white text-sm">--}}
{{--                        <span>{{__('products.peso')}}: </span>--}}
{{--                        <span class="font-semibold">{{$product->convert_gr_kg($product->weight)}} Kg</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <!--INICIO GALERIA-->
            <div class="hidden md:basis-3/5 rounded-lg md:flex w-full text-center items-center bg-gray-100">
                <div class="grid grid-flow-col gap-2 w-full h-96 md:h-full p-4">
                    @if( $product->images !== null && !empty($product->images))
                        @foreach($product->images as $image)
                            <div
                                class="row-span-2 col-span-2 grid place-items-center bg-cover bg-no-repeat bg-center cursor-pointer shadow-lg shadow-gray-500 rounded-md"
                                style="background-image: url('{{@asset("storage/".$image)}}')"
                                data-fancybox="gallery"
                                data-caption="{{$image}}" data-src='{{@asset("storage/".$image)}}'>
                                <img src="" alt="{{$image}}" hidden="">
                            </div>
                        @endforeach
                    @else
                        <div
                            class="row-span-2 col-span-2 grid place-items-center bg-cover bg-no-repeat bg-center cursor-pointer shadow-gray-500 grayscale"
                            style="background-image: url('{{@asset('img/products/none.webp')}}')">
                        </div>
                    @endif
                </div>
            </div>
            <!--FIM GALERIA-->
        </div>

        {{--            informações do produto inicio--}}
        <div
            class="hidden md:flex flex-row sm:flex-col gap-6 max-w-7xl mx-auto py-6 px-4 bg-zinc-50 border rounded-lg shadow-md">
            <div>
                <ul class="flex flex-col sm:flex-row gap-6 text-bioclin text-lg font-medium" id="tab">
                    @foreach($product->descriptions as $description)
                        <li onclick="toggleClassAndShowDiv(this, 'div{{$description->id}}')"
                            class=" truncate px-2 cursor-pointer hover:text-cinzabioclin
                            @if($description->id === 1) border-b-2 @else border-none @endif  border-cinzabioclin">
                            {{$description->name}}
                        </li>
                    @endforeach
                    @if(isset($product->attachments))
                        <li onclick="toggleClassAndShowDiv(this, 'div41')"
                            class="px-2 cursor-pointer hover:text-cinzabioclin border-none border-cinzabioclin capitalize">
                            {{__('welcome.produtos_relacionados')}}
                        </li>
                    @endif
                    @if(isset($product->related_products))
                        <li onclick="toggleClassAndShowDiv(this, 'div40')"
                            class="px-2 cursor-pointer hover:text-cinzabioclin border-none border-cinzabioclin capitalize">
                            {{__('welcome.documentos')}}
                        </li>
                    @endif
                </ul>
            </div>
            <div id="content" class="min-h-56 sm:min-h-32 py-2 px-6 line">

                @foreach($product->descriptions as $description)
                    <div id="div{{$description->id}}"
                         class="content @if($description->id === $first_desc->id) block @else hidden @endif  text-gray-600 list-disc leading-10">
                        {!! Str::markdown($description->description) !!}
                    </div>
                @endforeach
                @if(isset($product->attachments))
                    <div id="div40" class="content hidden">
                        <ul class="leading-10">
                            @foreach($product->attachments as $attachment)
                                <li>
                                    <a href="@if(isset($attachment->file)){{@asset("storage/".$attachment->file)}}@else{{$attachment->register}} @endif"
                                       class="flex items-center text-gray-600" target="_blank">
                                        @if($attachment->file)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="w-6 h-6 mr-3 text-teal-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="w-6 h-6 mr-3 text-teal-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
                                            </svg>
                                        @endif
                                        {{$attachment->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(isset($product->related_products))
                    <div id="div41" class="content hidden">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li class="flex gap-x-6 py-5">
                                <table class="border-collapse table-auto w-full text-sm shadow-2xl">
                                    <thead>
                                    <tr>
                                        <th class="border-b font-medium p-4 pl-8 pt-2 pb-3 text-slate-600 text-left">
                                            Cod
                                        </th>
                                        <th class="border-b font-medium p-4 pl-8 pt-2 pb-3 text-slate-600 text-left">
                                            Nome
                                        </th>
                                        <th class="border-b font-medium p-4 pl-8 pt-2 pb-3 text-slate-600 text-left">
                                            SKU
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-slate-800">
                                    @foreach($related_products as $relate)
                                        <tr>
                                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 hover:underline">
                                                <a href="{{route('products.show', [$relate->slug, $relate->cod_prod])}}">
                                                    {{$relate->cod_prod}}
                                                </a>
                                            </td>
                                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 hover:underline">
                                                <a href="{{route('products.show', [$relate->slug, $relate->cod_prod])}}" >
                                                    {{ucfirst($relate->name)}}
                                                </a>
                                            </td>
                                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 hover:underline">
                                                <a href="{{route('products.show', [$relate->slug, $relate->cod_prod])}}">
                                                    {{$relate->sku_id}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </li>
                        </ul>
                    </div>
                @endif


            </div>
        </div>


        <div class="block md:hidden">
            <div class="flex flex-col gap-4 hs-accordion-group w-full px-6 py-4">
                @foreach($product->descriptions as $description)
                    <div class="hs-accordion" id="hs-basic-heading-one-{{$description->id}}">
                        <button
                            class="capitalize px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none"
                            aria-controls="hs-basic-collapse-one">
                            <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            {{$description->name}}
                        </button>
                        <div id="hs-basic-collapse-one"
                             class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="hs-basic-heading-one">
                            <p class="text-gray-800 dark:text-neutral-200">
                                {!! Str::markdown($description->description) !!}
                            </p>
                        </div>
                    </div>
                @endforeach
                @if(isset($product->attachments))
                    <div class="hs-accordion" id="hs-basic-heading-two">
                        <button
                            class="capitalize px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none"
                            aria-controls="hs-basic-collapse-two">
                            <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            {{__('welcome.documentos')}}
                        </button>
                        <div id="hs-basic-collapse-two"
                             class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="hs-basic-heading-two">
                            @foreach($product->attachments as $attachment)
                                <a href="@if(isset($attachment->file)){{@asset("storage/".$attachment->file)}}@else{{$attachment->register}} @endif"
                                   class="flex items-center text-gray-600" target="_blank">
                                    <p class="text-gray-800 dark:text-neutral-200">
                                        @if($attachment->file)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="w-6 h-6 mr-3 text-teal-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="w-6 h-6 mr-3 text-teal-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
                                            </svg>
                                        @endif
                                        {{$attachment->name}}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(isset($product->related_products))
                    <div class="hs-accordion" id="hs-basic-heading-three">
                        <button
                            class="capitalize px-2 py-4 bg-bioclin text-white hs-accordion-toggle inline-flex items-center gap-x-3 w-full font-semibold text-start hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none"
                            aria-controls="hs-basic-collapse-three">
                            <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            {{__('welcome.produtos_relacionados')}}
                        </button>
                        <div id="hs-basic-collapse-three"
                             class="px-4 py-3 hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                             aria-labelledby="hs-basic-heading-three">
                            <table class="border-collapse table-auto w-full text-sm shadow-2xl">
                                <thead>
                                <tr>
                                    <th class="border-b font-medium p-4 pl-8 pt-2 pb-3 text-slate-600 text-left">
                                        Cod
                                    </th>
                                    <th class="border-b font-medium p-4 pl-8 pt-2 pb-3 text-slate-600 text-left">
                                        Nome
                                    </th>
                                    <th class="border-b font-medium p-4 pl-8 pt-2 pb-3 text-slate-600 text-left">
                                        SKU
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-800">
                                @foreach($related_products as $relate)
                                    <tr>
                                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 hover:underline">
                                            <a href="{{route('products.show', [$relate->slug, $relate->cod_prod])}}">
                                                {{$relate->cod_prod}}
                                            </a>
                                        </td>
                                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 hover:underline">
                                            <a href="{{route('products.show', [$relate->slug, $relate->cod_prod])}}" >
                                                {{ucfirst($relate->name)}}
                                            </a>
                                        </td>
                                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500 hover:underline">
                                            <a href="{{route('products.show', [$relate->slug, $relate->cod_prod])}}">
                                                {{$relate->sku_id}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>


    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            //
        });
    </script>
    <script>
        function mudarImagem(caminho) {
            // Obtém a referência à imagem grande em destaque
            var imagemDestaque = document.getElementById('destaque').getElementsByTagName('img')[0];

            var ancora = document.getElementById('destaque');

            // Define o atributo data-src da âncora com o caminho da imagem
            ancora.setAttribute('data-src', caminho);

            // Atualiza o atributo 'src' da imagem grande
            imagemDestaque.src = caminho;
        }

        function toggleClassAndShowDiv(element, divId) {
            // Remove a classe 'border-b-2' de todos os elementos da lista
            var listaItems = document.getElementById('tab').getElementsByTagName('li');
            for (var i = 0; i < listaItems.length; i++) {
                listaItems[i].classList.remove('border-b-2');
                listaItems[i].classList.add('border-none');
            }

            // Adiciona a classe 'border-b-2' ao elemento clicado
            element.classList.remove('border-none');
            element.classList.add('border-b-2');

            // Esconde todas as divs
            var divs = document.getElementById('content').getElementsByTagName('div');
            for (var i = 0; i < divs.length; i++) {
                divs[i].classList.add('hidden');
            }

            // Exibe a div correspondente
            document.getElementById(divId).classList.remove('hidden');
            document.getElementById(divId).classList.add('block');
        }
    </script>
@endsection
