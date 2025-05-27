@extends('front.layouts.app')

@section('content')
<div id="header" class="bg-[#F6F7FA] relative ">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        {{-- reusable navbar --}}
        <x-navbar />
    </div>
</div>

<div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-10 lg:gap-20 mt-20 px-4 lg:px-0">
    @forelse ($products as $product)
    <div class="product flex flex-col sm:flex-row lg:flex-wrap justify-center items-center gap-6 sm:gap-8 lg:gap-[60px] lg:even:flex-row-reverse
                py-6 border-b border-slate-200 last:border-b-0 sm:text-left
                lg:py-0 lg:border-b-0">

        <div class="w-full max-w-[350px] sm:max-w-[300px] lg:w-[400px]
                    aspect-[7/5] sm:aspect-[5/4] lg:aspect-[8/11]  /* Base:350/250, SM:300/240, LG:400/550 */
                    overflow-hidden rounded-[12px] lg:rounded-[20px] mx-auto sm:mx-0 shrink-0">
            <img src="{{ Storage::url($product->thumbnail) }}"
                 class="w-full h-full object-cover object-center  /* Img fills container, covers, and centers */
                        cursor-pointer hover:opacity-90 active:scale-98 transition-all duration-300 ease-in-out"
                 alt="{{ $product->name }}"
                 onclick="openProductGallery({{ $product->id }})"
                 data-product-id="{{ $product->id }}">
        </div>

        <div class="flex flex-col items-center sm:items-start gap-4 lg:gap-[30px] py-0 lg:py-[50px] h-fit
                    max-w-full sm:flex-1 sm:text-left lg:max-w-[500px] text-center lg:text-left">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[6px_12px] lg:p-[8px_16px] rounded-full
                        uppercase font-bold text-xs lg:text-sm mx-auto sm:mx-0">
                {{ $product->tagline }}
            </p>

            <div class="flex flex-col gap-2 lg:gap-[10px]">
                <h2 class="font-bold text-2xl lg:text-4xl leading-[32px] lg:leading-[45px]">
                    {{ $product->name }}
                </h2>
                <p class="leading-[24px] lg:leading-[30px] text-cp-light-grey text-sm lg:text-base px-2 lg:px-0">
                    {{ $product->about }}
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 lg:gap-4 items-center justify-center sm:justify-start w-full sm:w-auto">
                <a href="#"
                    class="bg-cp-dark-red p-[12px_18px] lg:p-[14px_20px] w-full sm:w-fit text-center rounded-xl
                           hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold text-white
                           text-sm lg:text-base min-h-11 touch-manipulation">
                    <span class="lg:hidden">Tap gambar untuk galeri</span>
                    <span class="hidden lg:inline">Klik gambar di samping</span>
                </a>

                <button onclick="openProductGallery({{ $product->id }})"
                        class="lg:hidden bg-white border-2 border-cp-dark-red text-cp-dark-red p-[12px_18px]
                               w-full sm:w-fit text-center rounded-xl hover:bg-cp-dark-red hover:text-white
                               transition-all duration-300 font-bold text-sm min-h-11 touch-manipulation">
                    Lihat Galeri
                </button>
            </div>
        </div>
    </div>
    @empty
    <div class="text-center py-10">
        <p class="text-sm lg:text-base text-cp-light-grey">belum ada data</p>
    </div>
    @endforelse
</div>

