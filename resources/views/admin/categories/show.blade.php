<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Admin - Detalii categorie</h2>
                <p class="mt-1 text-sm text-gray-500">Informatii despre categoria selectata.</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Edit</a>
                <a href="{{ route('admin.categories.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Inapoi</a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-white p-8 shadow-sm ring-1 ring-gray-200">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">ID</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $category->id }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nume</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $category->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Slug</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $category->slug }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
