@extends('front.layouts.app')
@section('content')
<div id="header" class="bg-[#F6F7FA] relative overflow-hidden min-h-screen lg:min-h-auto">
    <div class="container max-w-[1130px] mx-auto relative pt-10 lg:pt-10 px-4 lg:px-0 z-10">
        {{-- reusable navbar --}}
        <x-navbar class="relative z-50" />
        @forelse ($hero_section as $hero)
        <input type="hidden" name="path_video" id="path_video" value="{{ $hero->path_video }}">
        <div id="Hero" class="flex flex-col gap-[20px] lg:gap-[30px] mt-16 lg:mt-20 pb-20 lg:pb-20">
            <!-- Achievement Badge -->
            <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit mx-auto lg:mx-0">
                <div class="w-5 h-5 flex shrink-0 overflow-hidden">
                    <img src="{{ asset('assets/icons/crown.svg') }}" class="object-contain" alt="icon">
                </div>
                <p class="font-semibold text-sm">{{ $hero->achievement }}</p>
            </div>

            <!-- Hero Content -->
            <div class="flex flex-col gap-[10px] text-center lg:text-left">
                <h1 class="font-extrabold text-[28px] sm:text-[35px] lg:text-[50px] leading-[36px] sm:leading-[45px] lg:leading-[65px] max-w-full lg:max-w-[536px] mx-auto lg:mx-0">
                    {{ $hero->heading }}
                </h1>
                <p class="text-cp-light-grey leading-[24px] lg:leading-[30px] max-w-full lg:max-w-[437px] mx-auto lg:mx-0 text-sm lg:text-base px-4 lg:px-0">
                    {{ $hero->subheading }}
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 px-4 lg:px-0">
                <a href="#Products"
                    class="bg-cp-dark-red p-4 lg:p-5 w-full sm:w-fit text-center rounded-xl hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold text-white">
                    Lebih Banyak
                </a>
                <button class="bg-cp-darker-red p-4 lg:p-5 w-full sm:w-fit rounded-xl font-bold text-white flex items-center justify-center gap-[10px]"
                    onclick="{modal.show()}">
                    <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                        <img src="{{ asset('assets/icons/play-circle.svg') }}" class="w-full h-full object-contain"
                            alt="icon">
                    </div>
                    <span>Watch Video</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Hero Image - Responsive -->
    <div class="absolute w-full lg:w-[43%] h-[40%] lg:h-full bottom-0 lg:top-0 right-0 overflow-hidden z-0">
        <img src="{{ Storage::url($hero->banner) }}"
             class="object-cover w-full h-full lg:object-cover"
             alt="banner">
        <!-- Mobile Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#F6F7FA] via-transparent to-transparent lg:hidden"></div>
    </div>
    @empty
    <p class="text-center py-20">belum ada data</p>
    @endforelse
</div>

<!-- Additional CSS for better mobile experience -->
<style>
/* Ensure proper spacing on mobile */
@media (max-width: 1023px) {
    #header {
        padding-bottom: 2rem;
    }

    /* Adjust hero content positioning on mobile */
    #Hero {
        position: relative;
        z-index: 1;
    }

    /* Better button styling on mobile */
    #Hero .flex.flex-col.sm\:flex-row a,
    #Hero .flex.flex-col.sm\:flex-row button {
        min-height: 48px; /* Better touch target */
    }
}

/* Tablet adjustments */
@media (min-width: 640px) and (max-width: 1023px) {
    #header .absolute {
        height: 50%;
    }
}

/* Ensure text is readable over image on mobile */
@media (max-width: 640px) {
    #Hero h1,
    #Hero p {
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
}

/* Navbar z-index fix to ensure it stays on top */
.navbar,
nav,
header nav,
x-navbar {
    position: relative;
    z-index: 100 !important;
}

/* If the navbar has a fixed position */
.fixed-navbar,
.navbar-fixed,
.fixed-top {
    position: fixed;
    z-index: 1000 !important;
}

