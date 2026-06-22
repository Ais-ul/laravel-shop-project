<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">Finalizeaza comanda</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto grid max-w-6xl gap-6 px-4 sm:px-6 lg:grid-cols-3 lg:px-8">
            <div class="lg:col-span-2">
                <div class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Date livrare</h3>
                    <p class="mt-1 text-sm text-gray-500">Completeaza adresa si numarul de telefon.</p>

                    <form class="mt-6 space-y-5" action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Adresa</label>
                            <textarea
    name="address"
    required
    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
></textarea>

@error('address')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Telefon</label>
                            <input
    type="text"
    name="phone"
    required
    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button type="submit" class="rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-500">
                                Plaseaza comanda
                            </button>

                            <a href="{{ route('cart.index') }}" class="rounded-md border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                                Inapoi la cos
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <div class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Sumar comanda</h3>

                    @php
                        $total = 0;
                    @endphp

                    <div class="mt-5 space-y-4">
                        @foreach($cart->items as $item)
                            @php
                                $itemTotal = $item->product->price * $item->quantity;
                                $total += $itemTotal;
                            @endphp

                            <div class="flex justify-between gap-4 border-b border-gray-100 pb-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $item->product->name }}</p>
                                    <p class="text-sm text-gray-500">Cantitate: {{ $item->quantity }}</p>
                                </div>
                                <p class="text-sm font-semibold text-gray-900">{{ $itemTotal }} lei</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-5 flex justify-between text-lg font-semibold text-gray-900">
                        <span>Total</span>
                        <span>{{ $total }} lei</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
