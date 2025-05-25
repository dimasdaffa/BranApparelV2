@extends('front.layouts.app')

@section('content')
<div id="header" class="bg-[#F6F7FA] relative ">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        {{-- reusable navbar --}}
        <x-navbar />
    </div>
</div>

<div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
    @forelse ($products as $product)
    <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">
        <div class="w-[400px] h-[550px] flex shrink-0 overflow-hidden rounded-[20px]">
            <!-- Make the thumbnail clickable to open gallery -->
            <img src="{{ Storage::url($product->thumbnail) }}"
                 class="w-full h-full object-cover rounded-[20px] cursor-pointer hover:opacity-90 transition-opacity"
                 alt="{{ $product->name }}"
                 onclick="openProductGallery({{ $product->id }})"
                 data-product-id="{{ $product->id }}">
        </div>
        <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                {{ $product->tagline }}
            </p>
            <div class="flex flex-col gap-[10px]">
                <h2 class="font-bold text-4xl leading-[45px]">{{ $product->name }}</h2>
                <p class="leading-[30px] text-cp-light-grey">{{ $product->about }}</p>
            </div>
            <a href="{{ route('front.appointment') }}"
                class="bg-cp-dark-red p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold text-white">
                Hubungi Kami
            </a>
        </div>
    </div>
    @empty
    <p>belum ada data</p>
    @endforelse
</div>

<!-- Product Gallery Modals -->
@foreach ($products as $product)
<div id="product-gallery-{{ $product->id }}" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-full bg-black bg-opacity-75">
    <div class="relative p-4 w-full max-w-6xl max-h-full mx-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ $product->name }} - Galeri Foto
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        onclick="closeProductGallery({{ $product->id }})">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body - Grid of images -->
            <div class="p-4 md:p-5">
                <div class="grid grid-cols-4 gap-2">
                    <!-- Main product thumbnail -->
                    <div class="relative group">
                        <img src="{{ Storage::url($product->thumbnail) }}"
                             class="w-full h-24 md:h-32 object-cover rounded-lg cursor-pointer hover:opacity-90"
                             alt="{{ $product->name }}"
                             onclick="openFullImage('{{ Storage::url($product->thumbnail) }}', '{{ $product->name }}')">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-6 md:w-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Product images -->
                    @foreach($product->images as $image)
                    <div class="relative group">
                        <img src="{{ Storage::url($image->image_path) }}"
                             class="w-full h-24 md:h-32 object-cover rounded-lg cursor-pointer hover:opacity-90"
                             alt="{{ $product->name }} - Image {{ $loop->iteration }}"
                             onclick="openFullImage('{{ Storage::url($image->image_path) }}', '{{ $product->name }} - Image {{ $loop->iteration }}')">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-6 md:w-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
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

<!-- Full Image Modal -->
<div id="fullImageModal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[60] justify-center items-center w-full inset-0 h-full bg-black bg-opacity-90">
    <div class="relative p-4 w-full h-full flex items-center justify-center">
        <!-- Close button -->
        <button type="button"
                class="absolute top-4 right-4 text-white bg-black bg-opacity-50 hover:bg-opacity-70 rounded-full p-2 inline-flex items-center justify-center z-10"
                onclick="closeFullImage()">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close image</span>
        </button>

        <!-- Full size image -->
        <img id="fullSizeImage" src="/placeholder.svg" alt="" class="max-h-[90vh] max-w-[90vw] object-contain">
    </div>
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
<script src="{{ asset('js/product-pop.js') }}"></script>
@endpush