/* Ensure dropdown menus also have high z-index */
.navbar .dropdown,
.navbar .dropdown-menu,
nav .dropdown,
nav .dropdown-menu {
    z-index: 110 !important;
}
</style>
<div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20 px-4 lg:px-0">
    <h2 class="font-bold text-base lg:text-lg">Partner Langganan Kami</h2>
    <div class="logo-container flex flex-wrap gap-3 lg:gap-5 justify-center">
        @forelse($teams as $team)
        <div class="logo-card h-[56px] lg:h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[14px] lg:rounded-[18px] p-3 lg:p-4 gap-[8px] lg:gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
            <!-- Mobile: smaller image, Desktop: original size -->
            <div class="overflow-hidden h-6 w-6 lg:h-9 lg:w-9 rounded-md lg:rounded-lg">
                <img src="{{ Storage::url($team->avatar) }}"
                     class="object-cover w-full h-full"
                     alt="{{ $team->name }}">
            </div>
            <!-- Mobile: smaller text, Desktop: original size -->
            <p class="font-bold text-sm lg:text-lg whitespace-nowrap">{{ $team->name }}</p>
        </div>
        @empty
        <p class="text-sm lg:text-base">Belum ada data</p>
        @endforelse
    </div>
</div>

<div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[20px] lg:gap-[30px] mt-20 px-4 lg:px-0">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 lg:gap-0">
        <div class="flex flex-col gap-[10px] lg:gap-[14px] text-center lg:text-left">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[6px_12px] lg:p-[8px_16px] rounded-full uppercase font-bold text-xs lg:text-sm mx-auto lg:mx-0">
                OUR VALUES
            </p>
            <h2 class="font-bold text-2xl lg:text-4xl leading-[32px] lg:leading-[45px]">
                Kami Bukan Yang Pertama <br class="hidden lg:block">
                <span class="lg:hidden">Tetapi Kami Yang Terbaik</span>
                <span class="hidden lg:inline">Tetapi Kami Yang Terbaik</span>
            </h2>
        </div>
        {{-- <a href="" class="bg-cp-darker-red p-[14px_20px] w-fit rounded-xl font-bold text-white mx-auto lg:mx-0">Selengkapnya</a> --}}
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-2 lg:flex lg:flex-wrap lg:items-center gap-3 lg:gap-[30px] lg:justify-center">
        @forelse ($principles as $principle)
        <div class="card w-full lg:w-[356.67px] flex flex-col bg-white border border-[#E8EAF2] rounded-[12px] lg:rounded-[20px] gap-[15px] lg:gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
            <!-- Thumbnail -->
            <div class="thumbnail h-[120px] lg:h-[200px] flex shrink-0 overflow-hidden">
                <img src="{{ Storage::url($principle->thumbnail) }}"
                     class="object-cover object-center w-full h-full"
                     alt="thumbnails">
            </div>

            <!-- Card Content -->
            <div class="flex flex-col p-[0_15px_15px_15px] lg:p-[0_30px_30px_30px] gap-3 lg:gap-5">
                <!-- Icon -->
                <div class="w-[35px] h-[35px] lg:w-[55px] lg:h-[55px] flex shrink-0 overflow-hidden">
                    <img src="{{ Storage::url($principle->icon) }}"
                         class="w-full h-full object-contain"
                         alt="icon">
                </div>

                <!-- Text Content -->
                <div class="flex flex-col gap-1">
                    <p class="title font-bold text-sm lg:text-xl leading-[20px] lg:leading-[30px]">
                        {{ $principle->name }}
                    </p>
                    <p class="leading-[18px] lg:leading-[30px] text-cp-light-grey text-xs lg:text-base line-clamp-3 lg:line-clamp-none">
                        {{ $principle->subtitle }}
                    </p>
                </div>
                {{-- <a href="" class="font-semibold text-cp-dark-blue text-sm lg:text-base">Learn More</a> --}}
            </div>
        </div>
        @empty
        <div class="col-span-2 lg:col-span-1">
            <p class="text-center text-sm lg:text-base">belum ada data</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Additional CSS for better mobile experience -->
