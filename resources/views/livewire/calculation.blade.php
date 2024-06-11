<div class="w-full max-w-7xl mx-auto px-2">
    <div class="px-6 py-8 h-full mt-6 bg-white shadow-2xl rounded-lg flex flex-col justify-between">
        <h1 class="text-2xl md:text-4xl my-6 font-semibold">{{__('calculation.titulo_rni')}}</h1>
        <div class="w-full">
            <div class="w-full">
                <form wire:submit="calculeRNI" action="">
                    <label for="amostra" class="block text-base font-medium leading-6 text-gray-900 mt-4">{{__('calculation.amostras')}}</label>

                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" wire:model="amostra" name="amostra" id="amostra" autocomplete="off"
                                   class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    @error('amostra')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <label for="plasma" class="block text-base font-medium leading-6 text-gray-900 mt-4">{{__('calculation.pool')}}</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" wire:model="plasma" name="plasma" id="plasma" autocomplete="off"
                                   class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    @error('plasma')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <label for="isi" class="block text-base font-medium leading-6 text-gray-900 mt-4">{{__('calculation.isi')}}</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" wire:model="isi" name="isi" id="isi" autocomplete="off"
                                   class="h-14 block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    @error('isi')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex gap-10 mt-5 items-center">
                        <button class="p-4 bg-blue-700 font-semibold text-white rounded-lg">{{__('calculation.calcular')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex gap-10 mt-5 items-center border p-4 rounded-lg">
            <h1 class="text-2xl font-semibold">{{__('calculation.rni')}}: <span id="rni" class="text-green-700"> {{$rni}} </span></h1>
        </div>
    </div>
</div>
