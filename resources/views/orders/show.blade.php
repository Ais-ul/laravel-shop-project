<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">Comanda #{{ $order->id }}</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-200">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Status</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $order->status }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Total</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $order->total_price }} lei</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Telefon</p>
                        <p class="mt-1 text-gray-900">{{ $order->phone }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Data</p>
                        <p class="mt-1 text-gray-900">{{ $order->created_at }}</p>
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Adresa</p>
                    <p class="mt-1 text-gray-900">{{ $order->address }}</p>
                </div>
            </div>

            <div class="mt-6 overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Produs</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Pret</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Cantitate</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($order->items as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->product->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $item->price }} lei</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $item->price * $item->quantity }} lei</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('orders.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                    Inapoi la comenzi
                </a>
                <a href="{{ route('products.index') }}" class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                    Produse
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
