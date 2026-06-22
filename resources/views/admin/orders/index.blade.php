<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Admin - Comenzi</h2>
                <p class="mt-1 text-sm text-gray-500">Gestioneaza comenzile din magazin.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.products.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Produse</a>
                <a href="{{ route('admin.categories.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Categorii</a>
                <a href="{{ route('products.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Magazin</a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-200">
                @if($orders->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">User</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Telefon</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Data</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500">Actiuni</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $order->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $order->user->name ?? 'User sters' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $order->total_price }} lei</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $order->status }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $order->phone }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $order->created_at }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">Vezi</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-6 text-sm text-gray-500">Nu exista comenzi.</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