<style>
/* Line clamp utility for mobile text truncation */
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Ensure proper grid behavior on mobile */
@media (max-width: 1023px) {
    #OurPrinciples .grid {
        grid-template-columns: repeat(2, 1fr);
    }

    /* Better spacing for mobile cards */
    #OurPrinciples .card {
        min-height: 280px;
    }
}

/* Tablet adjustments */
@media (min-width: 640px) and (max-width: 1023px) {
    #OurPrinciples .card {
        min-height: 320px;
    }

    #OurPrinciples .thumbnail {
        height: 140px;
    }
}
</style>

<div id="Stats" class="bg-cp-darker-red w-full mt-20">
    <div class="container max-w-[1000px] mx-auto py-10">
        <div class="flex items-center md:justify-between gap-[50px] p-[10px]">
            @forelse ($statistics as $statistic)
            <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                    <img src="{{ Storage::url($statistic->icon) }}" class="object-contain w-full h-full" alt="icon">
                </div>
                <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">{{ $statistic->goal }}</p>
                <p class="text-cp-light-grey">{{ $statistic->name }}</p>
            </div>
            @empty
            <p>belum ada data</p>
            @endforelse

        </div>
    </div>
</div>
<div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-10 lg:gap-20 mt-20 px-4 lg:px-0">
    @forelse ($products->slice(0, 3) as $product)
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

        </div>
    </div>
    @empty
    <div class="text-center py-10">
        <p class="text-sm lg:text-base text-cp-light-grey">belum ada data</p>
    </div>
    @endforelse

    <!-- View More Button -->
    <a href="{{ route('front.product') }}"
        class="bg-cp-dark-red flex items-center justify-center gap-2 p-[12px_18px] lg:p-[14px_20px] w-full sm:w-fit max-w-[280px] lg:max-w-none rounded-xl hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold mx-auto text-white text-sm lg:text-base">
        <span>Lihat Lebih Banyak</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-arrow-right lg:w-5 lg:h-5">
            <path d="M5 12h14" />
            <path d="m12 5 7 7-7 7" />
        </svg>
    </a>
</div>

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

<!-- Additional CSS for better mobile experience -->
<style>
/* Mobile-specific adjustments */
@media (max-width: 1023px) {
    #Products .product {
        padding: 1rem 0;
        border-bottom: 1px solid #E8EAF2;
    }

    #Products .product:last-child {
        border-bottom: none;
    }

    /* Ensure consistent image aspect ratio on mobile */
    #Products .product img {
        object-position: center;
    }
}

/* Tablet adjustments */
@media (min-width: 640px) and (max-width: 1023px) {
    #Products .product {
        flex-direction: row;
        text-align: left;
    }

    #Products .product .badge {
        margin: 0;
    }

    #Products .product .bg-cp-dark-red {
        width: fit-content;
        margin: 0;
    }

    #Products .product > div:first-child {
        max-width: 280px;
        height: 200px;
    }

    #Products .product > div:last-child {
        flex: 1;
        text-align: left;
    }
}

/* Better button spacing */
#Products a[href*="front.product"] {
    margin-top: 1rem;
}

@media (min-width: 1024px) {
    #Products a[href*="front.product"] {
        margin-top: 0;
    }
}
</style>
</div>

