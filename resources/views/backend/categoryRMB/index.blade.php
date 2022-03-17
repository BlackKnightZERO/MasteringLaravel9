<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Route Model Bindings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-success-alert class="mb-2" />
                    <x-error-alert class="mb-2" :errors="$errors" />

                    <div class="mb-4 float-right">
                        <a href="{{ route('category-rmb.create') }}" class="px-4 py-2 rounded text-white bg-blue-500 hover:bg-blue-600 "> + Create</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                          <tr>
                            <th class="border p-2 bg-gray-300">#</th>
                            <th class="border p-2 bg-gray-300">title</th>
                            <th class="border p-2 bg-gray-300">slug</th>
                            <th class="border p-2 bg-gray-300">action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($categoryRmbs as $categoryRmb)
                             <tr class="hover:bg-gray-100">
                                 <td class="border p-2">
                                     {{ $loop->iteration }}
                                 </td>
                                <td class="border p-2">
                                    {{ $categoryRmb->title }}
                                </td>
                                <td class="border p-2">
                                    {{ $categoryRmb->slug }}
                                </td>
                                <td class="border p-2">
                                    <a href="{{ route('category-rmb.edit', $categoryRmb) }}" class="rounded-full px-2 text-white bg-green-600 hover:bg-green-700">Edit</a>
                                    {{-- <a onclick="return confirm('Are you sure?')" href="{{ route('category-rmb.destroy', $categoryRmb) }}" class="rounded-full px-2 text-white bg-red-600 hover:bg-red-700">Delete</a> --}}
                                    <form method="POST" action="{{ route('category-rmb.destroy', $categoryRmb) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('category-rmb.destroy', $categoryRmb) }}" type="submit" class="rounded-full px-2 text-white bg-red-600 hover:bg-red-700"
                                            onclick="if(confirm('Are you sure?')){
                                                    event.preventDefault();
                                                    this.closest('form').submit();}">Delete</a>
                                    </form>
                                </td>
                            @empty
                                <td colspan="4" class="border p-2">
                                    No Record
                                </td>
                            @endforelse
                                </tr>

                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $categoryRmbs->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
