@extends('front.layouts.app')
@section('content')
<div id="header" class="bg-[#F6F7FA] relative h-[400px]">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        {{-- Navbar has been moved to OurPrinciples section --}}
    </div>
</div>

<div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[400px]">
    {{-- reusable navbar moved here --}}
    <x-navbar />

    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-[14px]">
            <p
                class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                OUR VALUES</p>
            <h2 class="font-bold text-4xl leading-[45px]">Kami Bukan Yang Pertama <br> Tetapi Kami Yang Terbaik</h2>
        </div>
        {{-- <a href="" class="bg-cp-darker-red p-[14px_20px] w-fit rounded-xl font-bold text-white">Selengkapnya</a> --}}
    </div>
    <div class="flex flex-wrap items-center gap-[30px] justify-center">

        @forelse ($principles as $principle)
            <div
                class="card w-[356.67px] flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
                <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
                    <img src="{{ Storage::url($principle->thumbnail) }}"
                        class="object-cover object-center w-full h-full" alt="thumbnails">
                </div>
                <div class="flex flex-col p-[0_30px_30px_30px] gap-5">
                    <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                        <img src="{{ Storage::url($principle->icon) }}" class="w-full h-full object-contain"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="title font-bold text-xl leading-[30px]">{{ $principle->name }}</p>
                        <p class="leading-[30px] text-cp-light-grey">{{ $principle->subtitle }}</p>
                    </div>
                    {{-- <a href="" class="font-semibold text-cp-dark-blue">Learn More</a> --}}
                </div>
            </div>
        @empty
            <p>belum ada data</p>
        @endforelse

    </div>
</div>

    <div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-[14px]">
                <p
                    class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                    GALLERY</p>
                <h2 class="font-bold text-4xl leading-[45px]">Lihat lebih dekat bagaimana kami<br>menghadirkan baju custom
                    berkualitas!</h2>
            </div>
            {{-- <a href=""
                class="bg-cp-darker-red p-[14px_20px] w-fit rounded-xl font-bold text-white">Selengkapnya</a> --}}
        </div>
        <div
            class="awards-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Produksi</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Setiap baju dibuat dengan ketelitian dan bahan berkualitas untuk hasil
                    terbaik.</p>
            </div>
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Desain</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Dari ide ke realitas! Kami wujudkan desain custom yang sesuai dengan Anda.
                </p>
            </div>
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Packing</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Dikemas dengan rapi dan aman, memastikan pesanan Anda sampai dalam kondisi
                    sempurna.</p>
            </div>
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="{{ asset('assets/icons/cup-red.svg') }}" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Quality Control</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Kami cek setiap detail agar hanya produk terbaik yang Anda terima!</p>
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
                    <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src=""
                        title="Demo Project Laravel Portfolio" frameborder="0"
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
