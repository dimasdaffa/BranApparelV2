@extends('front.layouts.app')

@section('content')
<div id="header" class="bg-[#F6F7FA] relative ">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        {{-- reusable navbar --}}
        <x-navbar />
    </div>
</div>

<div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
    @forelse ($baseproducts as $baseproduct)
    <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">
        <div class="w-[400px] h-[550px] flex shrink-0 overflow-hidden rounded-[20px]">
            <!-- Make the thumbnail clickable to open gallery -->
            <img src="{{ Storage::url($baseproduct->thumbnail) }}"
                 class="w-full h-full object-cover rounded-[20px] cursor-pointer hover:opacity-90 transition-opacity"
                 alt="{{ $baseproduct->name }}"
                 onclick="openProductGallery({{ $baseproduct->id }})"
                 data-product-id="{{ $baseproduct->id }}">
        </div>
        <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                {{ $baseproduct->tagline }}
            </p>
            <div class="flex flex-col gap-[10px]">
                <h2 class="font-bold text-4xl leading-[45px]">{{ $baseproduct->name }}</h2>
                <p class="leading-[30px] text-cp-light-grey">{{ $baseproduct->about }}</p>
            </div>
            <a href="{{ route('front.product') }}"
                class="bg-cp-dark-red p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold text-white">
                Lihat Portofolio
            </a>
        </div>
    </div>
    @empty
    <p>belum ada data</p>
    @endforelse
</div>

<x-footer />

<!-- Video Modal (keeping this from your original code) -->
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
                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="">
                <!-- video src added from the js script (modal-video.js) to prevent video running in the backgroud -->
                <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src="" title="Demo Project Laravel Portfolio"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
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
