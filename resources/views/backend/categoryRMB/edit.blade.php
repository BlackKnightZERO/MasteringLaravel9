<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category RMB') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />

                    <form method="POST" action="{{ route('category-rmb.update', $categoryRmb) }}">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-4 my-4">
                            <div>
                                <x-label for="title" :value="__('Title')" />
                                <x-input id="title" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    name="title" 
                                    :value="old('title') ?? $categoryRmb->title"
                                    required />
                            </div>
                            
                        </div>
                        <x-button>
                            {{ __('Submit') }}
                        </x-button>
                        <a href="{{ route('category-rmb.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Cancel') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
