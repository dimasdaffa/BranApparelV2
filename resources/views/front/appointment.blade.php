@extends('front.layouts.app')

@section('content')
    {{-- Header Section --}}
    <div id="header" class="bg-[#F6F7FA] relative">
        <div class="container max-w-[1130px] mx-auto relative px-4 sm:px-6 pt-6 sm:pt-10 z-10">
            {{-- Reusable Navbar --}}
            <x-navbar />
        </div>
    </div>

    {{-- Contact Section --}}
    <div id="Contact"
        class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row justify-between gap-10 lg:gap-[50px] relative z-1 px-4 sm:px-6 py-8">

        {{-- Left Side: Contact Info & Title --}}
        <div class="flex flex-col gap-8 lg:gap-[50px] w-full lg:w-2/5 mt-0 lg:mt-12">
            <h1 class="font-extrabold text-3xl sm:text-4xl leading-tight sm:leading-[45px] text-gray-800">
                Custom Baju Impian dengan Sablon Terbaik
            </h1>
            <div class="flex flex-col gap-5 text-gray-700">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icons/global.svg') }}" alt="Lokasi Icon">
                    </div>
                    <p class="font-semibold text-base">Bandungan, Ambarawa</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icons/call.svg') }}" alt="Telepon Icon">
                    </div>
                    <p class="font-semibold text-base">+62 851-6280-8272</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icons/monitor-mobbile.svg') }}" alt="Website Icon">
                    </div>
                    <p class="font-semibold text-base">branapparel.com</p>
                </div>
            </div>
        </div>

        {{-- Right Side: Contact Form --}}
        <form action="{{ route('front.appointment_store') }}" method="POST"
            class="flex flex-col p-6 sm:p-8 rounded-2xl gap-5 bg-white shadow-[0_10px_30px_0_#D1D4DF40] w-full lg:w-3/5 shrink-0">
            @csrf

            {{-- Row 1: Nama Lengkap & Email --}}
            <div class="flex flex-col sm:flex-row items-start gap-5">
                <div class="flex flex-col gap-2 w-full">
                    <label for="name" class="font-semibold text-gray-700">Nama Lengkap</label>
                    <div class="flex items-center gap-3 p-4 border border-gray-200 focus-within:border-cp-dark-blue focus-within:ring-2 focus-within:ring-cp-dark-blue/30 transition-all duration-300 rounded-xl bg-gray-50">
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/icons/profile.svg') }}" alt="Profile Icon">
                        </div>
                        <input type="text" name="name" id="name"
                            class="appearance-none outline-none bg-transparent placeholder:font-normal placeholder:text-gray-400 font-semibold w-full text-gray-800"
                            placeholder="Tulis nama lengkap" required>
                    </div>
                </div>
                <div class="flex flex-col gap-2 w-full">
                    <label for="email" class="font-semibold text-gray-700">Email</label>
                    <div class="flex items-center gap-3 p-4 border border-gray-200 focus-within:border-cp-dark-blue focus-within:ring-2 focus-within:ring-cp-dark-blue/30 transition-all duration-300 rounded-xl bg-gray-50">
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/icons/sms.svg') }}" alt="Email Icon">
                        </div>
                        <input type="email" name="email" id="email"
                            class="appearance-none outline-none bg-transparent placeholder:font-normal placeholder:text-gray-400 font-semibold w-full text-gray-800"
                            placeholder="Alamat email Anda" required>
                    </div>
                </div>
            </div>

            {{-- Row 2: Nomor Telepon & Jadwal Bertemu --}}
            <div class="flex flex-col sm:flex-row items-start gap-5">
                <div class="flex flex-col gap-2 w-full">
                    <label for="phone_number" class="font-semibold text-gray-700">Nomor Telepon</label>
                    <div class="flex items-center gap-3 p-4 border border-gray-200 focus-within:border-cp-dark-blue focus-within:ring-2 focus-within:ring-cp-dark-blue/30 transition-all duration-300 rounded-xl bg-gray-50">
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/icons/call-black.svg') }}" alt="Telepon Icon">
                        </div>
                        <input type="tel" name="phone_number" id="phone_number"
                            class="appearance-none outline-none bg-transparent placeholder:font-normal placeholder:text-gray-400 font-semibold w-full text-gray-800"
                            placeholder="Whatsapp untuk dihubungi" required>
                    </div>
                </div>
                <div class="flex flex-col gap-2 w-full">
                    <label for="dateButton" class="font-semibold text-gray-700">Jadwal Bertemu</label>
                    <div class="relative flex items-center gap-3 p-4 border border-gray-200 focus-within:border-cp-dark-blue focus-within:ring-2 focus-within:ring-cp-dark-blue/30 transition-all duration-300 rounded-xl bg-gray-50">
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/icons/calendar.svg') }}" alt="Kalender Icon">
                        </div>
                        <button type="button" id="dateButton"
                            class="appearance-none outline-none bg-transparent font-semibold text-left w-full cursor-pointer text-gray-700 hover:text-cp-dark-blue">
                            Pilih Tanggal
                        </button>
                        <input type="date" name="meeting_at" id="dateInput" class="absolute opacity-0 -z-10 cursor-pointer w-full h-full top-0 left-0">
                    </div>
                </div>
            </div>

            {{-- Row 3: Pilihanmu & Perkiraan Biaya --}}
            <div class="flex flex-col sm:flex-row items-start gap-5">
                <div class="flex flex-col gap-2 w-full">
                    <label for="product_id" class="font-semibold text-gray-700">Pilihanmu</label>
                    <div class="relative flex items-center gap-3 p-4 border border-gray-200 focus-within:border-cp-dark-blue focus-within:ring-2 focus-within:ring-cp-dark-blue/30 transition-all duration-300 rounded-xl bg-gray-50">
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/icons/building-4-black.svg') }}" alt="Produk Icon">
                        </div>
                        <select name="product_id" id="product_id"
                            class="appearance-none outline-none w-full font-semibold bg-transparent text-gray-800 cursor-pointer"
                            required>
                            <option value="" hidden class="text-gray-400">Pilih Custom Baju</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" class="text-gray-800">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 w-full">
                    <label for="budget" class="font-semibold text-gray-700">Perkiraan Biaya</label>
                    <div class="flex items-center gap-3 p-4 border border-gray-200 focus-within:border-cp-dark-blue focus-within:ring-2 focus-within:ring-cp-dark-blue/30 transition-all duration-300 rounded-xl bg-gray-50">
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/icons/dollar-square.svg') }}" alt="Biaya Icon">
                        </div>
                        <input type="number" name="budget" id="budget"
                            class="appearance-none outline-none bg-transparent placeholder:font-normal placeholder:text-gray-400 font-semibold w-full text-gray-800"
                            placeholder="Estimasi biaya (IDR)" required>
                    </div>
                </div>
            </div>

            {{-- Row 4: Detail Pesanan --}}
            <div class="flex flex-col gap-2 w-full">
                <label for="brief" class="font-semibold text-gray-700">Detail Pesanan</label>
                <div class="flex gap-3 p-4 border border-gray-200 focus-within:border-cp-dark-blue focus-within:ring-2 focus-within:ring-cp-dark-blue/30 transition-all duration-300 rounded-xl bg-gray-50">
                    <div class="w-[18px] h-[18px] flex shrink-0 mt-[3px]">
                        <img src="{{ asset('assets/icons/message-text.svg') }}" alt="Pesan Icon">
                    </div>
                    <textarea name="brief" id="brief" rows="5"
                        class="appearance-none outline-none bg-transparent placeholder:font-normal placeholder:text-gray-400 font-semibold w-full resize-none text-gray-800"
                        placeholder="Jelaskan detail pesanan Anda di sini..."></textarea>
                </div>
            </div>

            {{-- Submit Button --}}
            <a href="https://wa.me/+6285162808272?text=Halo%20Admin%2C%20Saya%20ingin%20memesan%20produk%20di%20Bran%20Apparel"
                target="_blank" rel="noopener noreferrer"
                class="bg-cp-dark-red text-white font-bold py-3 sm:py-4 px-6 w-full rounded-xl hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 hover:shadow-[0_10px_25px_0_#25D366AA] transition-all duration-300 text-center text-base sm:text-lg mt-2">
                Hubungi Kami Melalui WhatsApp
            </a>
        </form>
    </div>

    <x-footer />
    <x-whatsapp/>
