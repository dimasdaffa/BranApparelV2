<footer class="bg-cp-darker-red w-full relative overflow-hidden mt-20">
    <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row lg:flex-wrap gap-8 lg:gap-y-4 lg:items-center lg:justify-between pt-[50px] lg:pt-[100px] pb-[100px] lg:pb-[220px] relative z-10 px-4 lg:px-0">

        <!-- Company Info Section -->
        <div class="flex flex-col gap-6 lg:gap-10 text-center lg:text-left">
            <!-- Logo and Company Name -->
            <div class="flex items-center gap-3 justify-center lg:justify-start">
                <div class="flex shrink-0 h-[35px] lg:h-[43px] overflow-hidden">
                    <img src="assets/logo/logo.svg" class="object-contain w-full h-full" alt="logo">
                </div>
                <div class="flex flex-col">
                    <p id="CompanyName" class="font-extrabold text-lg lg:text-xl leading-[24px] lg:leading-[30px] text-white">BranApparel</p>
                    <p id="CompanyTagline" class="text-xs lg:text-sm text-cp-light-grey">From Us to All Around The Worlds</p>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="flex items-center gap-4 justify-center lg:justify-start">
                <a href="https://wa.me/+6285162808272?text=Halo%20Admin%2C%20Saya%20ingin%20memesan%20produk%20di%20Bran%20Apparel"
                   class="hover:scale-110 transition-transform duration-300">
                    <div class="w-8 h-8 lg:w-6 lg:h-6 flex shrink-0 overflow-hidden">
                        <img src="assets/icons/whatsapp.svg" class="w-full h-full object-contain" alt="whatsapp">
                    </div>
                </a>
                <a href="" class="hover:scale-110 transition-transform duration-300">
                    <div class="w-8 h-8 lg:w-6 lg:h-6 flex shrink-0 overflow-hidden">
                        <img src="assets/icons/facebook.svg" class="w-full h-full object-contain" alt="facebook">
                    </div>
                </a>
                <a href="https://www.instagram.com/branapparell?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                   class="hover:scale-110 transition-transform duration-300">
                    <div class="w-8 h-8 lg:w-6 lg:h-6 flex shrink-0 overflow-hidden">
                        <img src="assets/icons/instagram.svg" class="w-full h-full object-contain" alt="instagram">
                    </div>
                </a>
            </div>
        </div>

        <!-- Footer Links Section -->
        <div class="flex flex-col lg:flex-row lg:flex-wrap gap-8 lg:gap-[50px] w-full lg:w-auto">
            <!-- Products Column -->
            <div class="flex flex-col w-full lg:w-[200px] gap-3 text-center lg:text-left">
                <p class="font-bold text-base lg:text-lg text-white">Products</p>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    General Contract
                </a>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    Clothing Design
                </a>
            </div>

            <!-- About Column -->
            <div class="flex flex-col w-full lg:w-[200px] gap-3 text-center lg:text-left">
                <p class="font-bold text-base lg:text-lg text-white">About</p>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    We're Hiring
                </a>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    Our Big Purposes
                </a>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    Investor Relations
                </a>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    Media Press
                </a>
            </div>

            <!-- Useful Links Column -->
            <div class="flex flex-col w-full lg:w-[200px] gap-3 text-center lg:text-left">
                <p class="font-bold text-base lg:text-lg text-white">Useful Links</p>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    Privacy & Policy
                </a>
                <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    Terms & Conditions
                </a>
                <a href="contact.html" class="text-cp-light-grey hover:text-white transition-all duration-300 text-sm lg:text-base">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Background Text -->
    <div class="absolute -bottom-[50px] lg:-bottom-[135px] w-full">
        <p class="font-extrabold text-[80px] lg:text-[250px] leading-[120px] lg:leading-[375px] text-center text-white opacity-5">
            BranApparel
        </p>
    </div>
</footer>

<!-- Additional CSS for better mobile experience -->
<style>
/* Mobile-specific adjustments */
@media (max-width: 1023px) {
    footer {
        text-align: center;
    }

    /* Better spacing for mobile footer */
    footer .container {
        align-items: center;
    }

    /* Ensure proper stacking on mobile */
    footer .flex.flex-col.lg\:flex-row {
        width: 100%;
    }

    /* Better touch targets for social media */
    footer a {
        display: inline-block;
        padding: 0.25rem;
    }
}

/* Tablet adjustments */
@media (min-width: 640px) and (max-width: 1023px) {
    footer .flex.flex-col.lg\:flex-row.lg\:flex-wrap {
        flex-direction: row;
        justify-content: space-around;
        text-align: left;
    }

    footer .flex.flex-col.w-full.lg\:w-\[200px\] {
        width: auto;
        flex: 1;
        min-width: 150px;
    }
}

/* Background text responsive sizing */
@media (max-width: 640px) {
    footer .absolute p {
        font-size: 60px;
        line-height: 90px;
        bottom: -30px;
    }
}

/* Better hover effects */
footer a:hover {
    transform: translateY(-1px);
}

footer .w-8.h-8:hover {
    transform: scale(1.1);
}

/* Ensure proper z-index layering */
footer .relative.z-10 {
    position: relative;
    z-index: 10;
}

footer .absolute {
    z-index: 1;
}
</style>