{{-- Styles and Scripts remain largely the same, ensure Tailwind aspect-ratio plugin is active --}}
<style>
@media (max-width: 639px) {
    #Products .product img { position: relative; }
    #Products .product img::after {
        content: '👆 Tap untuk galeri'; position: absolute; bottom: 10px; left: 50%;
        transform: translateX(-50%); background: rgba(0, 0, 0, 0.7); color: white;
        padding: 4px 8px; border-radius: 4px; font-size: 12px; opacity: 0;
        transition: opacity 0.3s ease; pointer-events: none;
    }
    #Products .product:hover img::after { opacity: 1; }
}
#Products .product img {
    background: #f3f4f6;
    background-image: linear-gradient(45deg, #f3f4f6 25%, transparent 25%),
                      linear-gradient(-45deg, #f3f4f6 25%, transparent 25%),
                      linear-gradient(45deg, transparent 75%, #f3f4f6 75%),
                      linear-gradient(-45deg, transparent 75%, #f3f4f6 75%);
    background-size: 20px 20px;
    background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
}
#Products .product img[src]:not([src=""]):not([src*="placeholder.svg"]) { background: none; }
</style>

<script>
// Modal Control Functions (ensure these are correctly implemented or use Flowbite's JS API if preferred)
function openProductGallery(productId) {
    const modal = document.getElementById(`product-gallery-${productId}`);
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }
}
function closeProductGallery(productId) {
    const modal = document.getElementById(`product-gallery-${productId}`);
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        if (!document.querySelector('[id^="product-gallery-"]:not(.hidden)') && !document.querySelector('#fullImageModal:not(.hidden)')) {
            document.body.classList.remove('overflow-hidden');
        }
    }
}
function openFullImage(imageUrl, imageAlt) {
    const modal = document.getElementById('fullImageModal');
    const imgElement = document.getElementById('fullSizeImage');
    if (modal && imgElement) {
        imgElement.src = imageUrl;
        imgElement.alt = imageAlt || 'Full size image';
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }
}
function closeFullImage() {
    const modal = document.getElementById('fullImageModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        if (!document.querySelector('[id^="product-gallery-"]:not(.hidden)') && !document.querySelector('#fullImageModal:not(.hidden)')) {
            document.body.classList.remove('overflow-hidden');
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const productImages = document.querySelectorAll('#Products .product img[data-product-id]');
    productImages.forEach(img => {
        img.addEventListener('touchstart', function() { this.style.transform = 'scale(0.98)'; }, { passive: true });
        img.addEventListener('touchend', function() { this.style.transform = 'scale(1)'; }, { passive: true });
        if (!img.complete) { img.classList.add('loading'); }
        img.addEventListener('load', function() {
            this.classList.remove('loading'); this.classList.add('loaded');
        });
        img.addEventListener('error', function() {
            this.classList.remove('loading');
            // You might want a specific placeholder aspect ratio or a generic one
            this.src = '/placeholder.svg?text=Error&height=240&width=300';
            this.alt = 'Image not available';
        });
    });

    let touchStartX = 0;
    productImages.forEach(img => {
        img.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        img.addEventListener('touchend', function(e) {
            const touchEndX = e.changedTouches[0].screenX;
            handleSwipe(this, touchStartX, touchEndX);
        }, { passive: true });
    });
    function handleSwipe(element, startX, endX) {
        const swipeThreshold = 50;
        const diff = startX - endX;
        if (Math.abs(diff) > swipeThreshold) {
            if (navigator.vibrate) navigator.vibrate(50);
            const productId = element.getAttribute('data-product-id');
            if (productId) openProductGallery(productId);
        }
    }
});
</script>

@foreach ($products as $product)
<div id="product-gallery-{{ $product->id }}" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-full bg-black bg-opacity-75">
    <div class="relative p-4 w-full max-w-6xl max-h-full mx-auto">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ $product->name }} - Galeri Foto
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        onclick="closeProductGallery({{ $product->id }})">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                {{-- Gallery Grid: Images now in aspect-square containers --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                    <div class="relative group aspect-square overflow-hidden rounded-lg">
                        <img src="{{ Storage::url($product->thumbnail) }}"
                             class="w-full h-full object-cover object-center cursor-pointer hover:opacity-90 transition-opacity"
                             alt="{{ $product->name }}"
                             onclick="openFullImage('{{ Storage::url($product->thumbnail) }}', '{{ $product->name }}')">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all rounded-lg pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-6 md:w-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </div>
                    </div>

                    @foreach($product->images as $image)
                    <div class="relative group aspect-square overflow-hidden rounded-lg">
                        <img src="{{ Storage::url($image->image_path) }}"
                             class="w-full h-full object-cover object-center cursor-pointer hover:opacity-90 transition-opacity"
                             alt="{{ $product->name }} - Image {{ $loop->iteration }}"
                             onclick="openFullImage('{{ Storage::url($image->image_path) }}', '{{ $product->name }} - Image {{ $loop->iteration }}')">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all rounded-lg pointer-events-none">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-6 md:w-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div id="fullImageModal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[60] justify-center items-center w-full inset-0 h-full bg-black bg-opacity-90 p-4"> {/* Added padding here for safety */}
    <div class="relative w-full h-full flex items-center justify-center">
        <button type="button"
                class="absolute top-4 right-4 text-white bg-black bg-opacity-50 hover:bg-opacity-70 rounded-full p-2 inline-flex items-center justify-center z-10"
                onclick="closeFullImage()">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close image</span>
        </button>
        <img id="fullSizeImage" src="/placeholder.svg" alt="Full size view"
             class="max-h-[calc(100vh-2rem)] max-w-[calc(100vw-2rem)] object-contain rounded-lg"> {/* Max size considers padding */}
    </div>
</div>

<x-footer />
<x-whatsapp/>
@endsection

@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="{{ asset('js/product-pop.js') }}"></script>
@endpush