<div id="Teams" class="bg-[#F6F7FA] w-full py-10 lg:py-20 px-4 lg:px-[10px] mt-20">
    <div class="container max-w-[1130px] mx-auto flex flex-col gap-5 lg:gap-[30px] items-center">
        <!-- Header Section -->
        <div class="flex flex-col gap-2 lg:gap-[14px] items-center">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[6px_12px] lg:p-[8px_16px] rounded-full uppercase font-bold text-xs lg:text-sm">
                KLIEN KAMI
            </p>
            <h2 class="font-bold text-2xl lg:text-4xl leading-[32px] lg:leading-[45px] text-center px-4 lg:px-0">
                Kami Berbagi Mimpi yang Sama <br class="hidden sm:block">
                <span class="sm:hidden">Menjadi Yang Terbaik !</span>
                <span class="hidden sm:inline">Menjadi Yang Terbaik !</span>
            </h2>
        </div>

        <!-- Teams Grid -->
        <div class="teams-card-container grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 lg:gap-[30px] justify-center w-full">
            @forelse ($teams->slice(0, 7) as $team)
            <div class="card bg-white flex flex-col h-full justify-center items-center p-4 lg:p-[30px] gap-4 lg:gap-[30px] rounded-[12px] lg:rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                <!-- Avatar -->
                <div class="w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] flex shrink-0 items-center justify-center">
                    <div class="w-[55px] h-[55px] lg:w-[90px] lg:h-[90px] rounded-full overflow-hidden">
                        <img src="{{ Storage::url($team->avatar) }}"
                             class="object-cover w-full h-full object-center"
                             alt="photo">
                    </div>
                </div>

                <!-- Name and Occupation -->
                <div class="flex flex-col gap-1 text-center">
                    <p class="font-bold text-sm lg:text-xl leading-[20px] lg:leading-[30px] line-clamp-2">
                        {{ $team->name }}
                    </p>
                    <p class="text-cp-light-grey text-xs lg:text-base line-clamp-2">
                        {{ $team->occupation }}
                    </p>
                </div>

                <!-- Location -->
                <div class="flex items-center justify-center gap-[6px] lg:gap-[10px]">
                    <div class="w-4 h-4 lg:w-6 lg:h-6 flex shrink-0">
                        <img src="{{ asset('assets/icons/global.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-xs lg:text-base line-clamp-1">
                        {{ $team->location }}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-2 sm:col-span-2 md:col-span-3 lg:col-span-4">
                <p class="text-center text-sm lg:text-base">belum ada data</p>
            </div>
            @endforelse

            <!-- View All Card -->
            <a href="{{ route('front.team') }}" class="view-all-card">
                <div class="card bg-white flex flex-col h-full justify-center items-center p-4 lg:p-[30px] gap-4 lg:gap-[30px] rounded-[12px] lg:rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                    <!-- Icon -->
                    <div class="w-[40px] h-[40px] lg:w-[60px] lg:h-[60px] flex shrink-0">
                        <img src="{{ asset('assets/icons/profile-2user.svg') }}" alt="icon">
                    </div>

                    <!-- Text -->
                    <div class="flex flex-col gap-1 text-center">
                        <p class="font-bold text-sm lg:text-xl leading-[20px] lg:leading-[30px]">
                            Lihat Semua
                        </p>
                        <p class="text-cp-light-grey text-xs lg:text-base">
                            Pelanggan Setia Kami
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Additional CSS for better mobile experience -->
<style>
/* Line clamp utilities */
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Mobile-specific adjustments */
@media (max-width: 640px) {
    #Teams .teams-card-container {
        grid-template-columns: repeat(2, 1fr);
    }

    #Teams .card {
        min-height: 180px;
        aspect-ratio: 1;
    }

    /* Better touch targets */
    #Teams .view-all-card {
        display: block;
        width: 100%;
    }
}

/* Tablet adjustments */
@media (min-width: 641px) and (max-width: 1023px) {
    #Teams .card {
        min-height: 220px;
    }

    #Teams .w-\[60px\] {
        width: 70px;
        height: 70px;
    }

    #Teams .w-\[55px\] {
        width: 65px;
        height: 65px;
    }
}

/* Ensure consistent card heights */
#Teams .teams-card-container {
    align-items: stretch;
}

#Teams .card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Better hover effects on mobile */
@media (hover: none) {
    #Teams .card:hover {
        transform: scale(1.02);
    }
}
</style>

