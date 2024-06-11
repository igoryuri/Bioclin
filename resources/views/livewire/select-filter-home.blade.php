<div class="h-full w-full gap-6 flex flex-col py-2 justify-evenly">
    <h1 class="text-center font-bold text-xl text-bioclin">{{__('welcome.busca')}}</h1>
    <form wire:submit.prevent="save" class="flex flex-col gap-2">
        <div class="w-full h-fit flex flex-col gap-2 px-3">
            <label>{{__('welcome.escolha')}}</label>
            <select  wire:model.live="selectedParentCategory" class="w-full h-10 rounded-md border p-1 text-bioclin bg-white/40 border-bioclin capitalize">
                <option value="" class="capitalize">{{__('welcome.selecione')}}</option>
                @foreach ($parentCategories as $parentCategory)
                    <option class="capitalize"
                            value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                @endforeach[
            </select>
        </div>

        @if(!is_null($selectedParentCategory))
            <div class="w-full h-fit flex flex-col gap-2 px-3">
                <label{{__('welcome.escolha')}}</label>
                <select wire:model.live="selectedChildCategory" class="w-full h-10 rounded-md border p-1 text-bioclin bg-white/40 border-bioclin capitalize">
                    <option value="" class="capitalize">{{__('welcome.selecione')}}</option>
                    @foreach ($childCategories as $childCategory)
                            <option class="capitalize text-bioclin"
                                    value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif

        @if(!is_null($selectedChildCategory))
        <div class="w-full h-fit flex flex-col gap-2 px-3">
            <select wire:model.live="selectedChildChildCategory"
                    class="w-full h-10 rounded-md border p-1 text-bioclin bg-white/40 border-bioclin capitalize">
                <option value="" class="capitalize">{{__('welcome.selecione')}}</option>
                @foreach ($childChildCategories as $childChildCategory)
                        <option class="capitalize"
                                value="{{$childChildCategory->id}}">{{$childChildCategory->name}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="px-2">
            <button type="submit" class="w-full bg-[#29416d] text-slate-50 p-2 sm:py-3 rounded-xl text-md
                            hover:text-bioclin hover:bg-transparent hover:border hover:border-azul-bioclin duration-200 capitalize">
                {{__('welcome.buscar')}}
            </button>
        </div>
    </form>
</div>
