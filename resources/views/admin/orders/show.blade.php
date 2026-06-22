<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Admin - Comanda #{{ $order->id }}</h2>
                <p class="mt-1 text-sm text-gray-500">Detalii si actualizare status.</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Inapoi la comenzi</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3">
                <section class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-200 lg:col-span-1">
                    <h3 class="text-lg font-semibold text-gray-900">Informatii client</h3>
                    <dl class="mt-4 space-y-3 text-sm text-gray-600">
                        <div>
                            <dt class="font-medium text-gray-500">User</dt>
                            <dd class="mt-1 text-gray-900">{{ $order->user->name ?? 'User sters' }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-gray-900">{{ $order->user->email ?? '-' }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Telefon</dt>
                            <dd class="mt-1 text-gray-900">{{ $order->phone }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Adresa</dt>
                            <dd class="mt-1 text-gray-900">{{ $order->address }}</dd>
                        </div>
                    </dl>
                </section>

                <section class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-200 lg:col-span-2">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total comandă</p>
                            <p class="mt-1 text-3xl font-semibold text-gray-900">{{ $order->total_price }} lei</p>
                        </div>
                        <div class="rounded-md bg-gray-50 px-4 py-3 text-sm text-gray-700">
                            <span class="font-medium">Status curent:</span> {{ $order->status }}
                        </div>
                    </div>

                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-end">
                        @csrf
                        @method('PATCH')
                        <div class="w-full sm:max-w-xs">
                            <label for="status" class="block text-sm font-medium text-gray-700">Schimba status</label>
                            <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="pending" @selected($order->status === 'pending')>pending</option>
                                <option value="paid" @selected($order->status === 'paid')>paid</option>
                                <option value="shipped" @selected($order->status === 'shipped')>shipped</option>
                                <option value="cancelled" @selected($order->status === 'cancelled')>cancelled</option>
                                <option value="done" @selected($order->status === 'done')>done</option>
                            </select>
                        </div>
                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Actualizeaza status</button>
                    </form>
                </section>
            </div>

            <section class="mt-6 overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-200">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-900">Produse comandate</h3>
                </div>
                <div class="overflow-x-auto">
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
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item->product->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->price }} lei</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->quantity }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item->price * $item->quantity }} lei</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
