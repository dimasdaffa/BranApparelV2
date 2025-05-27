@extends('front.layouts.app')

@section('content')
    <div id="header" class="bg-slate-50 relative">
        <div class="container max-w-[1130px] mx-auto relative py-6 sm:py-10 px-4 z-10">
            <x-navbar />
        </div>
    </div>

    <div id="Products" class="bg-slate-50 min-h-screen">
        <div class="container max-w-[1130px] mx-auto px-4 sm:px-6 py-12 sm:py-16">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                @forelse ($baseproducts as $baseproduct)
                    <div
                        class="product-card bg-white border border-gray-200 rounded-xl overflow-hidden group cursor-pointer flex flex-col justify-between relative transition-all duration-300 ease-in-out shadow-md hover:shadow-xl focus-within:outline-none focus-within:ring-2 focus-within:ring-red-500 focus-within:ring-offset-2 focus-within:ring-offset-white focus-within:shadow-lg">

                        <div class="flex-grow">
                            {{-- Kontainer Gambar Produk --}}
                            <div class="relative w-full h-56 sm:h-60 md:h-64 overflow-hidden p-2 bg-white">
                                <div
                                    class="relative w-full h-full bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center p-2">
                                    <img src="{{ Storage::url($baseproduct->thumbnail) }}"
                                        class="product-image max-w-full max-h-full object-contain transition-transform duration-500 ease-out group-hover:scale-105"
                                        alt="{{ $baseproduct->name }}" onclick="openProductGallery({{ $baseproduct->id }})"
                                        data-product-id="{{ $baseproduct->id }}">
                                </div>

                            </div>

                            {{-- Detail Produk --}}
                            <div class="p-4 sm:px-5 sm:pb-5 bg-white relative">
                                {{-- Garis Aksen Merah --}}
                                <div
                                    class="absolute top-0 left-0 w-full h-[3px] bg-red-500 group-hover:bg-red-600 transition-colors duration-300">
                                </div>

                                <div class="pt-2 space-y-2.5">
                                    {{-- Judul Produk --}}
                                    <h3 class="font-semibold text-gray-800 text-base sm:text-lg leading-tight truncate group-hover:text-red-600 transition-colors duration-300"
                                        title="{{ $baseproduct->name }}">
                                        {{ $baseproduct->name }}
                                    </h3>

                                    {{-- Tagline (Harga Mulai Dari) --}}
                                    @if (isset($baseproduct->price) && $baseproduct->price > 0)
                                        <div
                                            class="badge-price-container bg-gray-800 w-fit text-white px-[0.65rem] py-1 sm:px-3 sm:py-1.5 rounded-md shadow">
                                            <span
                                                class="text-[0.65rem] sm:text-xs uppercase font-medium tracking-wide">Mulai
                                                Dari </span>
                                            <span class="font-bold text-[0.75rem] sm:text-sm text-red-400">Rp
                                                {{ number_format($baseproduct->price, 0, ',', '.') }}</span>
                                        </div>
                                    @elseif($baseproduct->tagline)
                                        <p
                                            class="badge w-fit bg-red-100 text-red-700 px-2.5 py-1 rounded-full font-medium text-xs sm:text-sm">
                                            {{ $baseproduct->tagline }}
                                        </p>
                                    @endif


                                    {{-- Deskripsi Produk --}}
                                    <p
                                        class="text-sm text-gray-600 leading-relaxed line-clamp-2 group-hover:text-gray-700 transition-colors duration-300">
                                        {{ $baseproduct->about }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Aksi di Bagian Bawah Kartu --}}
                        <div class="p-4 bg-white border-t border-gray-100 mt-auto">
                            <a href="{{ route('front.product') }}"><button onclick=""
                                    class="w-full bg-red-500 text-white font-semibold py-2.5 sm:py-3 px-4 uppercase tracking-wider text-xs sm:text-sm rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform hover:scale-105">
                                    Explore Product
                                </button></a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 sm:py-20">
                        <div class="max-w-lg mx-auto bg-white p-8 sm:p-12 border border-gray-200 rounded-xl shadow-lg">
                            <div class="w-20 h-20 mx-auto mb-8 relative flex items-center justify-center text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 opacity-70">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                </svg>
                                <div
                                    class="absolute inset-0 border-2 border-red-500/30 rounded-full animate-ping opacity-50">
                                </div>
                            </div>
                            <h3 class="text-xl sm:text-2xl font-semibold text-gray-700 mb-3 uppercase tracking-wider">Produk
                                Belum Tersedia</h3>
                            <div class="w-24 h-0.5 bg-red-400 mx-auto mb-6"></div>
                            <p class="text-gray-500 text-sm sm:text-base">Saat ini belum ada produk yang dapat ditampilkan.
                                Silakan kembali lagi nanti!</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <x-footer />
@endsection

@push('after-scripts')
    {{-- jQuery, Flickity, etc. --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ asset('js/modal-video.js') }}"></script>

    <script>
        // Placeholder for openProductGallery if not defined elsewhere
        function openProductGallery(productId) {
            console.log('Opening gallery for product ID:', productId);
            // Example: window.location.href = '/products/' + productId; // Or trigger a modal
        }
    </script>

    <style>
        /* CSS Kustom yang Dipertahankan (Minimal) */

        /* Animasi placeholder saat gambar dimuat */
        .product-image:not([src]),
        /* Target gambar yang belum ada src */
        .product-image[src=""] {
            /* Target gambar dengan src kosong */
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loadingPulse 1.8s infinite ease-in-out;
        }

        @keyframes loadingPulse {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* Scroll behavior global */
        html {
            scroll-behavior: smooth;
        }

        /*
      Jika Anda menggunakan @tailwindcss/line-clamp plugin di tailwind.config.js,
      Anda tidak memerlukan kelas .line-clamp-2 atau .line-clamp-3 di CSS kustom.
      Cukup gunakan kelas utilitas Tailwind seperti `line-clamp-2` langsung di HTML Anda.
      Saya sudah menggunakan `line-clamp-2` pada deskripsi produk di HTML.
    */
    </style>

<x-whatsapp/>
@endpush
