@extends('templates.layout')
@section('title', 'Bioclin '.ucfirst(__('welcome.produtos')))
@section('css')
@endsection
@section('content')
    <main class="w-full 2xl:max-w-11xl mx-auto min-h-screen pb-10">

        <div class="w-full px-2 md:px-8 flex flex-row justify-end mt-6 mb-2">
            <div class="relative w-full">
                <form action="{{ route('products.search')}}"
                      class="w-full flex md:flex-row gap-4 justify-end">

                    <input type="search"
                           class="border w-full md:w-[500px] pl-10 pr-8 py-4 rounded-lg"
                           placeholder="{{__('welcome.busca_produtos')}}" name="search" id="filtro"/>

                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-slate-300">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                    </div>

                    <button
                        type="submit"
                        class="hidden md:block w-full md:w-40 text-center pointer-events-auto rounded-md bg-bioclin hover:bg-cinza-bioclin py-4 px-3 font-semibold leading-5 text-white"
                    >
                        Search
                    </button>

                </form>
            </div>
        </div>

        <div class="w-full flex md:flex-row flex-col gap-4">
            {{--inicio filtros--}}
            <div class="z-1 w-full md:w-96 md:p-4 flex-col md:min-h-lvh sticky top-0 flex capitalize">
                @include('menu.filters')
            </div>
            <div class="w-full grid grid-cols-1 gap-4 sticky top-0 justify-between p-4">
                <div class="w-full px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="produtos-div">
                    @foreach($products as $product)
                        @if(isset($product->categories->last()->parentCategory->parentCategory->parentCategory->slug))
                            @include('products.last')
                        @else
                            @include('products.first')
                        @endif
                    @endforeach

                </div>
                <div class="w-full px-4 py-4">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </main>

@endsection
@section('scripts')
    <script>
        function filtrarProdutos() {
            var filtro = document.getElementById('filtro').value.toLowerCase();
            var produtos = document.getElementsByClassName('produto');

            for (var i = 0; i < produtos.length; i++) {
                var produto = produtos[i];
                var nomeProduto = produto.textContent || produto.innerText;

                if (nomeProduto.toLowerCase().indexOf(filtro) > -1) {
                    produto.style.display = '';
                } else {
                    produto.style.display = 'none';
                }
            }
        }


        document.addEventListener('DOMContentLoaded', function () {
            // O código abaixo será executado quando a página estiver totalmente carregada

            // 1. Obtenha a URL atual
            const currentUrl = window.location.href;

            // 2. Encontre a parte fixa "products/" na URL
            const productsIndex = currentUrl.indexOf('products/');

            // 3. Se a parte fixa for encontrada, obtenha os slugs após "products/"
            if (productsIndex !== -1) {
                const slugsAfterProducts = currentUrl.substring(productsIndex + 'products/'.length);

                // 4. Extraia cada slug (separados por '/')
                const slugs = slugsAfterProducts.split('/');

                // 5. Encontre e ajuste o atributo aria-expanded para cada botão correspondente
                slugs.forEach(function (slug) {
                    const targetButton = document.getElementById(slug);
                    if (targetButton) {
                        targetButton.setAttribute('aria-expanded', 'true');
                    }
                });
            }
        });

    </script>

@endsection
