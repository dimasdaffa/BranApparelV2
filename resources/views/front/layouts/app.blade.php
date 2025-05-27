<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO Meta Tags --}}

    {{-- TITLE --}}
    {{-- Judul yang jelas: Nama Brand, Layanan Utama, Lokasi Asal (Pasar Utama) | Keunggulan. --}}
    {{-- Usahakan sekitar 60-70 karakter, namun prioritas pada informasi kunci. --}}
    <title>@yield('title', 'BranApparel: Custom Kaos & Jersey Ambarawa (Kab. Semarang) | Murah & Berkualitas')</title>

    {{-- META DESCRIPTION --}}
    {{-- Deskripsi menarik: Layanan, Lokasi Asal, Pasar Utama & Target Ekspansi, Keunggulan, Jangkauan Nasional. Sekitar 150-160 karakter. --}}
    <meta name="description" content="@yield('meta_description', 'Custom apparel berkualitas dari Ambarawa! BranApparel melayani Kab. Semarang (kaos, jersey, kemeja dll) & siap ekspansi ke Kota Semarang. Harga terjangkau, kualitas terjamin, kirim se-Indonesia.')">

    {{-- META KEYWORDS --}}
    {{-- Kata kunci yang relevan dengan layanan, lokasi spesifik, target pasar, dan atribut. --}}
    <meta name="keywords" content="@yield('meta_keywords', 'BranApparel, custom kaos ambarawa, custom jersey kab semarang, custom kemeja ambarawa, konveksi ambarawa, sablon kaos kab semarang, jersey printing, apparel custom, baju custom murah, kaos berkualitas, jersey kota semarang, custom baju semarang, vendor jersey semarang, kirim seluruh indonesia')">

    {{-- META AUTHOR --}}
    <meta name="author" content="BranApparel">

    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="@yield('og_title', 'BranApparel - Tempatnya Bikin Kaos Jersey Kemeja Murah Dan Berkualitas')">
    <meta property="og:description" content="@yield('og_description', 'Discover the latest trends in fashion with BranApparel.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'BranApparel - Tempatnya Bikin Kaos Jersey Kemeja Murah Dan Berkualitas')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Discover the latest trends in fashion with BranApparel.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/twitter-image.jpg'))">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    {{-- Existing CSS --}}
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/flickity@2/dist/flickity.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flickity-fade@2/flickity-fade.css" rel="stylesheet">
    @vite('resources/css/app.css')

    {{-- Structured Data / JSON-LD --}}
    @yield('structured_data')
</head>

<body class="font-poppins text-cp-black">
    {{-- Google Tag Manager --}}
    @if(config('app.env') === 'production')
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
    <!-- End Google Tag Manager -->
    @endif

    @yield('content')

    @stack('before-scripts')
    {{-- file js --}}
    @stack('after-scripts')

    {{-- Google Analytics --}}
    @if(config('app.env') === 'production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXXXXX');
    </script>
    @endif
</body>

</html>
