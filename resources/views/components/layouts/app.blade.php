<!DOCTYPE html>
<html lang="en">

<head>
    <title>Annie Wu</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <meta charset="UTF-8">

    <meta property="og:title" content="Annie Wu" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://anniew.xyz" />
    <meta property="og:description" content="Hi! I'm Annie." />
    <meta property="og:locale" content="en_US" />
    <meta property="og:image" content="https://anniew.xyz/img/me-icon-smiling.png" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Annie Wu">
    <meta name="twitter:description" content="Hi! I'm Annie.">
    <meta name="twitter:image" content="https://anniew.xyz/img/me-icon-smiling.png">
    <meta name="twitter:site" content="@anniedotexe">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="Annie Wu">
    <meta name="description" content="Hi! I'm Annie.">
    <meta name="keywords"
        content="Annie Wu, Annie Wu Portfolio, Annie Wu Photography, photographer, developer, java, python, html, css, javascript, web developer, webdev, portfolio, quality assurance, qa engineer, quality assurance engineer">
    <meta name="robots" content="noindex, nofollow" />

    <link rel="canonical" href="https://anniew.xyz" />

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


    <footer class="footer-container">
        @include('components.layouts.footer')
    </footer>


    {{-- Scripts pacess --}}
    {{-- <script src="{{ asset('min') }}"></script> --}}
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
    @livewireScripts
</body>

</html>
