<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Cosul meu</h2>
                <p class="mt-1 text-sm text-gray-500">Verifica produsele inainte de finalizarea comenzii.</p>
            </div>
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                Continua cumparaturile
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            @if($cart->items->count() > 0)
                @php
                    $total = 0;
                @endphp

                @if ($errors->has('quantity'))
                    <div class="mb-4 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif

                <div class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Produs</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Pret</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Cantitate</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Actiuni</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($cart->items as $item)
                                @php
                                    $itemTotal = $item->product->price * $item->quantity;
                                    $total += $itemTotal;
                                @endphp

                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->product->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->product->price }} lei</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')

                                            <input class="w-24 rounded-md border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}">
                                            <button class="rounded-md border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50" type="submit">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $itemTotal }} lei</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-sm font-semibold text-red-600 hover:text-red-800" type="submit">
                                                Sterge
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex flex-col gap-4 border-t border-gray-200 bg-gray-50 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
                        <p class="text-lg font-semibold text-gray-900">Total cos: {{ $total }} lei</p>

                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('orders.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                                Finalizeaza comanda
                            </a>

                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="rounded-md border border-red-200 px-4 py-2 text-sm font-semibold text-red-700 hover:bg-red-50">
                                    Goleste cosul
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="rounded-lg border border-dashed border-gray-300 bg-white p-10 text-center">
                    <h3 class="text-lg font-semibold text-gray-900">Cosul este gol</h3>
                    <p class="mt-2 text-sm text-gray-500">Adauga produse ca sa poti plasa o comanda.</p>
                    <a href="{{ route('products.index') }}" class="mt-5 inline-flex rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                        Vezi produsele
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
