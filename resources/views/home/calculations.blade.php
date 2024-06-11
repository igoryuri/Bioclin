@extends('templates.layout')
@section('title', 'Bioclin '.ucfirst(__('welcome.calculo')) )
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 w-full max-w-7xl mx-auto gap-2 mb-12">
        <livewire:calculation></livewire:calculation>
        <livewire:glicemia_calculation></livewire:glicemia_calculation>
        <livewire:creatinina_calculation></livewire:creatinina_calculation>
    </div>

@endsection
