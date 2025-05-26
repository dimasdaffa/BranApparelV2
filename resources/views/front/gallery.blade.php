@extends('front.layouts.app')
@section('content')

<!-- Our Principles Section -->
<div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-5 lg:gap-[30px] mt-[35px] px-4 lg:px-0">
    {{-- reusable navbar moved here --}}
    <x-navbar />

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 lg:gap-0">
        <div class="flex flex-col gap-2 lg:gap-[14px] text-center lg:text-left">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[6px_12px] lg:p-[8px_16px] rounded-full uppercase font-bold text-xs lg:text-sm mx-auto lg:mx-0">
                OUR VALUES
            </p>
            <h2 class="font-bold text-2xl lg:text-4xl leading-[32px] lg:leading-[45px]">
                Kami Bukan Yang Pertama <br class="hidden lg:block">
                <span class="lg:hidden">Tetapi Kami Yang Terbaik</span>
                <span class="hidden lg:inline">Tetapi Kami Yang Terbaik</span>
            </h2>
        </div>
        {{-- <a href="" class="bg-cp-darker-red p-[12px_18px] lg:p-[14px_20px] w-fit rounded-xl font-bold text-white text-sm lg:text-base mx-auto lg:mx-0">Selengkapnya</a> --}}
    </div>

    <!-- Principles Cards Grid -->
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

<!-- Awards Section -->
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

<!-- Footer -->
<x-footer />

<!-- Video Modal -->
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
                <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src=""
                    title="Demo Project Laravel Portfolio" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
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

/* Mobile-specific adjustments for Principles */
@media (max-width: 1023px) {
    #OurPrinciples .grid {
        grid-template-columns: repeat(2, 1fr);
    }

    #OurPrinciples .card {
        min-height: 280px;
    }

    /* Awards section mobile adjustments */
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
    #OurPrinciples .card {
        min-height: 320px;
    }

    #OurPrinciples .thumbnail {
        height: 140px;
    }

    #Awards .card {
        min-height: 220px;
        padding: 1.25rem;
    }

    #Awards .card .w-\[35px\] {
        width: 40px;
        height: 40px;
    }
}

/* Ensure consistent card heights */
#OurPrinciples .grid,
#Awards .awards-card-container {
    align-items: stretch;
}

#OurPrinciples .card,
#Awards .card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Better hover effects on mobile */
@media (hover: none) {
    #OurPrinciples .card:hover,
    #Awards .card:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
}

/* Responsive text sizing for very small screens */
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
@endpush