<div id="Testimonials" class="w-full flex flex-col gap-8 lg:gap-[50px] items-center mt-20 px-4 lg:px-0">
    <!-- Header Section -->
    <div class="flex flex-col gap-2 lg:gap-[14px] items-center">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[6px_12px] lg:p-[8px_16px] rounded-full uppercase font-bold text-xs lg:text-sm">
            SUCCESS CLIENTS
        </p>
        <h2 class="font-bold text-2xl lg:text-4xl leading-[32px] lg:leading-[45px] text-center">
            Kepercayaan Klien,<br class="hidden sm:block">
            <span class="sm:hidden">Kami Wujudkan!</span>
            <span class="hidden sm:inline">Kami Wujudkan!</span>
        </h2>
    </div>

    <!-- Testimonials Carousel -->
    <div class="main-carousel w-full">
        @forelse ($testimonials as $testimonial)
        <div class="carousel-card container max-w-[1130px] w-full flex flex-col lg:flex-row lg:flex-wrap justify-between items-center gap-6 lg:gap-0 lg:mx-[calc((100vw-1130px)/2)]">

            <!-- Testimonial Content -->
            <div class="testimonial-container flex flex-col gap-8 lg:gap-[112px] w-full lg:w-[565px] order-2 lg:order-1">
                <div class="flex flex-col gap-6 lg:gap-[30px]">
                    <!-- Client Logo -->
                    <div class="h-6 lg:h-9 overflow-hidden flex justify-center lg:justify-start">
                        <img src="{{ Storage::url($testimonial->client->logo) }}"
                             class="object-contain max-h-full"
                             alt="client logo">
                    </div>

                    <!-- Testimonial Message -->
                    <div class="relative pt-[20px] lg:pt-[27px] pl-[20px] lg:pl-[30px]">
                        <div class="absolute top-0 left-0">
                            <img src="{{ asset('assets/icons/quote.svg') }}"
                                 class="w-4 h-4 lg:w-auto lg:h-auto"
                                 alt="quote icon">
                        </div>
                        <p class="font-semibold text-lg lg:text-2xl leading-[28px] lg:leading-[46px] relative z-10 text-center lg:text-left">
                            {{ Str::limit($testimonial->message, 150) }}
                        </p>
                    </div>

                    <!-- Client Info and Rating -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 lg:gap-0 pl-[20px] lg:pl-[30px]">
                        <!-- Client Profile -->
                        <div class="flex items-center gap-4 lg:gap-6 justify-center lg:justify-start">
                            <div class="w-[50px] h-[50px] lg:w-[60px] lg:h-[60px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ Storage::url($testimonial->client->avatar) }}"
                                     class="w-full h-full object-cover"
                                     alt="client photo">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <p class="font-bold text-sm lg:text-base">{{ $testimonial->client->name }}</p>
                                <p class="text-xs lg:text-sm text-cp-light-grey">{{ $testimonial->client->occupation }}</p>
                            </div>
                        </div>

                        <!-- Star Rating -->
                        <div class="flex flex-nowrap justify-center lg:justify-end gap-1">
                            @for($i = 0; $i < 5; $i++)
                            <div class="w-5 h-5 lg:w-6 lg:h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/Star-rating.svg') }}" alt="star">
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Carousel Indicator -->
                <div class="carousel-indicator flex items-center justify-center gap-2 h-3 lg:h-4 shrink-0">
                    <!-- Indicators will be populated by JavaScript -->
                </div>
            </div>

            <!-- Testimonial Image -->
            <div class="testimonial-thumbnail w-full max-w-[350px] h-[250px] lg:w-[470px] lg:h-[550px] rounded-[12px] lg:rounded-[20px] overflow-hidden bg-[#D9D9D9] order-1 lg:order-2 mx-auto lg:mx-0">
                <img src="{{ Storage::url($testimonial->thumbnail) }}"
                     class="w-full h-full object-cover object-center"
                     alt="testimonial thumbnail">
            </div>
        </div>
        @empty
        <div class="text-center py-10">
            <p class="text-sm lg:text-base">belum ada data</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Additional CSS for better mobile experience -->
<style>
/* Mobile-specific adjustments */
@media (max-width: 1023px) {
    #Testimonials .carousel-card {
        padding: 0 1rem;
    }

    /* Better spacing for mobile testimonials */
    #Testimonials .testimonial-container {
        text-align: center;
    }

    /* Ensure proper image sizing on mobile */
    #Testimonials .testimonial-thumbnail {
        aspect-ratio: 4/3;
    }

    /* Better quote positioning on mobile */
    #Testimonials .relative .absolute {
        transform: scale(0.8);
        transform-origin: top left;
    }
}

