<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dev Sadi</title>

    <meta name="keywords"
        content="Annie Wu, Annie Wu Portfolio, Annie Wu Photography, photographer, developer, java, python, html, css, javascript, web developer, webdev, portfolio, quality assurance, qa engineer, quality assurance engineer">
    <meta name="robots" content="noindex, nofollow" />

    <link rel="canonical" href="https://anniew.xyz" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('css/website/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/header.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/home.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/project.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/website/footer.css') }}" type="text/css">
    {{-- @vite(['resources/js/app.js', ['resources/css/app.css']]) --}}
    @vite(['resources/js/app.js'])
    @livewireStyles

</head>

<body>

    @include('livewire.navbar')

    <main class="main-container home-section">
        {{ $slot }}
    </main>


    <footer class="footer-container">
        @include('components.layouts.footer')
    </footer>


    {{-- Scripts pacess --}}
    {{-- <script src="{{ asset('min') }}"></script> --}}
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
    @livewireScripts
</body>

</html>