@endsection

@push('after-scripts')
    {{-- Pastikan path ke JS sudah benar dan cp-dark-blue, cp-dark-red terdefinisi di config Tailwind Anda jika Anda menggunakannya di JS --}}
    <script>
        // Simple script for date picker button
        const dateButton = document.getElementById('dateButton');
        const dateInput = document.getElementById('dateInput');

        if (dateButton && dateInput) {
            dateButton.addEventListener('click', () => {
                dateInput.click(); // Trigger click on hidden date input
            });

            dateInput.addEventListener('change', () => {
                if (dateInput.value) {
                    const selectedDate = new Date(dateInput.value);
                    const options = { year: 'numeric', month: 'long', day: 'numeric' };
                    dateButton.textContent = selectedDate.toLocaleDateString('id-ID', options);
                    dateButton.classList.remove('text-gray-700'); // Assuming default text color is gray
                    dateButton.classList.add('text-cp-dark-blue'); // Or your preferred color for selected date
                } else {
                    dateButton.textContent = 'Pilih Tanggal';
                    dateButton.classList.add('text-gray-700');
                    dateButton.classList.remove('text-cp-dark-blue');
                }
            });

            // Initialize button text if date is pre-filled (e.g. on form validation error)
            if (dateInput.value) {
                 const selectedDate = new Date(dateInput.value);
                 const options = { year: 'numeric', month: 'long', day: 'numeric' };
                 dateButton.textContent = selectedDate.toLocaleDateString('id-ID', options);
                 dateButton.classList.remove('text-gray-700');
                 dateButton.classList.add('text-cp-dark-blue');
            }
        }

        // Script for select placeholder color (optional, CSS handles basic state)
        const selects = document.querySelectorAll('select');
        selects.forEach(select => {
            function updateSelectColor() {
                if (select.value === "") {
                    select.classList.add('text-gray-400'); // Placeholder color
                    select.classList.remove('text-gray-800'); // Ensure selected color is removed
                } else {
                    select.classList.remove('text-gray-400');
                    select.classList.add('text-gray-800'); // Selected value color
                }
            }
            select.addEventListener('change', updateSelectColor);
            updateSelectColor(); // Initial check
        });

    </script>
    {{-- Original Scripts --}}
    {{-- <script src="{{ asset('js/contact-form.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    {{-- <script src="{{ asset('js/carousel.js') }}"></script> --}}
@endpush
