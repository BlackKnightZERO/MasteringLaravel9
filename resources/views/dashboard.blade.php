<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="text-center pt-2 grid grid-cols-2 gap-4 lg:grid-cols-6 gap-4">
                        
                        <a href="{{ route('profile.index') }}">
                            <div class="border-solid border-2 border-indigo-500 rounded p-4 shadow-lg shadow-indigo-400/50">
                                <p class="font-bold text-indigo-800">FormRequest</p>
                                <hr>
                                <small class="font-semibold text-indigo-800">Profile Update</small>
                            </div>
                        </a>
                        <a href="{{ route('category-rmb.index') }}">
                            <div class="border-solid border-2 border-indigo-500 rounded p-4 shadow-lg shadow-indigo-400/50">
                                <p class="font-bold text-indigo-800">RouteModelBinding</p>
                                <hr>
                                <small class="font-semibold text-indigo-800">RouteModelBinding</small>
                            </div>
                        </a>
                        
                    </div>

                    <br><hr><br>

                    <div class="text-center pt-2 grid grid-cols-2 gap-4 lg:grid-cols-6 gap-4">
                        
                        <a href="{{ route('product.index') }}">
                            <div class="h-28 border-solid border-2 border-red-500 rounded p-4 shadow-lg shadow-red-400/50">
                                <p class="font-bold text-red-800">BelongsToMany-Pivot</p>
                                <hr>
                                <small class="font-semibold text-red-800">Product Category Tags</small>
                            </div>
                        </a>
                        <a href="{{ route('newsfeed') }}">
                            <div class="h-28 border-solid border-2 border-red-500 rounded p-4 shadow-lg shadow-red-400/50">
                                <p class="font-bold text-red-800">HasMany</p>
                                <hr>
                                <small class="font-semibold text-red-800">Newsfeed Posts Comments</small>
                            </div>
                        </a>
                        <a href="{{ route('country-city-shop.index') }}">
                            <div class="h-28 border-solid border-2 border-red-500 rounded p-4 shadow-lg shadow-red-400/50">
                                <p class="font-bold text-red-800">HasManyThrough Count</p>
                                <hr>
                                <small class="font-semibold text-red-800">Country City Shop</small>
                            </div>
                        </a>

                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
