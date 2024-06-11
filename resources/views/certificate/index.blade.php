@extends('templates.layout')

@section('title', 'Bioclin '.ucfirst($page_certificates[0]->name))
@section('content')
    <main class="w-full 2xl:max-w-11xl mx-auto min-h-screen pb-8">
        <h1 class="text-4xl md:text-7xl font-medium text-center p-6 text-gray-500">{{$page_certificates[0]->name}}</h1>
        <div class="max-w-4xl mx-auto leading-8 justify-end p-4">
            {!! $page_certificates[0]->description !!}
        </div>

        <div class="flex flex-wrap justify-center gap-4 p-2 md:p-0">
            @foreach($certificates as $certificate)

                <div class="flex flex-col justify-between text-center items-center gap-2 w-96 h-96 border">
                    <div class="p-2">
                        <img src="{{@asset("storage/".$certificate->logo)}}" alt=""
                             class="h-48 w-48 rounded-full border border-2">
                    </div>
                    <div class="w-full flex flex-col justify-between">
                        <div>
                            <h1 class="text-2xl font-semibold py-3 px-2">
                                {{$certificate->title}}
                            </h1>
                        </div>
                        <div class="w-full text-base py-3 px-2">
                            {{--                            {!! $certificate->description !!}--}}
                        </div>
                        <div class="w-full">
                            <a href="{{ @asset("storage/".$certificate->document) }}" alt="{{$certificate->title}}"
                               target="_blank">
                                <div class="w-full px-2 py-4 bg-bioclin text-white font-semibold">
                                    {{__('welcome.certificado')}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
            <div class="h-screen">

            </div>
        </div>

    </main>
@endsection
