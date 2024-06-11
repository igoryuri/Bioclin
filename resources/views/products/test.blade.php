@extends('templates.layout')
@section('content')
    <div class="w-full min-h-screen">
        <div class="flex flex-row w-full max-w-7xl mx-auto ">
            <div class="flex flex-col bg-blue-500 w-48 p-4">
                @foreach($frontCategories as $parentCategory)
                    <a href="{{ route('category', [$parentCategory]) }}">{{ $parentCategory->name }}
                        ({{ $parentCategory->products_count }})</a>
                    <br>
                    @if($parentCategory->childCategories->count())
                        @foreach($parentCategory->childCategories as $category)
                            <a href="{{ route('category', [$parentCategory, $category]) }}"
                               class="p-4 bg-fuchsia-500">{{ $category->name }}
                                ({{ $category->products_count }})</a>
                            <br>
                            @if($category->childCategories->count())
                                @foreach($category->childCategories as $childCategory)
                                    <a
                                        href="{{ route('category', [$parentCategory, $category, $childCategory->slug]) }}"
                                        class=" p-4 bg-green-300"
                                    >
                                        {{ $childCategory->name }} ({{ $childCategory->products_count }})
                                    </a>
                                    <br>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="w-full p-24 bg-amber-100">
                <div class="grid grid-cols-3 gap-4">
                    @if(isset($products))
                        @foreach($products as $product)
                            <div class="bg-slate-100 p-4 border">
                                <div>
                                    <div class="w-48">
                                        @if(isset($product->images[0]->file[0]))
                                            <img src="{{@asset("storage/".$product->images[0]->file[0])}}" alt=""
                                                 class="px-4 py-4">
                                        @elseif(isset($product->file))
                                            <img src="{{@asset("storage/".substr($product->file,2,-2))}}" alt=""
                                                 class="px-4 py-4">
                                        @else
                                            <img src="{{@asset('img/products/none.jpg')}}" alt=""
                                                 class="px-4 self-start grayscale duration-200">
                                        @endif
                                    </div>
                                    <div>{{$product->name}}</div>
                                    <div>{{$product->sku_id}}</div>
                                    <div> {{$product->cod_prod}}</div>
                                    <div>{{$product->slug}}</div>
                                </div>
                            </div>
                        @endforeach
                        <div>
                            <div class="w-full px-4 py-4 border rounded-2xl">
                                {{ $products->onEachSide(1)->links() }}
                            </div>
                        </div>
                    @else
                        <div class="bg-slate-100 p-4 border">
                            <div>
                                <div>{{$product->name}}</div>
                                <div>{{$product->sku_id}}</div>
                                <div> {{$product->cod_prod}}</div>
                                <div>{{$product->slug}}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endsection

        <div class="container">
            <h1 class="title"></h1>
            <div class="timeline">
                <div class="swiper-container">

                    <div class="swiper-wrapper">
                        @foreach()
                            <div class="swiper-slider" style=""></div>
                            <div class="swiper-slide-content">
                                <span class="timeline-year"></span>
                                <h4 class="timeline-title"></h4>
                                <p class="timeline-text">
                                    {{}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </div>




