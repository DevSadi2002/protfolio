<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title ?? 'Dev.Sadi' }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <meta charset="UTF-8">
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Dev.Sadi – Full Stack Web Developer" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://devsadi.com" />
    <meta property="og:description"
        content="Hi! I'm Dev.Sadi, a passionate Full Stack Web Developer specializing in Laravel and modern web technologies." />
    <meta property="og:locale" content="en_US" />
    <meta property="og:image" content="https://devsadi.com/img/profile.png" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Dev.Sadi – Full Stack Web Developer">
    <meta name="twitter:description"
        content="Hi! I'm Dev.Sadi, a passionate Full Stack Web Developer specializing in Laravel and modern web technologies.">
    <meta name="twitter:image" content="https://devsadi.com/img/profile.png">
    <meta name="twitter:site" content="@DevSadi">

    <!-- General Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="Dev.Sadi">
    <meta name="description"
        content="Hi! I'm Dev.Sadi, a Full Stack Web Developer. I build responsive and modern websites using Laravel, Livewire, and more.">
    <meta name="keywords"
        content="Dev.Sadi, Web Developer, Laravel, Livewire, Full Stack, HTML, CSS, JavaScript, PHP, Portfolio, QA Engineer">

    <!-- SEO / Robots -->
    <meta name="robots" content="index, follow">

    {{-- <link rel="canonical" href="https://anniew.xyz" /> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('css/website/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/css/header.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/css/about.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/css/home.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/css/projects.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/css/footer.css') }}" type="text/css">
    {{-- @vite(['resources/js/app.js', ['resources/css/app.css']]) --}}
    @vite(['resources/js/app.js'])
    @livewireStyles

</head>

<body>

    @include('livewire.navbar')


    {{ $slot }}


    @include('components.layouts.footer')


    {{-- Scripts pacess --}}
    {{-- <script src="{{ asset('min') }}"></script> --}}
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
    @livewireScripts
</body>

</html>
