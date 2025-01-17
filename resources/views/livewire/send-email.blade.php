<div>
    <form class="p-4 md:p-5" wire.submit="send" enctype="multipart/form-data">
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">{{__('welcome.name_contact')}}</label>
                <input type="text" wire.model="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="{{__('welcome.desc_name_contact')}}" >
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">{{__('welcome.email_contact')}}</label>
                <input type="email" wire.model="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="{{__('welcome.desc_email_contact')}}" >
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">{{__('welcome.telephone_contact')}}</label>
                <input type="tel" wire.model="telephone" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="{{__('welcome.desc_tel_contact')}}" >
                @error('telephone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="sector" class="block mb-2 text-sm font-medium text-gray-900">{{__('welcome.sector_contact')}}</label>
                <select id="sector" wire.model="sector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option selected="">{{__('welcome.select_contact')}}</option>
                    <option value="igor.silva">{{__('welcome.sac_contact')}}</option>
                    <option value="igor.silva">{{__('welcome.rh_contact')}}</option>
                    <option value="igor.silva">{{__('welcome.comercial_contact')}}</option>
                    <option value="igor.silva">{{__('welcome.comex_contact')}}</option>
                </select>
                @error('sector') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">{{__('welcome.upload_contact')}}</label>
                <input class="p-10 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" wire.model="attach" aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, DOC, DOCX, ODT, TXT (Max 15Mb).</p>
                @error('attach') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">{{__('welcome.message_contact')}}</label>
                <textarea id="description" rows="4" wire.model="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('welcome.desc_contact')}}"></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            {{__('welcome.send_contact')}}
        </button>
    </form>
</div>
