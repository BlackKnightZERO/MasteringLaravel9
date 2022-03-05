<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Billing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Available Plans
                    <br>
                    <div class="grid gap-4 grid-cols-3 mt-4">
                        @forelse($billings as $billing)
                            <div class="p-4 border rounded border-slate-300 text-center">
                                <h1 class="text-lg"> {{ round($billing->price/100, 2) }} / month</h1>
                                <h1 class="text-xl">{{ $billing->name }}</h1>
                                <a href="{{ route('billing.checkout', $billing->id) }}">
                                    <x-button type="button" class="mt-2">
                                        Subscribe
                                    </x-button>
                                </a>
                            </div>
                        @empty
                        <div class="p-4 border rounded border-slate-300 text-center">
                            <h1 class="text-lg"> -- </h1>
                            <h1 class="text-xl">No Plans Available</h1>
                        </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