/* Tablet adjustments */
@media (min-width: 640px) and (max-width: 1023px) {
    #Testimonials .testimonial-thumbnail {
        max-width: 400px;
        height: 300px;
    }

    #Testimonials .testimonial-container {
        text-align: left;
    }

    #Testimonials .flex.items-center.gap-4 {
        justify-content: flex-start;
    }

    #Testimonials .flex.flex-nowrap {
        justify-content: flex-end;
    }
}

/* Carousel indicator styling */
.carousel-indicator {
    gap: 8px;
}

.carousel-indicator .indicator {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #D1D5DB;
    transition: all 0.3s ease;
    cursor: pointer;
}

.carousel-indicator .indicator.active {
    background-color: #EF4444;
    transform: scale(1.2);
}

/* Better touch targets for mobile */
@media (max-width: 640px) {
    #Testimonials .carousel-indicator .indicator {
        width: 10px;
        height: 10px;
    }
}

/* Smooth transitions for carousel */
.main-carousel {
    overflow: hidden;
}

.carousel-card {
    transition: transform 0.3s ease-in-out;
}

/* Text truncation for long testimonials on mobile */
@media (max-width: 640px) {
    #Testimonials .font-semibold.text-lg {
        line-height: 1.4;
        max-height: 4.2em; /* 3 lines */
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
}
</style>

<!-- JavaScript for carousel functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.main-carousel');
    const cards = carousel.querySelectorAll('.carousel-card');
    const indicators = document.querySelectorAll('.carousel-indicator');

    if (cards.length > 1) {
        // Create indicators
        indicators.forEach(indicatorContainer => {
            indicatorContainer.innerHTML = '';
            for (let i = 0; i < cards.length; i++) {
                const indicator = document.createElement('div');
                indicator.className = `indicator ${i === 0 ? 'active' : ''}`;
                indicator.addEventListener('click', () => goToSlide(i));
                indicatorContainer.appendChild(indicator);
            }
        });

        let currentSlide = 0;

        function goToSlide(index) {
            cards.forEach((card, i) => {
                card.style.display = i === index ? 'flex' : 'none';
            });

            document.querySelectorAll('.indicator').forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });

            currentSlide = index;
        }

        // Auto-play carousel
        setInterval(() => {
            currentSlide = (currentSlide + 1) % cards.length;
            goToSlide(currentSlide);
        }, 5000);

        // Initialize
        goToSlide(0);
    }
});
</script>

