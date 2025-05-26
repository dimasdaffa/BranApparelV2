<nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3 relative">
    <!-- Logo Section -->
    <div class="flex items-center gap-3">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="assets/logo/logo.svg" class="object-contain w-full h-full " alt="logo">
        </div>
        <div class="flex flex-col">
            <p id="CompanyName" class="font-extrabold text-xl leading-[30px]">BranApparel</p>
            <p id="CompanyTagline" class="text-sm text-cp-light-grey">From Us to All Around The Worlds</p>
        </div>
    </div>

    <!-- Desktop Navigation -->
    <ul class="hidden lg:flex flex-wrap items-center gap-[30px]">
        <li class="{{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.index') }}">Home</a>
        </li>
        <li class="{{ request()->routeIs('front.baseproduct') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.baseproduct') }}">Products</a>
        </li>
        <li class="{{ request()->routeIs('front.product') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.product') }}">Portofolio</a>
        </li>
        <li class="{{ request()->routeIs('front.gallery') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.gallery') }}">Gallery</a>
        </li>
        <li class="{{ request()->routeIs('front.faq') ? 'text-cp-dark-blue' : '' }} font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.faq') }}">FAQ</a>
        </li>
    </ul>

    <!-- Desktop CTA Button -->
    <a href="{{ route('front.appointment') }}"
        class="hidden lg:block bg-cp-dark-red p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold text-white">
        Hubungi Kami
    </a>

    <!-- Mobile Hamburger Button -->
    <button id="mobile-menu-toggle" class="lg:hidden flex flex-col justify-center items-center w-8 h-8 space-y-1.5">
        <span class="block w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out transform origin-center" id="line1"></span>
        <span class="block w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out" id="line2"></span>
        <span class="block w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out transform origin-center" id="line3"></span>
    </button>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-99 hidden">
        <div class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out" id="mobile-menu-panel">
            <!-- Mobile Menu Header -->
            <div class="flex items-center justify-between p-6 border-b">
                <div class="flex items-center gap-3">
                    <div class="flex shrink-0 h-[35px] overflow-hidden">
                        <img src="assets/logo/logo.svg" class="object-contain w-full h-full" alt="logo">
                    </div>
                    <div class="flex flex-col">
                        <p class="font-extrabold text-lg leading-[24px]">BranApparel</p>
                    </div>
                </div>
                <button id="mobile-menu-close" class="p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Items -->
            <div class="flex flex-col p-6 space-y-4">
                <a href="{{ route('front.index') }}"
                    class="{{ request()->routeIs('front.index') ? 'text-cp-dark-blue bg-blue-50' : '' }} block p-3 rounded-lg font-semibold hover:text-cp-dark-blue hover:bg-blue-50 transition-all duration-300">
                    Home
                </a>
                <a href="{{ route('front.baseproduct') }}"
                    class="{{ request()->routeIs('front.baseproduct') ? 'text-cp-dark-blue bg-blue-50' : '' }} block p-3 rounded-lg font-semibold hover:text-cp-dark-blue hover:bg-blue-50 transition-all duration-300">
                    Products
                </a>
                <a href="{{ route('front.product') }}"
                    class="{{ request()->routeIs('front.product') ? 'text-cp-dark-blue bg-blue-50' : '' }} block p-3 rounded-lg font-semibold hover:text-cp-dark-blue hover:bg-blue-50 transition-all duration-300">
                    Portofolio
                </a>
                <a href="{{ route('front.gallery') }}"
                    class="{{ request()->routeIs('front.gallery') ? 'text-cp-dark-blue bg-blue-50' : '' }} block p-3 rounded-lg font-semibold hover:text-cp-dark-blue hover:bg-blue-50 transition-all duration-300">
                    Gallery
                </a>
                <a href="{{ route('front.faq') }}"
                    class="{{ request()->routeIs('front.faq') ? 'text-cp-dark-blue bg-blue-50' : '' }} block p-3 rounded-lg font-semibold hover:text-cp-dark-blue hover:bg-blue-50 transition-all duration-300">
                    FAQ
                </a>

                <!-- Mobile CTA Button -->
                <a href="{{ route('front.appointment') }}"
                    class="bg-cp-dark-red p-[14px_20px] text-center rounded-xl hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold text-white mt-6">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuPanel = document.getElementById('mobile-menu-panel');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const line1 = document.getElementById('line1');
    const line2 = document.getElementById('line2');
    const line3 = document.getElementById('line3');

    function openMobileMenu() {
        mobileMenu.classList.remove('hidden');
        setTimeout(() => {
            mobileMenuPanel.classList.remove('translate-x-full');
        }, 10);

        // Animate hamburger to X
        line1.classList.add('rotate-45', 'translate-y-2');
        line2.classList.add('opacity-0');
        line3.classList.add('-rotate-45', '-translate-y-2');

        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        mobileMenuPanel.classList.add('translate-x-full');
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
        }, 300);

        // Animate X back to hamburger
        line1.classList.remove('rotate-45', 'translate-y-2');
        line2.classList.remove('opacity-0');
        line3.classList.remove('-rotate-45', '-translate-y-2');

        document.body.style.overflow = 'auto';
    }

    mobileMenuToggle.addEventListener('click', openMobileMenu);
    mobileMenuClose.addEventListener('click', closeMobileMenu);

    // Close menu when clicking overlay
    mobileMenu.addEventListener('click', function(e) {
        if (e.target === mobileMenu) {
            closeMobileMenu();
        }
    });

    // Close menu when clicking on menu links
    const mobileMenuLinks = mobileMenuPanel.querySelectorAll('a');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });
});
</script>
