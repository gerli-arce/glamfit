@php
  $component = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="language" content="es">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{--
  <meta name="description"
    content="Somos especialistas en Wall Panel, mármol UV, piedra PU y otros productos para ti. Confía en la calidad de Deco TAB y dale otro estilo a tu ambiente favorito.">
  --}}
  <title>GLAMFIT | Entrena con Estilo</title>
  <meta name="description" content="Descubre GLAMFIT: Ropa deportiva con estilo y glamour para el gimnasio y más.">
  <meta name="keywords" content="GLAMFIT, ropa deportiva, fitness, gym, moda">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="GLAMFIT | Entrena con Estilo">
  <meta property="og:description" content="Ropa deportiva con estilo y glamour para el gimnasio y más.">
  <meta property="og:image" content="{{ asset('images/glamfit/logo.png') }}">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  @vite(['resources/js/' . $component, 'resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

  <link rel="icon" type="image/png" href="{{ asset('images/glamfit/icon.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

  {{-- Aqui van los CSS --}}
  @yield('css_importados')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  {{-- Swipper --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  {{-- Alpine --}}
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  {{-- Sweet Alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="/js/tippy.all.min.js"></script>

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <style>
    .select2-container .select2-selection--single,
    .select2-container .select2-selection--multiple {
      margin-top: 0.25rem;
      /* mt-1 */
      background-color: #F9FAFB;
      /* bg-gray-50 */
      border: 1px solid #D1D5DB !important;
      /* border-gray-300 */
      color: #111827;
      /* text-gray-900 */
      border-radius: 0.5rem;
      /* rounded-lg */
      /* padding-left: 2.5rem; */
      /* pl-10 */
      padding: 8px;
      /* p-2.5 */
      height: unset;
      font-size: 0.875rem;
      /* text-sm */
    }

    .select2-container--open .select2-dropdown--below {
      border-color: #D1D5DB;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered,
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
      color: #111827;
      /* text-gray-900 */
      display: flex;
      flex-wrap: wrap;
      gap: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow,
    .select2-container--default .select2-selection--multiple .select2-selection__arrow {
      height: 100%;
      right: 1rem;
      /* align with pl-10 */
    }

    .select2-container--default .select2-selection--single:focus,
    .select2-container--default .select2-selection--multiple:focus {
      border-color: #9B51E0;
      /* focus:border-glamfit-purple */
      box-shadow: 0 0 0 3px rgba(155, 81, 224, 0.5);
      /* focus:ring-glamfit-purple */
    }

    .dark .select2-container .select2-selection--single,
    .dark .select2-container .select2-selection--multiple {
      background-color: #374151;
      /* dark:bg-gray-700 */
      border-color: #4B5563;
      /* dark:border-gray-600 */
      color: #F9FAFB;
      /* dark:text-white */
    }

    .dark .select2-container--default .select2-selection--single .select2-selection__rendered,
    .dark .select2-container--default .select2-selection--multiple .select2-selection__rendered {
      color: #F9FAFB;
      /* dark:text-white */
    }

    .dark .select2-container--default .select2-selection--single:focus,
    .dark .select2-container--default .select2-selection--multiple:focus {
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

    /* Additional styles for multiple select */
    .select2-container .select2-selection--multiple .select2-selection__choice {
      background-color: #9B51E0;
      /* bg-glamfit-purple */
      border: 1px solid #7856C8;
      /* border-glamfit-purple-dark */
      color: #FFFFFF;
      /* text-white */
      border-radius: 0.25rem;
      /* rounded */
      /* margin-right: 0.25rem; mr-1 */
      margin-top: 0;
      margin-left: 0;
      padding: 0.25rem 0.5rem 0.25rem 1.25rem;
      /* p-1 px-2 */
    }

    .dark .select2-container .select2-selection--multiple .select2-selection__choice {
      background-color: #7856C8;
      /* dark:bg-glamfit-purple-dark */
      border: 1px solid #7856C8;
      /* dark:border-glamfit-purple-dark */
      color: #F9FAFB;
      /* dark:text-white */
    }

    .select2-container .select2-selection--multiple .select2-selection__choice__remove {
      cursor: pointer;
      color: #FFFFFF;
      cursor: pointer;
      top: 0;
      left: 0;
      bottom: 0;
    }

    .dark .select2-container .select2-selection--multiple .select2-selection__choice__remove {
      color: #F9FAFB;
      /* dark:text-white */
    }

    .select2-container .select2-selection--multiple .select2-selection__choice__remove:hover {
      color: #EF4444;
      /* hover:text-red-500 */
    }

    .dark .select2-container .select2-selection--multiple .select2-selection__choice__remove:hover {
      color: #F87171;
      /* dark:hover:text-red-400 */
    }

    .select2-container .select2-selection--multiple .select2-search__field {
      /* padding: 0.5rem; */
      /* p-2 */
      /* margin-left: 0.25rem; */
      margin-left: 0;
      padding: 0;
      display: inline-block;
      height: 22px;
      margin-top: 0;
      /* ml-1 */
    }
  </style>


</head>

<body class="body">
  <div class="overlay"></div>
  <x-public.header />
  @inertia
  <x-public.footer />

  <script src="{{ asset('js/functions.js') }}?v={{ uniqid() }}"></script>
</body>

</html>