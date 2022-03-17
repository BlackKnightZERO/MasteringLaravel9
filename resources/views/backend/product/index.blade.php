<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pivot Tables') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />

                    <div class="mb-4 float-right">
                        <a href="{{ route('product.create') }}" class="px-4 py-2 rounded text-white bg-blue-500 hover:bg-blue-600 "> + Create</a>
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
                                            Product Name
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Category
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Price
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Tags
                                        </th>
                                        <th scope="col" class="p-4">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">  
                                    
                                    @forelse ($products as $product)
                                    
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ (( $products->currentPage() - 1 ) * $products->perPage() ) + $loop->iteration }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->title }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $product->category->title }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ round($product->price, 2) /100 }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @forelse ($product->tags as $tag)
                                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                            {{ $tag->title }}</span>
                                            @empty
                                                
                                            @endforelse
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="{{ route('product.edit', $product) }}" 
                                            class="font-extrabold text-blue-600 dark:text-blue-500 hover:underline">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('product.destroy', $product) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('product.destroy', $product) }}" 
                                                class="font-extrabold text-red-600 dark:text-red-500 hover:underline"
                                                onclick="if(confirm('Are you sure?')){
                                                    event.preventDefault();
                                                    this.closest('form').submit();}">
                                                    Delete
                                                </a>
                                            </form>
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
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
