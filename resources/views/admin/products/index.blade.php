<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition-colors">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($products as $product)
                <div class="item-card flex flex-row justify-between items-center p-4 border border-gray-200 rounded-lg">
                    <div class="flex flex-row items-center gap-x-3">
                        @php
                        // Get the display image with proper priority
                        $displayImagePath = null;

                        // Priority 1: Primary image from product_images
                        if ($product->images && $product->images->count() > 0) {
                        $primaryImage = $product->images->where('is_primary', true)->first();
                        if ($primaryImage) {
                        $displayImagePath = $primaryImage->image_path;
                        } else {
                        // If no primary image, use first product image
                        $displayImagePath = $product->images->first()->image_path;
                        }
                        }

                        // Priority 2: Fallback to thumbnail if no product images
                        if (!$displayImagePath && $product->thumbnail) {
                        $displayImagePath = $product->thumbnail;
                        }
                        @endphp

                        @if($displayImagePath)
                        <img src="{{ Storage::url($displayImagePath) }}" alt="{{ $product->name }}"
                            class="rounded-2xl object-cover w-[90px] h-[90px] border border-gray-200">
                        @else
                        <div class="w-[90px] h-[90px] bg-gray-200 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        @endif

                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $product->name }}
                            </h3>
                            <p class="text-slate-500">{{ $product->tagline }}</p>

                            {{-- Show image count --}}
                            <div class="flex gap-2 mt-1">
                                @if($product->images && $product->images->count() > 0)
                                <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                    {{ $product->images->count() }} image(s)
                                </span>
                                @endif
                                @if($product->thumbnail)
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                    Has thumbnail
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Date</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{ $product->created_at->format('M d, Y') }}
                        </h3>
                    </div>

                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.products.edit', $product) }}"
                            class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition-colors">
                            Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="font-bold py-2 px-4 bg-red-700 text-white rounded-full hover:bg-red-800 transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-4a2 2 0 00-2 2v3a2 2 0 01-2 2H8a2 2 0 01-2-2v-3a2 2 0 00-2-2H4" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No products found</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new product.</p>
                    <div class="mt-6">
                        <a href="{{ route('admin.products.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Add New Product
                        </a>
                    </div>
                </div>
                @endforelse

                @if($products->hasPages())
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>