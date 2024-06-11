
<div class="w-full h-full text-white font-semibold border rounded" data-accordion="open" data-active-classes="text-white font-semibold border" data-inactive-classes="text-white font-semibold border">
    @foreach($frontCategories as $parentCategory)
        <h2 id="accordion-collapse-heading-1-{{$parentCategory->slug}}">
            <button id="{{$parentCategory->slug}}" class="flex items-center justify-between px-2 py-6 w-full text-left bg-bioclin text-white font-semibold border"
                    data-accordion-target="#accordion-collapse-body-1-{{$parentCategory->slug}}" aria-expanded="false"
                    aria-controls="accordion-collapse-body-1-{{$parentCategory->slug}}">
            <span>
                <a href="{{ route('category', [$parentCategory->slug]) }}"
                    class="capitalize text-white font-semibold hover:border-b">{{$parentCategory->name}}</a>
            </span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1-{{$parentCategory->slug}}" class="hidden"
             aria-labelledby="accordion-collapse-heading-1-{{$parentCategory->slug}}">
            <div>
                <div data-accordion="collapse" class="w-full bg-blue-900 text-white font-semibold border" data-active-classes="bg-blue-900 text-white font-semibold border" data-inactive-classes="bg-blue-900 text-white font-semibold border">
                    @foreach($parentCategory->childCategories as $category)
                        <h2 id="accordion-collapse-heading-{{$parentCategory->slug}}-{{$category->slug}}">
                            <button id="{{$category->slug}}" class="flex items-center justify-between pl-4 pr-2 py-6 w-full border-2 text-left"
                                    data-accordion-target="#accordion-collapse-body-{{$parentCategory->slug}}-{{$category->slug}}"
                                    aria-expanded="false"
                                    aria-controls="accordion-collapse-body-{{$parentCategory->slug}}-{{$category->slug}}">
                            <span>
                               <a href="{{ route('category', [$parentCategory, $category->slug]) }}"
                                   class="capitalize font-semibold hover:border-b">{{$category->name}}</a>
                            </span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-{{$parentCategory->slug}}-{{$category->slug}}" class="hidden"
                             aria-labelledby="accordion-collapse-heading-{{$parentCategory->slug}}-{{$category->slug}}">
                            <div>
                                <div data-accordion="collapse" class="w-full bg-blue-700 text-white font-semibold border" data-active-classes="bg-blue-700 text-white font-semibold border" data-inactive-classes="bg-blue-700 text-white font-semibold border">
                                    @foreach($category->childCategories as $childCategory)
                                        <h2 id="accordion-collapse-heading-{{$parentCategory->slug}}-{{$category->slug}}-{{$childCategory->slug}}">
                                            <button id="{{$childCategory->slug}}" class="flex items-center justify-between pl-6 pr-2 py-6 w-full border-2 text-left"
                                                    data-accordion-target="#accordion-collapse-body-{{$parentCategory->slug}}-{{$category->slug}}-{{$childCategory->slug}}"
                                                    aria-expanded="false"
                                                    aria-controls="accordion-collapse-body-{{$parentCategory->slug}}-{{$category->slug}}-{{$childCategory->slug}}">
                                                <span>
                                                    <a href="{{ route('category', [$parentCategory, $category, $childCategory->slug]) }}"
                                                        class="capitalize font-semibold hover:border-b">{{$childCategory->name}}</a>
                                                </span>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                            </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-collapse-body-{{$parentCategory->slug}}-{{$category->slug}}-{{$childCategory->slug}}" class="hidden"
                                             aria-labelledby="accordion-collapse-heading-{{$parentCategory->slug}}-{{$category->slug}}-{{$childCategory->slug}}">
                                            <div>
                                                <div data-accordion="collapse" class="w-full bg-blue-500 text-white font-semibold border" data-active-classes="bg-blue-500 text-white font-semibold border" data-inactive-classes="bg-blue-500 text-white font-semibold border">
                                                    @foreach($childCategory->childCategories as $childCategory1)
                                                        <h2>
                                                            <button class="pl-8 pr-2 py-6 w-full border border-white text-left">
                                                                    <span>
                                                                        <a href="{{ route('category', [$parentCategory, $category, $childCategory, $childCategory1->slug]) }}"
                                                                            class="capitalize font-semibold hover:border-b">{{$childCategory1->name}}</a>
                                                                    </span>
                                                            </button>
                                                        </h2>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
