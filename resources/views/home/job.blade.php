@extends('templates.layout')
@section('content')
    <div class="w-full md:w-2/3 mx-auto mt-6 min-h-svh bg-white" x-data="dataLoader()">
        <div class="flex flex-col md:flex-row justify-between p-4 bg-bioclin">
            <h1 class="text-3xl md:text-5xl px-6 py-8 font-semibold text-white">
                Vagas de Trabalho
            </h1>
            <div>
                <button type="button"
                        class="py-3 px-4 inline-flex items-center text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-overlay-example">
                    Gostou de alguma vaga? Clique aqui e candidate-se!
                </button>
            </div>
        </div>
        <div class="flex flex-row flex-wrap px-4 py-6 justify-evenly gap-4">
            @foreach($jobs as $job)
                <a class="flex flex-col group bg-white border shadow-sm rounded-xl overflow-hidden hover:shadow-lg transition w-72"
                   href="#" @click="fetchData({{$job->id}})"
                   data-hs-overlay="#hs-scroll-inside-viewport-modal">
                    <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                        <img
                            class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                            src='{{@asset("storage/".$job->image)}}'
                            alt="Image Description">
                    </div>
                    <div class="p-4 md:p-5">
                        <h3 class="text-lg font-bold text-gray-800">
                            {{$job->title}}
                        </h3>
                        <p class="mt-1 text-gray-500 truncate">
                            {{$job->description}}
                        </p>
                        <p class="mt-5 text-xs text-gray-500">
                            {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        @if($errors->any())
            <div class="max-w-xs bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg absolute top-12 end-0 z-50" role="alert">
                <div class="flex p-4">
                   Algo deu errado! Tente novamente
                </div>
            </div>
        @endif

        {{--        begin of ofcanvas--}}
        <div id="hs-overlay-example"
             class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s hs-overlay-backdrop-open:bg-bioclin/90" tabindex="-1">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="font-bold text-gray-800">
                    Candidate-se
                </h3>
                <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-overlay-example">
                    <span class="sr-only">Close modal</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <form action="{{route('jobs.send-email')}}" method="POST" enctype="multipart/form-data" id="jobForm">
                    @csrf
                    <!-- Nome -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome<span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" required
                               class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('name')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- E-mail -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail<span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" required
                               class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('email')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Telefone -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefone<span class="text-red-500">*</span></label>
                        <input type="tel" id="phone" name="phone" required
                               class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('phone')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Descrição -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Por que devemos te
                            escolher?<span class="text-red-500">*</span></label>
                        <textarea id="description" name="description" rows="3" required
                                  class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        @error('description')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Input de Arquivo -->
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700">Currículo</label>
                        <input type="file" name="file" class="block w-full text-sm text-gray-500
                            file:me-4 file:py-2 file:px-4
                            file:rounded-lg file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-600 file:text-white
                            hover:file:bg-blue-700
                            file:disabled:opacity-50 file:disabled:pointer-events-none
                          ">
                        @error('file')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Select Option -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Vaga<span class="text-red-500">*</span></label>
                        <select id="category" name="category" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Selecione a vaga</option>
                            @foreach($jobs as $job)
                                <option value="{{$job->title}}">{{$job->title}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Botão de Envio -->
                    <div class="flex justify-end gap-3">
                        <div id="spinner" class="hidden animate-spin inline-block size-8 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>


        {{--        begin of Modal--}}
        <div id="hs-scroll-inside-viewport-modal"
             class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto hs-overlay-backdrop-open:bg-bioclin/90">
            <div
                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 class="font-bold text-gray-800" id="modal-title" x-text="title">
                        </h3>
                        <button type="button"
                                class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-scroll-inside-viewport-modal">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4 overflow-y-auto">
                        <div class="space-y-4">
                            <div x-html="descriptionHtml">
                                {{--                                <p class="mt-1 text-gray-800" id="modal-description" x-html="descriptionHtml">--}}
                                {{--                                </p>--}}
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-scroll-inside-viewport-modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('jobForm').addEventListener('submit', function () {
                document.getElementById('spinner').classList.remove('hidden');
            });
        </script>
        <script>
            function dataLoader() {
                return {
                    title: 'Título padrão', // Título padrão antes do carregamento dos dados
                    descriptionHtml: 'Descrição padrão', // Descrição padrão antes do carregamento dos dados
                    fetchData(id) {
                        fetch(`/job/${id}`)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.error) {
                                    console.error('Erro:', data.error);
                                } else {
                                    this.title = data.title;
                                    let converter = new showdown.Converter();
                                    this.descriptionHtml = converter.makeHtml(data.description);
                                }
                            })
                            .catch(error => console.error('Erro:', error));
                    }
                }
            }
        </script>

    </div>

@endsection
