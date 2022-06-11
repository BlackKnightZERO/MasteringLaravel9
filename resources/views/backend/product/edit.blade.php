<x-app-layout>
    @section('title')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />

                    <form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-4 my-4">
                            <div class="flex">
                                <div class="flex-auto mx-2">
                                    <x-label for="title" :value="__('Title')" />
                                    <x-input id="title" 
                                        class="block mt-1 w-full" 
                                        type="text" 
                                        name="title" 
                                        :value="old('title') ?? $product->title"
                                        required />
                                </div>
                                <div class="flex-auto mx-2">
                                    <x-label for="slug" :value="__('Slug')" />
                                    <x-input id="slug" 
                                        class="block mt-1 w-full" 
                                        type="text" 
                                        name="slug" 
                                        :value="old('slug') ?? $product->slug"
                                        readonly
                                        required />
                                </div>
                            </div>
                            <div class="mb-4">
                                <img src="{{ asset('/storage').'/'.$storagePath }}" 
                                class="h-auto rounded-lg w-full md:w-4/12" alt="" id="output">
                                <br>
                                {{-- 4 images here --}}
                                {{-- pdf file here --}}
                                
                                <input type="file" 
                                class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                                name="file"
                                value="Upload"
                                onchange="loadFile(event)"
                                >
                            </div>
                            <div>
                                <x-label for="sub_title" :value="__('Subtitle')" />
                                <x-input id="sub_title" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    name="sub_title" 
                                    :value="old('sub_title') ?? $product->sub_title"/>
                            </div>
                            <div>
                                <x-label for="description" :value="__('description')" />
                                <textarea id="description" 
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    rows="3"
                                    placeholder="Your message" 
                                    name="description">{{ old('description') ?? $product->description }}</textarea>
                            </div>
                            <div>
                                <x-label for="sku" :value="__('SKU')" />
                                <x-input id="sku" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    name="sku" 
                                    :value="old('sku') ?? $product->sku"
                                    required placeholder="SKU-XXXX"  />
                            </div>
                            <div>
                                <x-label for="price" :value="__('Price')" />
                                <x-input id="price" 
                                    class="block mt-1 w-full" 
                                    type="number" 
                                    name="price" 
                                    :value="old('price') ?? $product->price"
                                    placeholder="price in cents"
                                    required step="1" />
                            </div>

                            <div>
                                <x-label for="category_id" :value="__('Category')" />
                                <select class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                    aria-label="Default select example"
                                    name="category_id"
                                    required>
                                        <option value="" selected>Select</option>
                                        @forelse ($categories as $category)
                                        <option @selected(
                                            old('category_id') ?? ($productCategory->id == $category->id)
                                            ) 
                                            value="{{ $category->id }}">
                                            {{ $category->title }}
                                        </option>
                                        @empty
                                            
                                        @endforelse
                                </select>
                            </div>
                            <div>
                                <x-label for="tag_id" :value="__('Tags')" />
                                <select
                                    id="select-tag"
                                    name="tag_id[]"
                                    multiple
                                    placeholder="Select Tags..."
                                    autocomplete="off"
                                    class="block w-full rounded-sm cursor-pointer focus:outline-none"
                                    multiple
                                    >
                                    @forelse ($tags as $tag)
                                        <option value="{{ $tag->id }}" 
                                            @selected(old('tag_id[]') ?? in_array($tag->id, $productTags))>
                                            {{ $tag->title }}
                                        </option>
                                    @empty
                                        
                                    @endforelse
                                    </select>
                            </div>
                        </div>

                        <div class="h-16"></div>

                        <x-button>
                            {{ __('Submit') }}
                        </x-button>
                        <a href="{{ route('product.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Cancel') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>

        new TomSelect('#select-tag', {
          maxItems: 5,
        });

        titleElm = document.querySelector('#title');
        slugElm = document.querySelector('#slug');
        titleElm.addEventListener('keyup',()=>{
            slugElm.value = slug(titleElm.value)
        })

        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };

        var slug = function(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
            var to   = "aaaaaeeeeeiiiiooooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                    .replace(/\s+/g, '-') // collapse whitespace and replace by -
                    .replace(/-+/g, '-'); // collapse dashes

            return str +'-'+ Math.floor( Math.random() * 1000 );
        };


    </script>
</x-app-layout>