<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Profile Information

                    <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />

                    <form method="POST" action="{{ route('profile.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-4 my-4">
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" 
                                    class="block mt-1 w-full" 
                                    type="text" 
                                    name="name" 
                                    :value="old('name') ?? auth()->user()->name"
                                    required />
                            </div>
                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" 
                                    class="block mt-1 w-full" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email') ?? auth()->user()->email" 
                                    required />
                            </div>
                            <div>
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password" />
                            </div>
                            <div>
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" />
                            </div>
                            
                        </div>
                        <x-button>
                            {{ __('Register') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
