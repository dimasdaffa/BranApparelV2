@extends('front.layouts.app')
@section('content')
    <div id="header" class="bg-[#F6F7FA] relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            {{-- reusable navbar --}}
            <x-navbar />
            <div class="flex flex-col gap-[50px] items-center py-20">
                <div class="breadcrumb flex items-center justify-center gap-[30px]">
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
                    <span class="text-cp-light-grey">/</span>
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">FAQ</p>
                </div>
                <h1 class=" text-2xl leading-[45px] text-center">Bran Apparel merupakan perusahaan konveksi ternama di Indonesia yang melayani pembuatan produk Apparel custom seperti kaos, Jersey, kemeja, polo serta produk Apparel dan Merchandise lainnya yang menggunakan bahan terbaik sehingga menghasilkan produk yang berkualitas.<br/> Dengan harga yang irit, kami melayani pembuatan produk yang memiliki kualitas Wahid. Pelayanan optimal dan kualitas produk terbaik menjadi komitmen utama kami dalam mewujudkan #PastiPAS #PastiPUAS #SemuaBergaransi.
                </h1>
            </div>
        </div>
    </div>

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
    <x-footer/>

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
