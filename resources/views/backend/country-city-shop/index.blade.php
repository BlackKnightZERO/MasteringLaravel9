<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Has Many Through & Count') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />

                    <div class="mb-4">
                        <h3>withCount(' shops ')</h3>
                    </div>

                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            <div class="flex items-center">
                                                #
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Country
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Shops
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">  
                                    
                                    
                                    @forelse ($countries as $country)
                                    
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $country->id }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $country->name }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                            {{-- {{ $country->shops->count() }} --}}
                                            {{ $country->shops_count }}
                                        </td>
                                    </tr>

                                    @empty
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td colspan="5" class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">No Record</td>
                                    </tr>
                                    
                                    @endforelse
                                    
                                </tbody>
                            </table>
                            <div class="mt-4">
                                
                                {{ $countries->links() }}
                                
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3>with(' city.country ')</h3>
                    </div>

                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            <div class="flex items-center">
                                                #
                                            </div>
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Shop
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Country
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">  
                                    
                                    
                                    @forelse ($shops as $shop)
                                    
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $shop->name }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                            {{-- {{ $country->shops->count() }} --}}
                                            {{ $shop->city->country->name }}
                                        </td>
                                    </tr>

                                    @empty
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td colspan="5" class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">No Record</td>
                                    </tr>
                                    
                                    @endforelse
                                    
                                </tbody>
                            </table>
                            <div class="mt-4">
                                
                                {{ $shops->links() }}
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
