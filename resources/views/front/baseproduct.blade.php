@extends('front.layouts.app')
@section('content')
<div id="header" class="bg-[#000000] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        {{-- reusable navbar --}}
        <x-navbar />
    </div>
</div>

<!-- Products Grid -->
<div id="Products" class="bg-[#FFFFFF] min-h-screen">
    <div class="container max-w-[1130px] mx-auto px-4 py-16">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse ($baseproducts as $baseproduct)
            <div class="product-card bg-[#FFFFFF] border-2 border-[#000000] overflow-hidden group cursor-pointer relative">
                <!-- Red Accent Corner -->
                <div class="absolute top-0 right-0 w-0 h-0 border-l-[20px] border-l-transparent border-t-[20px] border-t-[#FF0000] z-10"></div>

                <!-- Product Image Container -->
                <div class="relative w-full h-80 overflow-hidden bg-[#FFFFFF] p-4">
                    <div class="w-full h-full bg-gradient-to-br from-[#FFFFFF] to-[#F8F8F8] rounded-lg border border-gray-200 overflow-hidden">
                        <img src="{{ Storage::url($baseproduct->thumbnail) }}"
                             class="w-full h-full object-contain cursor-pointer group-hover:scale-110 transition-all duration-500 ease-out"
                             alt="{{ $baseproduct->name }}"
                             onclick="openProductGallery({{ $baseproduct->id }})"
                             data-product-id="{{ $baseproduct->id }}">
                    </div>

                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-[#000000] bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div class="text-[#FFFFFF] font-bold text-sm uppercase tracking-wider bg-[#FF0000] px-4 py-2 rounded transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            View Details
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="p-6 bg-[#000000] relative">
                    <!-- Red accent line -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-[#FF0000]"></div>

                    <div class="space-y-4">
                        <!-- Product Title -->
                        <h3 class="font-bold text-xl leading-[35px]">
                            {{ $baseproduct->name }}
                        </h3>

                        <!-- Tagline/Price -->
                        <div class="space-y-2">
                            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                                {{ $baseproduct->tagline }}
                            </p>

                            <!-- Product Description -->
                            <p class="leading-[30px] text-cp-light-grey">
                                {{ $baseproduct->about }}
                            </p>
                        </div>

                        <!-- Action Button -->
                        {{-- <div class="pt-2">
                            <button class="w-full bg-[#FF0000] text-[#FFFFFF] font-bold py-3 px-4 uppercase tracking-wider text-sm hover:bg-[#FFFFFF] hover:text-[#FF0000] border-2 border-[#FF0000] transition-all duration-300 transform hover:scale-105">
                                Learn More
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="max-w-md mx-auto bg-[#000000] p-12 border-2 border-[#FF0000]">
                    <!-- Custom Icon -->
                    <div class="w-16 h-16 mx-auto mb-6 relative">
                        <div class="w-full h-full border-4 border-[#FF0000] rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-[#FF0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#FFFFFF] mb-4 uppercase tracking-wider">No Products Found</h3>
                    <div class="w-16 h-1 bg-[#FF0000] mx-auto mb-4"></div>
                    <p class="text-[#FFFFFF] opacity-80">Belum ada data produk tersedia saat ini.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<x-footer />
@endsection

@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="{{ asset('js/modal-video.js') }}"></script>

<style>
/* Enhanced Custom Styles */
.product-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.product-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(255, 0, 0, 0.1);
}

.product-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(255, 0, 0, 0.05) 50%, transparent 60%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
    z-index: 1;
}

.product-card:hover::before {
    opacity: 1;
}

/* Image hover effects */
.product-card img {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    filter: grayscale(0%) contrast(1);
}

.product-card:hover img {
    filter: grayscale(0%) contrast(1.1);
}

/* Text truncation for description */
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Button pulse animation */
@keyframes pulse-red {
    0%, 100% {
        background-color: #FF0000;
        border-color: #FF0000;
    }
    50% {
        background-color: #CC0000;
        border-color: #CC0000;
    }
}

.product-card:hover button {
    animation: pulse-red 2s infinite;
}

/* Loading animation for images */
.product-card img[src=""] {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .product-card {
        margin-bottom: 1rem;
    }

    .product-card:hover {
        transform: translateY(-4px) scale(1.01);
    }
}

/* Dark mode support for better contrast */
@media (prefers-color-scheme: dark) {
    .product-card {
        box-shadow: 0 4px 6px -1px rgba(255, 255, 255, 0.1);
    }

    .product-card:hover {
        box-shadow: 0 20px 25px -5px rgba(255, 255, 255, 0.2), 0 10px 10px -5px rgba(255, 0, 0, 0.2);
    }
}

/* Focus states for accessibility */
.product-card:focus-within {
    outline: 2px solid #FF0000;
    outline-offset: 2px;
}

/* Smooth scrolling for better UX */
html {
    scroll-behavior: smooth;
}
</style>
@endpush