<div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-5 lg:gap-[30px] mt-20 px-4 lg:px-0">
    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 lg:gap-0">
        <div class="flex flex-col gap-2 lg:gap-[14px] text-center lg:text-left">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[6px_12px] lg:p-[8px_16px] rounded-full uppercase font-bold text-xs lg:text-sm mx-auto lg:mx-0">
                GALLERY
            </p>
            <h2 class="font-bold text-xl lg:text-4xl leading-[28px] lg:leading-[45px]">
                Lihat lebih dekat bagaimana kami<br class="hidden lg:block">
                <span class="lg:hidden">menghadirkan baju custom berkualitas!</span>
                <span class="hidden lg:inline">menghadirkan baju custom berkualitas!</span>
            </h2>
        </div>
        {{-- <a href="" class="bg-cp-darker-red p-[12px_18px] lg:p-[14px_20px] w-fit rounded-xl font-bold text-white text-sm lg:text-base mx-auto lg:mx-0">Selengkapnya</a> --}}
    </div>

    <!-- Awards Cards Grid -->
    <div class="awards-card-container grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-[30px] justify-center">
        <!-- Card 1: Proses Produksi -->
        <div class="card bg-white flex flex-col h-full p-4 lg:p-[30px] gap-3 lg:gap-[30px] rounded-[12px] lg:rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[35px] h-[35px] lg:w-[55px] lg:h-[55px] flex shrink-0 mx-auto lg:mx-0">
                <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
            </div>
            <hr class="border-[#E8EAF2]">
            <p class="font-bold text-sm lg:text-xl leading-[20px] lg:leading-[30px] text-center lg:text-left">
                Proses Produksi
            </p>
            <hr class="border-[#E8EAF2]">
            <p class="text-cp-light-grey text-xs lg:text-base leading-[16px] lg:leading-[24px] text-center lg:text-left">
                Setiap baju dibuat dengan ketelitian dan bahan berkualitas untuk hasil terbaik.
            </p>
        </div>

        <!-- Card 2: Proses Desain -->
        <div class="card bg-white flex flex-col h-full p-4 lg:p-[30px] gap-3 lg:gap-[30px] rounded-[12px] lg:rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[35px] h-[35px] lg:w-[55px] lg:h-[55px] flex shrink-0 mx-auto lg:mx-0">
                <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
            </div>
            <hr class="border-[#E8EAF2]">
            <p class="font-bold text-sm lg:text-xl leading-[20px] lg:leading-[30px] text-center lg:text-left">
                Proses Desain
            </p>
            <hr class="border-[#E8EAF2]">
            <p class="text-cp-light-grey text-xs lg:text-base leading-[16px] lg:leading-[24px] text-center lg:text-left">
                Dari ide ke realitas! Kami wujudkan desain custom yang sesuai dengan Anda.
            </p>
        </div>

        <!-- Card 3: Proses Packing -->
        <div class="card bg-white flex flex-col h-full p-4 lg:p-[30px] gap-3 lg:gap-[30px] rounded-[12px] lg:rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[35px] h-[35px] lg:w-[55px] lg:h-[55px] flex shrink-0 mx-auto lg:mx-0">
                <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
            </div>
            <hr class="border-[#E8EAF2]">
            <p class="font-bold text-sm lg:text-xl leading-[20px] lg:leading-[30px] text-center lg:text-left">
                Proses Packing
            </p>
            <hr class="border-[#E8EAF2]">
            <p class="text-cp-light-grey text-xs lg:text-base leading-[16px] lg:leading-[24px] text-center lg:text-left">
                Dikemas dengan rapi dan aman, memastikan pesanan Anda sampai dalam kondisi sempurna.
            </p>
        </div>

        <!-- Card 4: Proses Quality Control -->
        <div class="card bg-white flex flex-col h-full p-4 lg:p-[30px] gap-3 lg:gap-[30px] rounded-[12px] lg:rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[35px] h-[35px] lg:w-[55px] lg:h-[55px] flex shrink-0 mx-auto lg:mx-0">
                <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
            </div>
            <hr class="border-[#E8EAF2]">
            <p class="font-bold text-sm lg:text-xl leading-[20px] lg:leading-[30px] text-center lg:text-left">
                Proses Quality Control
            </p>
            <hr class="border-[#E8EAF2]">
            <p class="text-cp-light-grey text-xs lg:text-base leading-[16px] lg:leading-[24px] text-center lg:text-left">
                Kami cek setiap detail agar hanya produk terbaik yang Anda terima!
            </p>
        </div>
    </div>
</div>

<!-- Additional CSS for better mobile experience -->
<style>
/* Mobile-specific adjustments */
@media (max-width: 1023px) {
    #Awards .awards-card-container {
        grid-template-columns: repeat(2, 1fr);
    }

    #Awards .card {
        min-height: 200px;
        aspect-ratio: 1;
        justify-content: space-between;
    }

    /* Better spacing for mobile cards */
    #Awards .card hr {
        margin: 0;
        opacity: 0.5;
    }

    /* Ensure text doesn't overflow */
    #Awards .card p {
        word-wrap: break-word;
        hyphens: auto;
    }
}

/* Tablet adjustments */
@media (min-width: 640px) and (max-width: 1023px) {
    #Awards .card {
        min-height: 220px;
        padding: 1.25rem;
    }

    #Awards .card .w-\[35px\] {
        width: 40px;
        height: 40px;
    }

    #Awards .card .text-sm {
        font-size: 0.9rem;
    }

    #Awards .card .text-xs {
        font-size: 0.8rem;
    }
}

