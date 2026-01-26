@php
    $sources = isset($sources) ? $sources : [];
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    @viteReactRefresh
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>GLAMFIT | Ropa Deportiva y Fitness con Estilo</title>
    <meta name="description"
        content="Descubre GLAMFIT: Ropa deportiva con estilo y glamour para el gimnasio y más. Encuentra las mejores prendas para entrenar con actitud y comodidad.">
    <meta name="keywords"
        content="GLAMFIT, ropa deportiva, fitness, ropa de gimnasio, moda deportiva, leggings, tops deportivos, entrenamiento">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="GLAMFIT | Ropa Deportiva y Fitness con Estilo">
    <meta property="og:description"
        content="Entrena con actitud y comodidad. Descubre nuestra colección exclusiva de ropa deportiva GLAMFIT.">
    <meta property="og:image" content="{{ asset('images/glamfit/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="GLAMFIT | Ropa Deportiva y Fitness con Estilo">
    <meta property="twitter:description"
        content="Entrena con actitud y comodidad. Descubre nuestra colección exclusiva de ropa deportiva GLAMFIT.">
    <meta property="twitter:image" content="{{ asset('images/glamfit/logo.png') }}">

    <meta NAME="classification" content="moda">
    <meta NAME="contactcity" content="Peru">
    <meta NAME="contactname" content="GLAMFIT">
    <meta NAME="contactstate" content="Peru">
    <meta NAME="copyright" content="GLAMFIT">
    <meta NAME="createdate" content="2024">
    <meta NAME="distribution" content="GLOBAL">
    <meta NAME="language" content="es-pe">
    <meta NAME="Owner" content="GLAMFIT">
    <meta NAME="rating" content="SAFE FOR KIDS">
    <meta NAME="revisit-after" content="2 Days">
    <meta name="robots" content="index,follow" />
    <meta name="robots" content="all" />
    <meta NAME="subjects" content="moda">

    <link rel="icon" type="image/png" href="{{ asset('images/glamfit/icon.png') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @vite([...$sources, 'resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{--
    <script src="https://cdn.sode.me/extends/notify.extend.min.js"></script> --}}
    {{-- public\js\notify.extend.min.js --}}


    <script src="{{ asset('js/notify.extend.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- Aqui van los CSS --}}
    @yield('css_importados')

    {{-- Swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="/js/tippy.all.min.js"></script>
    <script src="/js/cookies.extend.js"></script>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
        const appUrl = "{{ asset('/') }}";
    </script>
    <script src="{{ asset('js/functions.js') }}?v={{ uniqid() }}"></script>
    <style>
        .select2-container .select2-selection--single {
            margin-top: 0.25rem;
            /* mt-1 */
            background-color: #F9FAFB;
            /* bg-gray-50 */
            border: 1px solid #D1D5DB;
            /* border-gray-300 */
            color: #111827;
            /* text-gray-900 */
            border-radius: 0.5rem;
            /* rounded-lg */
            padding-left: 2.5rem;
            /* pl-10 */
            padding: 7px 14px;
            /* p-2.5 */
            height: unset;
            font-size: 0.875rem;
            /* text-sm */
        }

        .select2-container--open .select2-dropdown--below {
            border-color: #D1D5DB;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #111827;
            /* text-gray-900 */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 1rem;
            /* align with pl-10 */
        }

        .select2-container--default .select2-selection--single:focus {
            border-color: #9B51E0;
            /* focus:border-glamfit-purple */
            box-shadow: 0 0 0 3px rgba(155, 81, 224, 0.5);
            /* focus:ring-glamfit-purple */
        }

        /* Dark mode styles */
        .dark .select2-container .select2-selection--single {
            background-color: #374151;
            /* dark:bg-gray-700 */
            border-color: #4B5563;
            /* dark:border-gray-600 */
            color: #F9FAFB;
            /* dark:text-white */
        }

        .dark .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #F9FAFB;
            /* dark:text-white */
        }

        .dark .select2-container--default .select2-selection--single:focus {
            border-color: #9B51E0;
            /* dark:focus:border-glamfit-purple */
            box-shadow: 0 0 0 3px rgba(155, 81, 224, 0.5);
            /* dark:focus:ring-glamfit-purple */
        }

        /* Adjust the width to match Tailwind CSS block w-full */
        .select2-container {
            width: 100% !important;
            /* block w-full */
        }
    </style>

    @include('components.shortcode.contain_head')
</head>

<body class="body overflow-x-hidden">

    @include('components.shortcode.contain_body')

    <div class="overlay"></div>
    @include('components.public.header')

    <div class="main">
        {{-- Aqui va el contenido de cada pagina --}}
        @yield('content')

    </div>



    @include('components.public.footer')



    @yield('scripts_importados')
    {{-- @vite(['resources/js/functions.js']) --}}


    {{--
    <script>
        tippy('[tippy]', {
            arrow: true
        })
    </script> --}}
</body>

</html>