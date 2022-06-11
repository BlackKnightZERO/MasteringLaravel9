<x-app-layout>
    @section('title')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Letter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />

                    <form method="POST" action="{{ route('news.letter.subscribe') }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-4 my-4">
                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" 
                                    class="block mt-1 w-full" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')"
                                    required />
                            </div>
                            <div class="h-0.5"></div>
                        </div>
                            <x-button>
                                {{ __('Subscribe') }}
                            </x-button>
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Cancel') }}
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>