/* Ensure consistent card heights */
#Awards .awards-card-container {
    align-items: stretch;
}

#Awards .card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Better hover effects on mobile */
@media (hover: none) {
    #Awards .card:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
}

/* Responsive text sizing */
@media (max-width: 480px) {
    #Awards .card {
        min-height: 180px;
        gap: 0.5rem;
    }

    #Awards .card p.font-bold {
        font-size: 0.8rem;
        line-height: 1.2;
    }

    #Awards .card p.text-cp-light-grey {
        font-size: 0.7rem;
        line-height: 1.3;
    }
}

/* Icon centering on mobile */
@media (max-width: 1023px) {
    #Awards .card > div:first-child {
        align-self: center;
    }
}
</style>

<div id="FAQ" class="bg-[#F6F7FA] w-full py-20 px-[10px] mt-20 -mb-20">
    <div class="container max-w-[1000px] mx-auto">
        <div class="flex flex-col lg:flex-row gap-[50px] sm:gap-[70px] items-center">
            <div class="flex flex-col gap-[30px]">
                <div class="flex flex-col gap-[10px]">
                    <h2 class="font-bold text-4xl leading-[45px]">Frequently Asked Questions</h2>
                </div>
                <a href="{{ route('front.appointment') }}"
                    class="p-5 bg-cp-darker-red rounded-xl text-white w-fit font-bold">Hubungi
                    Kami</a>
            </div>
            <div class="flex flex-col gap-[30px] sm:w-[603px] shrink-0">
                <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-1">
                        <span class="font-bold text-lg leading-[27px] text-left">Berapa lama waktu produksi untuk baju
                            custom?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icons/arrow-circle-down.svg') }}"
                                class="transition-all duration-300" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-cp-light-grey pt-[14px]">Waktu produksi bervariasi, biasanya 5-10
                            hari kerja, tergantung pada jumlah pesanan dan tingkat kerumitan desain. Kami akan
                            menginformasikan estimasi waktu sebelum produksi dimulai.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-2">
                        <span class="font-bold text-lg leading-[27px] text-left">Apakah bisa membuat desain sendiri
                            atau harus dari template?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icons/arrow-circle-down.svg') }}"
                                class="transition-all duration-300" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-cp-light-grey pt-[14px]">Tentu! Anda bisa mengirimkan desain
                            sendiri atau memilih dari template yang kami sediakan. Tim kami juga siap membantu
                            menyempurnakan desain Anda.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-3">
                        <span class="font-bold text-lg leading-[27px] text-left">Apakah ada minimum order untuk
                            pemesanan custom?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icons/arrow-circle-down.svg') }}"
                                class="transition-all duration-300" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-cp-light-grey pt-[14px]">Kami menerima pemesanan mulai dari 1
                            pcs, tetapi untuk jumlah besar, kami menawarkan harga spesial!</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center"
                        data-accordion="accordion-faq-4">
                        <span class="font-bold text-lg leading-[27px] text-left">Bahan dan jenis sablon apa saja yang
                            tersedia?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="{{ asset('assets/icons/arrow-circle-down.svg') }}"
                                class="transition-all duration-300" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-4" class="accordion-content hide">
                        <p class="leading-[30px] text-cp-light-grey pt-[14px]">Kami menyediakan berbagai pilihan bahan
                            berkualitas, seperti Cotton Combed, Polyester, dan Dri-Fit. Untuk sablon, tersedia
                            Plastisol, Polyflex, DTG, dan Sublimasi, sesuai kebutuhan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer />
<div id="video-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full lg:w-1/2 max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-[20px] overflow-hidden shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-cp-black">
                    Company Profile Video
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    onclick="{modal.hide()}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="">
                <!-- video src added from the js script (modal-video.js) to prevent video running in the backgroud -->
                <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src="" title="Demo Project Laravel Profile"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<x-whatsapp/>
@endsection

@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="{{ asset('js/modal-video.js') }}"></script>
<script src="{{ asset('js/product-pop.js') }}"></script>
@endpush
