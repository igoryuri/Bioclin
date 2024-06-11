<div
    class="flex flex-col h-[500px] lg:w-80 rounded-xl hover:scale-105 duration-200 shadow-2xl shadow-gray-400 produto">
    <div
        class="flex justify-center items-center rounded-t-xl bg-white min-h-56 border-b-4
{{--         @if($product->categories->last()->parentCategory->parentCategory->slug == 'humano') border-blue-400--}}
{{--         @elseif($product->categories->last()->parentCategory->parentCategory->slug == 'veterinario') border-green-400--}}
{{--         @elseif($product->categories->last()->parentCategory->parentCategory->slug == 'veterinario-equip') border-teal-400--}}
{{--         @else border-gray-400--}}
{{--         @endif--}}
         " >

{{--        <span class="border-indigo-400 hidden">a</span>--}}
{{--        <span class="border-green-400 hidden">a</span>--}}
{{--        <span class="border-teal-400 hidden">a</span>--}}
{{--        <span class="border-gray-400 hidden">a</span>--}}

        <a href="{{ route('product', [
                                            $product->categories->last()->parentCategory->parentCategory->parentCategory->slug,
                                            $product->categories->last()->parentCategory->parentCategory->slug,
                                            $product->categories->last()->parentCategory->slug,
                                            $product->categories->last()->slug,
                                            $product->slug,
                                            $product->cod_prod
                                          ]) }}" aria-label="{{$product->slug}}">
            <figure class="px-10">
                @if(isset($product->images[0]))
                    <img src="{{@asset("storage/".$product->images[0])}}" alt=""
                         class="px-4 py-4 w-72" aria-label="{{$product->images[0]}}">
                @elseif(isset($product->file))
                    <img src="{{@asset("storage/".substr($product->file,2,-2))}}" alt=""
                         class="px-4 py-4 w-80" aria-label="{{substr($product->file,2,-2)}}">
                @else
                    <img src="{{@asset('img/products/none.webp')}}" alt=""
                         class="px-4 self-start grayscale duration-200 w-80"
                         aria-label="sem imagem">
                @endif
            </figure>
        </a>
    </div>
    <div
        class="w-full flex flex-col gap-2 bg-white justify-between items-center px-2 h-full rounded-b-xl">
        <div class="w-full h-full flex justify-center items-center">
            <div>
                <h1 class="capitalize text-xl font-semibold text-slate-600 hover:text-slate-500 duration-300 text-center">
                    <a href="{{ route('product', [
                                                $product->categories->last()->parentCategory->parentCategory->parentCategory->slug,
                                                $product->categories->last()->parentCategory->parentCategory->slug,
                                                $product->categories->last()->parentCategory->slug,
                                                $product->categories->last()->slug,
                                                $product->slug,
                                                $product->cod_prod
                                              ]) }}" aria-label="{{$product->slug}}">

                        {{$product->name}}
                    </a>
                </h1>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 w-full text-xs justify-center items-center capitalize">
            @if(isset($product->categories->last()->parentCategory->parentCategory->parentCategory->parentCategory->name))
                <div class="border px-2 py-1 rounded-full border-slate-500">
                    {{$product->categories->last()->parentCategory->parentCategory->parentCategory->parentCategory->name}}
                </div>
            @endif
            <div class="border px-2 py-1 rounded-full border-slate-500">
                {{$product->categories->last()->parentCategory->parentCategory->parentCategory->name}}
            </div>
            <div class="border px-2 py-1 rounded-full border-slate-500">
                {{$product->categories->last()->parentCategory->name}}
            </div>
        </div>
        <div class="w-full flex justify-end flex-col py-3">
            <div class="">
                <small
                    class="capitalize flex flex-row justify-center items-center gap-2 text-slate-600 hover:text-slate-500 duration-300">
                    <a href="{{ route('product', [
                                                    $product->categories->last()->parentCategory->parentCategory->parentCategory->slug,
                                                    $product->categories->last()->parentCategory->parentCategory->slug,
                                                    $product->categories->last()->parentCategory->slug,
                                                    $product->categories->last()->slug,
                                                    $product->slug,
                                                    $product->cod_prod
                                                  ]) }}" aria-label="{{$product->slug}}">
                        {{__('welcome.saiba_mais')}}
                    </a>
                    <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5"
                                                     stroke="currentColor" class="w-4 h-4 text-slate-600">
                                                  <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"/>
                                                </svg>
                                            </span>
                </small>
            </div>
        </div>
    </div>
</div>

