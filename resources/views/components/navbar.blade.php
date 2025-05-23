<nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3">
    <div class="flex items-center gap-3">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="assets/logo/logo.svg" class="object-contain w-full h-full" alt="logo">
        </div>
        <div class="flex flex-col">
            <p id="CompanyName" class="font-extrabold text-xl leading-[30px]">BranApparel</p>
            <p id="CompanyTagline" class="text-sm text-cp-light-grey">From Us to All Around The Worlds</p>
        </div>
    </div>
    <ul class="flex flex-wrap items-center gap-[30px]">
        <li class="{{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : '' }}
 font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.index') }}">Home</a>
        </li>
        <li class="{{ request()->routeIs('front.product') ? 'text-cp-dark-blue' : '' }}
 font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.product') }}">Products</a>
        </li>
        <li class="{{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : '' }}
 font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.team') }}">Portfolio</a>
        </li>
        <li class="{{ request()->routeIs('front.blog') ? 'text-cp-dark-blue' : '' }}
 font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.blog') }}">Blog</a>
        </li>
        <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="">Gallery</a>
        </li>
        <li class="{{ request()->routeIs('front.about') ? 'text-cp-dark-blue' : '' }}
 font-semibold hover:text-cp-dark-blue transition-all duration-300">
            <a href="{{ route('front.about') }}">About</a>
        </li>
    </ul>
    <a href="{{ route('front.appointment') }}"
        class="bg-cp-dark-red p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#FF0000] transition-all duration-300 font-bold text-white">Hubungi
        Kami</a>
</nav>