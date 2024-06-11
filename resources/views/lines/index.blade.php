@extends('templates.layout')
@section('title', 'Bioclin '.$lines->name)
@section('content')

    <div class="w-full h-96 bg-no-repeat bg-cover flex justify-center items-center"
         style="background-image: url('{{asset('/storage/'.$lines->image)}}')">
        <div class="w-full py-4 border-y-4 border-[{{$lines->color}}]">
            <div class="w-full text-center text-slate-600 py-12 bg-white/75">
                <h1 class="text-7xl font-semibold">{{$lines->name}}</h1>
            </div>
        </div>

    </div>
    <div class="w-full md:max-w-5xl mx-auto py-12 px-8">
        <div class="text-xl text-center leading-10">
            {!!$lines->description!!}
        </div>
    </div>
    <div class="w-full md:max-w-7xl mx-auto min-h-screen px-4 py-6">
        <h1 class="text-3xl font-semibold p-6 md:p-4 text-bioclin">{{__('line.title_linha')}} {{$lines->name}}</h1>

        <div class="w-full p-4 flex flex-col md:flex-row gap-4 items-center md:justify-between">
            @foreach($lines->products as $product)

                <div
                    class="flex flex-col h-[500px] lg:w-80 rounded-xl hover:scale-105 duration-200 shadow-2xl shadow-gray-400">
                    <div
                        class="flex justify-center items-center rounded-t-xl bg-white min-h-56 border-b-4
         @if($product->categories->first()->parentCategory->parentCategory->slug == 'humano') border-blue-400
         @elseif($product->categories->first()->parentCategory->parentCategory->slug == 'veterinario') border-green-400
         @elseif($product->categories->first()->parentCategory->parentCategory->slug == 'veterinario-equip') border-teal-400
         @else border-gray-400
         @endif" >
                        <span class="border-indigo-400 hidden">a</span>
                        <span class="border-green-400 hidden">a</span>
                        <span class="border-teal-400 hidden">a</span>
                        <span class="border-gray-400 hidden">a</span>

                        <a href="{{ route('product', [
                                            $product->categories->first()->parentCategory->parentCategory->parentCategory->slug,
                                            $product->categories->first()->parentCategory->parentCategory->slug,
                                            $product->categories->first()->parentCategory->slug,
                                            $product->categories->first()->slug,
                                            $product->slug,
                                            $product->cod_prod
                                          ]) }}" aria-label="{{$product->slug}}">
                            <div>
                                @if(isset($product->images[0]))
                                    <img src="{{@asset("storage/".$product->images[0])}}" alt=""
                                         class="rounded-xl object-scale-down h-48 w-96" aria-label="{{$product->images[0]}}">
                                @else
                                    <img src="{{@asset('img/products/none.webp')}}" alt=""
                                         class="rounded-xl object-scale-down h-48 w-96"
                                         aria-label="sem imagem">
                                @endif
                            </div>
                        </a>
                    </div>
                    <div
                        class="w-full flex flex-col gap-2 bg-white justify-between items-center px-2 h-full rounded-b-xl">
                        <div class="w-full h-full flex justify-center items-center">
                            <div>
                                <h1 class="text-xl font-semibold uppercase text-slate-600 hover:text-slate-500 duration-300 text-center">
                                    <a href="{{ route('product', [
                                                $product->categories->first()->parentCategory->parentCategory->parentCategory->slug,
                                                $product->categories->first()->parentCategory->parentCategory->slug,
                                                $product->categories->first()->parentCategory->slug,
                                                $product->categories->first()->slug,
                                                $product->slug,
                                                $product->cod_prod
                                              ]) }}" aria-label="{{$product->slug}}">

                                        {{$product->name}}
                                    </a>
                                </h1>

                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 w-full text-xs justify-center items-center">
                            @if(isset($product->categories->first()->parentCategory->parentCategory->parentCategory->parentCategory->name))
                                <div class="border px-2 py-1 rounded-full border-slate-500">
                                    {{$product->categories->first()->parentCategory->parentCategory->parentCategory->parentCategory->name}}
                                </div>
                            @endif
                            <div class="border px-2 py-1 rounded-full border-slate-500">
                                {{$product->categories->first()->parentCategory->parentCategory->parentCategory->name}}
                            </div>
                            <div class="border px-2 py-1 rounded-full border-slate-500">
                                {{$product->categories->first()->parentCategory->parentCategory->name}}
                            </div>
                            <div class="border px-2 py-1 rounded-full border-slate-500">
                                {{$product->categories->first()->parentCategory->name}}
                            </div>
                        </div>
                        <div class="w-full flex justify-end flex-col py-3">
                            <div class="">
                                <small
                                    class="flex flex-row justify-center items-center gap-2 text-slate-600 hover:text-slate-500 duration-300">
                                    <a href="{{ route('product', [
                                                    $product->categories->first()->parentCategory->parentCategory->parentCategory->slug,
                                                    $product->categories->first()->parentCategory->parentCategory->slug,
                                                    $product->categories->first()->parentCategory->slug,
                                                    $product->categories->first()->slug,
                                                    $product->slug,
                                                    $product->cod_prod
                                                  ]) }}" aria-label="{{$product->slug}}" class="px-2 py-1 font-semibold bg-bioclin rounded-full text-slate-100 hover:text-bioclin hover:bg-slate-100">
                                        {{__('welcome.saiba_mais')}}
                                    </a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
