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
    {{-- <div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">

        @forelse ($abouts as $about)
            <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">
                <div class="w-[470px] h-[550px] flex shrink-0 overflow-hidden">
                    <img src="{{Storage::url($about->thumbnail)}}" class="w-full h-full object-contain"
                        alt="thumbnail">
                </div>
                <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
                    <p
                        class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                        OUR {{$about->type}}</p>
                    <div class="flex flex-col gap-[10px]">
                        <h2 class="font-bold text-4xl leading-[45px]">{{ $about->name }}</h2>
                        <div class="flex flex-col gap-5">

                            @forelse ($about->keypoints as $keypoint)
                                <div class="flex items-center gap-[10px]">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="assets/icons/tick-circle.svg" alt="icon">
                                    </div>
                                    <p class="leading-[26px] font-semibold">{{$keypoint->keypoint}}</p>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

    </div> --}}
    {{-- <div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
        <h2 class="font-bold text-lg">Partner Langganan Kami</h2>
        <div class="logo-container flex flex-wrap gap-5 justify-center">
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-54.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-52.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-55.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-44.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-51.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-55.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-52.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-54.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="assets/logo/logo-51.svg" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div id="Stats" class="bg-cp-darker-red w-full mt-20">
        <div class="container max-w-[1000px] mx-auto py-10">
            <div class="flex flex-wrap items-center justify-between p-[10px]">
                @forelse ($statistics as $statistic)
                    <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                        <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                            <img src="{{ Storage::url($statistic->icon) }}" class="object-contain w-full h-full"
                                alt="icon">
                        </div>
                        <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">{{ $statistic->goal }}</p>
                        <p class="text-cp-light-grey">{{ $statistic->name }}</p>
                    </div>
                @empty
                    <p>belum ada data</p>
                @endforelse

            </div>
        </div>
    </div> --}}
    {{-- </div>
    <div id="Awards" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-[14px]">
                <p
                    class="badge w-fit bg-cp-pale-blue text-cp-light-red p-[8px_16px] rounded-full uppercase font-bold text-sm">
                    GALLERY</p>
                <h2 class="font-bold text-4xl leading-[45px]">Lihat lebih dekat bagaimana kami<br>menghadirkan baju custom berkualitas!</h2>
            </div>
            <a href="" class="bg-cp-darker-red p-[14px_20px] w-fit rounded-xl font-bold text-white">Selengkapnya</a>
        </div>
        <div class="awards-card-container grid grid-cols-4 gap-[30px] justify-center">
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="assets/icons/cup-red.svg" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Produksi</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Setiap baju dibuat dengan ketelitian dan bahan berkualitas untuk hasil terbaik.</p>
            </div>
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="assets/icons/cup-red.svg" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Desain</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Dari ide ke realitas! Kami wujudkan desain custom yang sesuai dengan Anda.</p>
            </div>
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="assets/icons/cup-red.svg" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Packing</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Dikemas dengan rapi dan aman, memastikan pesanan Anda sampai dalam kondisi sempurna.</p>
            </div>
            <div
                class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="assets/icons/cup-red.svg" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">Proses Quality Control</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">Kami cek setiap detail agar hanya produk terbaik yang Anda terima!</p>
            </div>
        </div>
    </div> --}}

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
@endsection
