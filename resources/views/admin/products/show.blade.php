<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">Admin - {{ $product->name }}</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-200">
                <div class="grid md:grid-cols-2">
                    <div class="aspect-square bg-gray-100">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center text-gray-400">Fara imagine</div>
                        @endif
                    </div>
                    <div class="p-8">
                        <p class="text-sm font-medium text-indigo-600">{{ $product->category->name ?? 'Fara categorie' }}</p>
                        <h1 class="mt-2 text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                        <p class="mt-2 text-sm text-gray-500">{{ $product->slug }}</p>
                        <p class="mt-5 text-2xl font-semibold text-emerald-700">{{ $product->price }} lei</p>
                        <p class="mt-2 text-sm text-gray-600">Stoc: {{ $product->stock }}</p>
                        <p class="mt-6 border-t border-gray-200 pt-6 text-gray-700">{{ $product->description }}</p>

                        <div class="mt-8 flex flex-wrap gap-3">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="rounded-md bg-indigo-600 px-5 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Edit</a>
                            <a href="{{ route('admin.products.index') }}" class="rounded-md border border-gray-300 px-5 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Inapoi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
