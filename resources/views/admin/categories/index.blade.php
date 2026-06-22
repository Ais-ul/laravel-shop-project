<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Admin - Categorii</h2>
                <p class="mt-1 text-sm text-gray-500">Gestioneaza categoriile magazinului.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.categories.create') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Adauga categorie</a>
                <a href="{{ route('admin.products.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Produse</a>
                <a href="{{ route('admin.orders.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Comenzi</a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Nume</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Slug</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500">Actiuni</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $category->id }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $category->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $category->slug }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a class="text-sm font-semibold text-indigo-600 hover:text-indigo-800" href="{{ route('admin.categories.show', $category->id) }}">Vezi</a>
                                        <a class="text-sm font-semibold text-gray-700 hover:text-gray-900" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-sm font-semibold text-red-600 hover:text-red-800" type="submit">Sterge</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
