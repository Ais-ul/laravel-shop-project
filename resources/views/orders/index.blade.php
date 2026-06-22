<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">Comenzile mele</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            @if($orders->count() > 0)
                <div class="space-y-4">
                    @foreach($orders as $order)
                        <div class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-200">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Comanda #{{ $order->id }}</h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $order->created_at }}</p>
                                </div>
                                <span class="inline-flex w-fit rounded-md bg-amber-50 px-3 py-1 text-sm font-semibold text-amber-700">
                                    {{ $order->status }}
                                </span>
                            </div>

                            <div class="mt-5 grid gap-4 sm:grid-cols-3">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Total</p>
                                    <p class="mt-1 font-semibold text-gray-900">{{ $order->total_price }} lei</p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Telefon</p>
                                    <p class="mt-1 text-gray-900">{{ $order->phone }}</p>
                                </div>
                                <div class="sm:text-right">
                                    <a href="{{ route('orders.show', $order->id) }}" class="inline-flex rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                                        Vezi detalii
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-lg border border-dashed border-gray-300 bg-white p-10 text-center">
                    <h3 class="text-lg font-semibold text-gray-900">Nu ai nicio comanda</h3>
                    <p class="mt-2 text-sm text-gray-500">Dupa ce finalizezi o comanda, o vei vedea aici.</p>
                    <a href="{{ route('products.index') }}" class="mt-5 inline-flex rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                        Vezi produsele
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
