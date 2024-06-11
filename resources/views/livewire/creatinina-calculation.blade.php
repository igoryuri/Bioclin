<div class="w-full max-w-7xl mx-auto px-2 md:col-span-2">

    <div class="px-6 py-8 h-full mt-6 bg-white shadow-2xl rounded-lg flex flex-col justify-between">
        @if(!$resultado_dif_zero)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Erro!</strong>
                <span class="block sm:inline">{{__('calculation.alert')}}</span>
            </div>
        @endif
        <h1 class="text-2xl md:text-4xl my-6 font-semibold">{{__('calculation.titulo.creatinina')}}</h1>
        <div class="flex flex-row w-full">
            <div class="w-full">
                <form action="" wire:submit="calcule_creatina">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="creatina_urina" class="block text-base font-medium leading-6 text-gray-900 mt-4">
                                {{__('calculation.creatinina_urina')}} (mg/dL)
                            </label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" wire:model="creatina_urina" name="creatina_urina" id="creatina_urina"
                                       autocomplete="off"
                                       class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                            @error('creatina_urina')
                            <span class="text-sm text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="creatina_soro" class="block text-base font-medium leading-6 text-gray-900 mt-4">
                                {{__('calculation.creatinina_soro')}} (mg/dL)
                            </label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" wire:model="creatina_soro" name="creatina_soro" id="creatina_soro"
                                       autocomplete="off"
                                       class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                            @error('creatina_soro')
                            <span class="text-sm text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="volume_urinario" class="block text-base font-medium leading-6 text-gray-900 mt-4">
                                {{__('calculation.colume_urinario')}} (mL)
                            </label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" wire:model="volume_urinario" name="volume_urinario" id="volume_urinario"
                                       autocomplete="off"
                                       class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                            @error('volume_urinario')
                            <span class="text-sm text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="tempo_colheita" class="block text-base font-medium leading-6 text-gray-900 mt-4">
                                {{__('calculation.tempo_colheita')}} ({{__('calculation.horas')}})
                            </label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" wire:model="tempo_colheita" name="tempo_colheita" id="tempo_colheita"
                                       autocomplete="off"
                                       class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                            @error('tempo_colheita')
                            <span class="text-sm text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="peso_paciente" class="block text-base font-medium leading-6 text-gray-900 mt-4">
                                {{__('calculation.peso_paciente')}} (Kg)
                            </label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" wire:model="peso_paciente" name="peso_paciente" id="peso_paciente"
                                       autocomplete="off"
                                       class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                            @error('peso_paciente')
                            <span class="text-sm text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="altura_paciente" class="block text-base font-medium leading-6 text-gray-900 mt-4">
                                {{__('calculation.altura_paciente')}} (cm)
                            </label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" wire:model="altura_paciente" name="altura_paciente" id="altura_paciente"
                                       autocomplete="off"
                                       class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                            @error('altura_paciente')
                            <span class="text-sm text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-10 mt-6 items-center">
                        <button class="p-4 bg-blue-700 font-semibold text-white rounded-lg">{{__('calculation.calcular')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full flex flex-col gap-10 mt-5 justify-center items-center border p-4 rounded-lg">
            <h1 class="text-3xl font-semibold">{{__('calculation.resultado_calculos')}}</h1>
            <div class="w-full flex flex-col md:flex-row justify-around gap-4 border rounded-lg p-2 md:p-6">
                <div class="flex flex-col gap-8">
                    <div>
                        <h1 class="text-2xl font-bold">{{__('calculation.deuparacao_creatinina')}}</h1>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h2 class="font-medium text-base">{{__('calculation.volume')}}/{{__('calculation.minuto')}}: <span class="text-green-700 text-lg font-semibold">{{$vol_min}} <small class="text-sm">@if(isset($vol_min)) mL @endif</small></span></h2>
                        <h2 class="font-medium text-base">{{__('calculation.superficie_corporal')}}: <span class="text-green-700 text-lg font-semibold">{{$sup_corp}}<small class="text-sm">@if(isset($sup_corp)) m² @endif</small></span></h2>
                        <h2 class="font-medium text-base">{{__('calculation.deupracao_nao_corrigida')}}: <span class="text-green-700 text-lg font-semibold">{{$dep_n_corr}}<small class="text-sm">@if(isset($dep_n_corr)) mL/{{__('calculation.minutos')}} @endif</small></span></h2>
                        <h2 class="font-medium text-base">{{__('calculation.depuracao_corrigida')}}: <span class="text-green-700 text-lg font-semibold">{{$dep_corr}}<small class="text-sm">@if(isset($dep_corr))  mL/{{__('calculation.minutos')}}/1,73 m² @endif</small></span></h2>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <div>
                        <h1 class="text-2xl font-bold">{{__('calculation.excrecao_creatinina')}}</h1>
                        <span class="text-red-700 text-sm">{{__('calculation.calculo_24')}}</span>
                    </div>
                    <div class="flex flex-col gap-4 mt-6 md:mt-0">
                        <h2 class="font-medium text-base">mg/24 {{__('calculation.horas')}}: <span class="text-green-700 text-lg font-semibold">{{$mg_24}}</span></h2>
                        <h2 class="font-medium text-base">mg/Kg {{__('calculation.peso')}}/24 {{__('calculation.horas')}}: <span class="text-green-700 text-lg font-semibold">{{$mg_kg_24}}</span></h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <p class="text-justify">
                    {{__('calculation.desc_creatinina')}}
                </p>
                <p class="text-center">
                    {{__('calculation.sac_creatinina')}} - 0800 031 5454
                </p>
            </div>
        </div>
    </div>
</div>
