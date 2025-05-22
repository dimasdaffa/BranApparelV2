@extends('front.layouts.app')
@section('content')
    <div id="header" class="bg-[#F6F7FA] relative h-[600px] -mb-[388px]">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            {{-- reusable navbar --}}
         <x-navbar/>
        </div>
    </div>
    <div id="Teams" class="w-full px-[10px] relative z-10">
        <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center">
            <div class="flex flex-col gap-[50px] items-center">
                <div class="breadcrumb flex items-center justify-center gap-[30px]">
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
                    <span class="text-cp-light-grey">/</span>
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Portfolio</p>
                </div>
                <h2 class="font-bold text-4xl leading-[45px] text-center">Kami Adalah Partner Terbaik
                </h2>
            </div>
            <div
                class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">

                @forelse ($teams as $team)
                    <div
                        class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
                        <div
                            class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                            <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                                <img src="{{ Storage::url($team->avatar) }}"
                                    class="object-cover w-full h-full object-center" alt="photo">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-center">
                            <p class="font-bold text-xl leading-[30px]">{{ $team->name }}</p>
                            <p class="text-cp-light-grey">{{ $team->occupation }}</p>
                        </div>
                        <div class="flex items-center justify-center gap-[10px]">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="assets/icons/global.svg" alt="icon">
                            </div>
                            <p class="font-semibold">{{$team->location}}</p>
                        </div>
                    </div>
                @empty
                    <p>belum ada data</p>
                @endforelse
            </div>
        </div>
        <div id="Stats" class="bg-cp-darker-red w-full mt-20">
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
        </div>
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
            <div
                class="awards-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
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
        </div>
        <x-footer />
    @endsection
