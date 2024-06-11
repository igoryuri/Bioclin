@extends('templates.layout')
@section('content')
    <div class="w-full max-w-10xl mx-auto bg-slate-50 px-4 py-6 min-h-screen">

        <div class="grid grid-cols-1 gap-4 justify-around">

            <div class="px-4 py-6">
                @if(($products_query->count() + $lines_query->count() + $services_query->count() + $attachmentProgrammings_query->count()) === 0)
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="text-4xl font-semibold text-bioclin">{{__('search.no_result')}}</h1>
                        <h2 class="text-lg font-semibold text-bioclin">{{__('search.new_search')}}</h2>
                    </div>
                @elseif(($products_query->count() + $lines_query->count() + $services_query->count() + $attachmentProgrammings_query->count()) === 1)
                    <h1 class="text-2xl">
                        {{$products_query->count() + $lines_query->count() + $services_query->count() + $attachmentProgrammings_query->count()}} {{__('search.one_result')}}
                        "{{$search_param}}"
                    </h1>
                @else
                    <h1 class="text-2xl">
                        {{$products_query->count() + $lines_query->count() + $services_query->count() + $attachmentProgrammings_query->count()}} {{__('search.multiple_result')}}
                        "{{$search_param}}"
                    </h1>
                @endif
            </div>

            {{--        Produtos--}}
            @if($products_query->count() != 0)
                <div class="flex flex-col gap-2 px-4 py-6 border bg-white shadow-lg">
                    <div>
                        <h1 class="text-4xl font-bold capitalize text-bioclin">{{__('welcome.produtos')}}</h1>
                    </div>
                    <div>
                        <ul class="flex flex-row flex-wrap justify-between gap-4 p-6">
                            @foreach($products_query as $product)
                                <li>
                                    <div class="grid grid-cols-1 gap-2 w-72 md:w-96 border">
                                        <div class="w-full flex flex-col justify-between">
                                            <div class="w-full px-2 py-3">
                                                <h1 class="capitalize text-xl text-center truncate text-bioclin"
                                                    data-tooltip-target="tooltip-top-{{$product->id}}"
                                                    data-tooltip-placement="top">
                                                    {{$product->name}}
                                                </h1>
                                                <div id="tooltip-top-{{$product->id}}" role="tooltip"
                                                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    {{$product->name}}
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                            @if(isset($product->categories->last()->parentCategory->parentCategory->parentCategory->slug))
                                                <a href="{{ route('product', [
                                            $product->categories->last()->parentCategory->parentCategory->parentCategory->slug,
                                            $product->categories->last()->parentCategory->parentCategory->slug,
                                            $product->categories->last()->parentCategory->slug,
                                            $product->categories->last()->slug,
                                            $product->slug,
                                            $product->cod_prod
                                          ]) }}"
                                                   class="w-full text-center px-3 py-4 bg-bioclin text-white font-semibold">
                                                    {{__('welcome.saiba_mais')}}
                                                </a>
                                            @else
                                                <a href="{{ route('product', [
                                            $product->categories->first()->parentCategory->parentCategory->parentCategory->slug,
                                            $product->categories->first()->parentCategory->parentCategory->slug,
                                            $product->categories->first()->parentCategory->slug,
                                            $product->categories->first()->slug,
                                            $product->slug,
                                            $product->cod_prod
                                          ]) }}"
                                                   class="w-full text-center px-3 py-4 bg-bioclin text-white font-semibold">
                                                    {{__('welcome.saiba_mais')}}
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
            @endif

            {{--        Linhas--}}
            @if($lines_query->count() != 0)
                <div class="flex flex-col gap-2 px-4 py-6 border bg-white shadow-lg">
                    <div>
                        <h1 class="text-4xl font-bold capitalize text-bioclin">{{__('welcome.linhas')}}</h1>
                    </div>
                    <div>
                        <ul class="flex flex-row flex-wrap justify-between gap-4 p-6">
                            @foreach($lines_query as $line)
                                <li>
                                    <div class="grid grid-cols-1 gap-2 w-72 md:w-96 border justify-between">
                                        <div class="w-full flex flex-col justify-around">
                                            <div class="w-full px-2 py-3">
                                                <h1 class="text-xl text-center truncate text-bioclin">
                                                    {{$line->name}}
                                                </h1>
                                            </div>
                                            <a href="{{route('lines.show', [$line->slug])}}"
                                               class="w-full text-center px-3 py-4 bg-bioclin text-white font-semibold">
                                                {{__('welcome.saiba_mais')}}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
            @endif

            {{--        Serviços--}}
            @if($services_query->count() != 0)
                <div class="flex flex-col gap-4 px-4 py-6 border bg-white shadow-lg">
                    <div>
                        <h1 class="text-4xl font-bold capitalize text-bioclin">{{__('welcome.institucional')}}</h1>
                    </div>
                    <div>
                        <ul class="flex flex-row flex-wrap justify-between gap-4 p-6">
                            @foreach($services_query as $service)
                                <li>
                                    <div class="grid grid-cols-1 gap-2 w-72 md:w-96 border justify-between">
                                        <div class="w-full flex flex-col justify-between">
                                            <div class="w-full px-2 py-3">
                                                <h1 class="text-xl text-center truncate text-bioclin">
                                                    {{$service->name}}
                                                </h1>
                                            </div>
                                            <a href="{{route("$service->route")}}"
                                               class="w-full text-center px-3 py-4 bg-bioclin text-white font-semibold">
                                                {{__('welcome.saiba_mais')}}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
            @endif
            {{--           protocolos--}}
            @if($attachmentProgrammings_query->count() != 0)
                <div class="flex flex-col gap-4 px-4 py-6 border bg-white shadow-lg">
                    <div>
                        <h1 class="text-4xl font-bold capitalize text-bioclin">{{__('protocols')}}</h1>
                    </div>
                    <div>
                        <ul class="flex flex-col gap-4 p-6">
                            @foreach($attachmentProgrammings_query as $attach)
                                <li class="flex flex-col md:flex-row md:gap-4  text-white font-bold shadow items-center">
                                    <span class="p-4 bg-cinza-bioclin md:w-80 w-full"> {{$attach->programming->name}}</span>
                                    <x-heroicon-o-arrow-long-right class="hidden md:block w-6 text-black"/>
                                    <a href="{{@asset('storage/'.$attach->file)}}"
                                       class="hover:underline cursor-pointer p-4 bg-bioclin w-full truncate" target="_blank">
                                        {{str_replace('equipments/', '', $attach->file)}}
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
            @endif

        </div>

    </div>

@endsection
