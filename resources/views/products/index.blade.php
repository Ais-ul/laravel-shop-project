<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Produse</h2>
                <p class="mt-1 text-sm text-gray-500">Alege produsele si adauga-le in cos.</p>
            </div>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                        Admin produse
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if($products->count() > 0)
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($products as $product)
                        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                            <div class="aspect-[4/3] bg-gray-100">
                                @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full items-center justify-center text-sm font-medium text-gray-400">
                                        Fara imagine
                                    </div>
                                @endif
                            </div>

                            <div class="p-5">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $product->category->name ?? 'Fara categorie' }}</p>
                                    </div>
                                    <p class="shrink-0 rounded-md bg-emerald-50 px-2 py-1 text-sm font-semibold text-emerald-700">
                                        {{ $product->price }} lei
                                    </p>
                                </div>

                                <p class="mt-3 text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($product->description, 90) }}</p>
                                <p class="mt-3 text-sm text-gray-500">Stoc: <span class="font-semibold {{ $product->stock > 0 ? 'text-gray-800' : 'text-red-600' }}">{{ $product->stock > 0 ? $product->stock : 'Epuizat' }}</span></p>

                                <div class="mt-5 flex flex-wrap items-center gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="inline-flex items-center justify-center rounded-md border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                                        Vezi
                                    </a>

                                    @auth
                                        @if($product->stock > 0)
                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                                                    Adauga in cos
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" disabled class="inline-flex cursor-not-allowed items-center justify-center rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-gray-500">
                                                Stoc epuizat
                                            </button>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                                            Login pentru cos
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-lg border border-dashed border-gray-300 bg-white p-10 text-center">
                    <p class="text-gray-600">Nu exista produse momentan.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
