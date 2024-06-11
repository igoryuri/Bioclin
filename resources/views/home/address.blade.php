@extends('templates.layout')
@section('content')
        <div class="w-full max-w-7xl mx-auto px-2 mt-6 h-svh">

            <div class="flex flex-col gap-4 h-svh">
                <div class="flex flex-col gap-4 px-6 py-4 bg-bioclin text-white">
                    <h1 class="text-3xl font-semibold">Como Chegar</h1>
                    <div class="flex flex-col gap-2">
                        <div class="flex md:flex-row flex-col gap-1 items-center">
                            <h2 class="font-semibold text-xl">Endereço: </h2>
                            <p class="text-lg">Rua Teles de Menezes 92</p>
                        </div>
                        <div class="flex md:flex-row flex-col gap-1 items-center">
                            <h2 class="font-semibold text-xl">Bairro: </h2>
                            <p class="text-lg">Santa Branca</p>
                        </div>
                        <div class="flex md:flex-row flex-col gap-1 items-center">
                            <h2 class="font-semibold text-xl">Cidade: </h2>
                            <p class="text-lg">Belo Horizonte</p>
                        </div>
                        <div class="flex md:flex-row flex-col gap-1 items-center">
                            <h2 class="font-semibold text-xl">Estado: </h2>
                            <p class="text-lg">MG</p>
                        </div>
                        <div class="flex md:flex-row flex-col gap-1 items-center">
                            <h2 class="font-semibold text-xl">CEP: </h2>
                            <p class="text-lg">31.565-130</p>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 border shadow-2xl h-full">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d938.259613114304!2d-43.96749995501578!3d-19.83832585942476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa6903c74346fa7%3A0x55b072b109da7033!2sBioclin%20-%20Quibasa!5e0!3m2!1spt-BR!2sbr!4v1715704548523!5m2!1spt-BR!2sbr" class="w-full h-[95%]" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
@endsection