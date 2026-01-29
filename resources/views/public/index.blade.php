@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop

@php
    $bannersBottom = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'inferior';
    });
    $bannerMid = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'medio';
    });
@endphp

<style>
    @media (max-width: 600px) {
        .fixedWhastapp {
            right: 13px !important;
        }
    }

    .claseocultar {
        display: none;
    }

    .swiper-pagination-slider .swiper-pagination-bullet {
        width: 15px;
        height: 15px;
        background-color: #E91E63 !important;
        border: 2px solid #E91E63;
    }

    .swiper-pagination-slider .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
        background-color: white !important;
        border: 2px solid black;
        opacity: 1;
    }

    .swiper-pagination-cat .swiper-pagination-bullet {
        width: 15px;
        height: 15px;
        background-color: #E91E63 !important;
        border: 2px solid #E91E63;
    }

    .swiper-pagination-cat .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
        background-color: white !important;
        border: 2px solid black;
        opacity: 1;
    }

    .swiper-pagination-promo .swiper-pagination-bullet {
        width: 15px;
        height: 15px;
        background-color: #E91E63 !important;
        border: 2px solid #E91E63;
    }

    .swiper-pagination-promo .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
        background-color: white !important;
        border: 2px solid black;
        opacity: 1;
    }

    .swiper-pagination-otrasmarcas .swiper-pagination-bullet {
        width: 15px;
        height: 15px;
        background-color: #E91E63 !important;
        border: 2px solid #E91E63;
    }

    .swiper-pagination-otrasmarcas .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
        background-color: white !important;
        border: 2px solid black;
        opacity: 1;
    }

    .swiper-pagination-complementos .swiper-pagination-bullet {
        width: 15px;
        height: 15px;
        background-color: #E91E63 !important;
        border: 2px solid #E91E63;
    }

    .swiper-pagination-complementos .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
        background-color: white !important;
        border: 2px solid black;
        opacity: 1;
    }

    .swiper-pagination-logos-destacados .swiper-pagination-bullet {
        width: 15px;
        height: 15px;
        background-color: #E91E63 !important;
        border: 2px solid #E91E63;
    }

    .swiper-pagination-logos-destacados .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
        background-color: white !important;
        border: 2px solid black;
        opacity: 1;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animated-item {
        animation: slideIn 0.4s ease-out forwards;
        opacity: 0;
    }

    .animated-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .animated-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    .animated-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    .animated-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    .animated-item:nth-child(5) {
        animation-delay: 0.5s;
    }

    :root {
        --glamfit-accent: #7D6AB8;
        --glamfit-accent-dark: #6B5AA8;
        --glamfit-soft: #F4EEF9;
        --glamfit-soft-border: #E6DFF1;
    }

    .glamfit-pill {
        background: var(--glamfit-soft);
        border: 1px solid var(--glamfit-soft-border);
        border-radius: 9999px;
        padding: 0.65rem 2.5rem;
        font-weight: 700;
        color: #2E2E2E;
        box-shadow: 0 12px 30px rgba(33, 14, 82, 0.08);
    }

    .glamfit-plus-btn {
        width: 34px;
        height: 34px;
        border-radius: 9999px;
        background: var(--glamfit-accent);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 20px rgba(125, 106, 184, 0.35);
    }

    .glamfit-chip {
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid #E8E1F3;
        color: #4B3E77;
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-weight: 600;
    }

    .glamfit-featured-card {
        background: #fff;
        border: 1px solid #EFE7F7;
        border-radius: 22px;
        padding: 10px;
        box-shadow: 0 14px 28px rgba(40, 20, 82, 0.08);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .glamfit-featured-media {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        background: #F4F4F7;
        aspect-ratio: 1 / 1;
        box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.03);
    }

    .glamfit-featured-media > a {
        position: relative;
        z-index: 1;
        display: block;
    }

    .glamfit-featured-media::after {
        content: "";
        position: absolute;
        left: 12px;
        right: 12px;
        bottom: 10px;
        height: 1px;
        background: rgba(125, 106, 184, 0.18);
        pointer-events: none;
    }

    .glamfit-featured-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .glamfit-featured-card:hover .glamfit-featured-image {
        transform: scale(1.05);
    }

    .glamfit-featured-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #7D6AB8;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 9999px;
        letter-spacing: 0.02em;
        box-shadow: 0 8px 16px rgba(125, 106, 184, 0.35);
        z-index: 2;
    }

    .glamfit-featured-plus {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 38px;
        height: 38px;
        border-radius: 9999px;
        background: #7D6AB8;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        font-weight: 600;
        box-shadow: 0 10px 20px rgba(125, 106, 184, 0.4);
        transition: transform 0.2s ease, background 0.2s ease;
        z-index: 2;
        pointer-events: auto;
    }

    .glamfit-featured-plus:hover {
        background: #6B5AA8;
        transform: scale(1.06);
    }

    .glamfit-featured-sizes {
        position: absolute;
        bottom: 8px;
        right: 8px;
        background: #F2ECFB;
        color: #4B3E77;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 10px;
        border: 1px solid #E6DCF5;
        box-shadow: 0 6px 14px rgba(40, 20, 82, 0.08);
        z-index: 2;
    }

    .glamfit-featured-body {
        padding: 10px 6px 6px;
    }

    .glamfit-featured-title {
        font-size: 14px;
        color: #1F1F1F;
        line-height: 1.35;
        min-height: 2.4em;
        font-weight: 500;
    }

    .glamfit-featured-prices {
        display: flex;
        align-items: baseline;
        gap: 10px;
        margin-top: 6px;
    }

    .glamfit-featured-price {
        color: #8C1D2C;
        font-weight: 700;
        font-size: 16px;
    }

    .glamfit-featured-price-old {
        color: #9B9B9B;
        font-size: 12px;
        text-decoration: line-through;
    }

    @media (min-width: 768px) {
        .glamfit-featured-card {
            padding: 12px;
        }

        .glamfit-featured-plus {
            width: 42px;
            height: 42px;
            font-size: 24px;
        }

        .glamfit-featured-title {
            font-size: 15px;
        }

        .glamfit-featured-price {
            font-size: 18px;
        }
    }

    .swiper-pagination-novedades .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background-color: var(--glamfit-accent) !important;
        border: 2px solid var(--glamfit-accent);
        opacity: 1;
    }

    .swiper-pagination-novedades .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
        background-color: white !important;
        border: 2px solid var(--glamfit-accent);
        opacity: 1;
    }

    .combo-card {
        border-radius: 10px;
        overflow: hidden;
    }

    .combo-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .combo-btn {
        border-radius: 10px;
        width: 100%;
    }

    @media (min-width: 640px) {
        .combo-actions {
            flex-direction: row;
            gap: 14px;
        }

        .combo-btn {
            width: auto;
            flex: 1;
        }
    }

    @media (min-width: 1024px) {
        .combo-btn {
            padding: 1rem 2rem !important;
            font-size: 1rem !important;
            letter-spacing: 0.06em;
        }
    }

    .modal .modal-content {
        padding: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
        border-radius: 10px !important;
    }

    #modalofertas {
        padding: 0 !important;
        background: transparent !important;
        box-shadow: none !important;
        max-width: 500px;
        border-radius: 10px;
        overflow: visible;
        left: 0 !important;
        right: 0 !important;
        transform: none !important;
        margin: 12px auto !important;
    }

    .jquery-modal.blocker.current {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sliderab,
    .sliderab .swiper-slide,
    .sliderab .swiper-slide img {
        border-radius: 10px !important;
    }

    .sliderab {
        overflow: hidden;
    }

    @media (max-width: 768px) {
        #modalofertas {
            width: calc(100% - 32px) !important;
            max-width: 420px !important;
            margin: 8px auto 0 !important;
        }
    }

    /* Style for jquery-modal close button */
    #modalofertas.modal a.close-modal {
        top: -15px !important;
        right: -15px !important;
        width: 34px !important;
        height: 34px !important;
        background-color: black !important;
        border: 2px solid white !important;
        border-radius: 50% !important;
        opacity: 1 !important;
        text-indent: -9999px;
        z-index: 10001 !important;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cline x1='18' y1='6' x2='6' y2='18'%3E%3C/line%3E%3Cline x1='6' y1='6' x2='18' y2='18'%3E%3C/line%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: 18px !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    #modalofertas .swiper-slide img {
        border-radius: 0px !important;
    }
</style>

@section('content')

<main class="z-[15] ">

    @if (count($slider) > 0)
        <section class="max-w-7xl mx-auto px-5 sm:px-[6%] lg:px-[6%] pt-2 lg:pt-4">
            <div class="swiper sliderab shadow-lg" style="height: 620px; border-radius: 10px; overflow: hidden;">
                <div class="swiper-wrapper h-full">
                    @foreach ($slider as $slide)
                        @php
                            $desktopSrc = asset($slide->url_image . $slide->name_image);
                            $mobileSrc = !empty($slide->link1) ? asset($slide->link1) : $desktopSrc;
                        @endphp
                        <div class="swiper-slide h-full" style="border-radius: 10px; overflow: hidden;">
                            <a href="{{$slide->link2}}" class="block w-full h-full">
                                {{-- Desktop Slider --}}
                                <div class="hidden md:block w-full h-full overflow-hidden" style="border-radius: 10px;">
                                    <img class="w-full h-full object-cover" src="{{ $desktopSrc }}"
                                        onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" alt="">
                                </div>
                                {{-- Mobile Slider --}}
                                <div class="block md:hidden w-full h-full overflow-hidden" style="border-radius: 10px;">
                                    <img class="w-full h-full object-cover" src="{{ $mobileSrc }}"
                                        onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" alt="">
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination-slider absolute bottom-4 w-full flex justify-center z-20"></div>
            </div>
        </section>
    @endif

    <style>
        .sliderab {
            height: 620px !important;
        }

        @media (max-width: 768px) {
            .sliderab {
                height: 500px !important;
            }
        }

        .sliderab .swiper-slide img {
            border-radius: 10px !important;
        }

        .category-circle-container {
            width: 130px !important;
            height: 130px !important;
            border-radius: 50% !important;
            overflow: hidden !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            border: 1px solid #E6E1F2 !important;
            background-color: white !important;
            flex-shrink: 0 !important;
            aspect-ratio: 1/1 !important;
            margin: 0 auto !important;
            transition: transform 0.3s ease !important;
        }

        @media (min-width: 1024px) {
            .category-circle-container {
                width: 180px !important;
                height: 180px !important;
            }
        }

        @media (min-width: 1280px) {
            .category-circle-container {
                width: 220px !important;
                height: 220px !important;
            }
        }

        .category-circle-container:hover {
            transform: scale(1.05) !important;
            border-color: #7D6AB8 !important;
        }

        .carruseltop {
            height: auto !important;
            padding-bottom: 0 !important;
            min-height: 0 !important;
        }

        .carruseltop .swiper-wrapper {
            align-items: flex-start;
            height: auto !important;
            min-height: 0 !important;
        }

        .carruseltop .swiper-slide {
            height: auto !important;
            display: flex;
            justify-content: center;
            align-self: flex-start;
            min-height: 0 !important;
        }

        .swiper-pagination-cat {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important;
            position: relative !important;
            margin: 0 auto !important;
            left: 0 !important;
            transform: none !important;
        }

        .combos {
            height: auto !important;
        }

        .combos .swiper-wrapper {
            height: auto !important;
            align-items: flex-start;
        }

        .swiper-pagination-logos-destacados {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important;
            position: relative !important;
            margin: 0 auto !important;
            left: 0 !important;
            transform: none !important;
        }

        .logos-destacados {
            height: auto !important;
        }

        .logos-destacados .swiper-wrapper {
            height: auto !important;
            align-items: flex-start;
        }

        .logos-destacados .swiper-slide {
            height: auto !important;
        }

        .brand-card-height {
            height: 250px !important;
        }

        @media (min-width: 1024px) {
            .brand-card-height {
                height: 300px !important;
            }
        }
        .novedades {
            height: auto !important;
        }

        .novedades .swiper-wrapper {
            height: auto !important;
            align-items: flex-start;
        }

        .novedades .swiper-slide {
            height: auto !important;
        }
    </style>

    @if (count($subcategorias) > 0)
        <section class="w-full px-[5%] lg:px-[8%] pt-10 lg:pt-14">
            {{-- <div class="flex items-center justify-between mb-6">
                <h2 class="font-Urbanist_Bold text-2xl lg:text-3xl text-[#111]">Categorias</h2>
            </div> --}}
            <div class="swiper carruseltop">
                <div class="swiper-wrapper">
                    @foreach ($subcategorias as $subcategoria)
                        <div class="swiper-slide">
                            <a href="/catalogo?subcategoria={{$subcategoria->id}}" class="block">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="category-circle-container">
                                        <img class="w-full h-full object-cover"
                                            src="{{ asset($subcategoria->url_image . $subcategoria->name_image) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"
                                            alt="{{$subcategoria->name}}">
                                    </div>
                                    <p class="text-center text-sm md:text-base font-Urbanist_Semibold text-[#2E2E2E]">
                                        {{$subcategoria->name}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-row justify-center items-center mt-3">
                <div class="swiper-pagination-cat"></div>
            </div>
        </section>
    @endif

    @if (count($combos) > 0)
        <section class="w-full px-[5%] lg:px-[8%] py-8 lg:py-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-Urbanist_Bold text-2xl lg:text-3xl text-[#111]">Combos destacados</h2>
            </div>
            <div class="swiper combos w-full">
                <div class="swiper-wrapper">
                    @foreach ($combos as $combo)
                        <div class="swiper-slide">
                            <div class="group bg-white combo-card border border-[#F0EAF7] shadow-sm overflow-hidden">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset($combo->imagen) }}" alt="{{ $combo->titulo }}"
                                        class="w-full h-[200px] md:h-[320px] object-cover transition-transform duration-500 group-hover:scale-105">
                                </div>

                                <div class="p-3">
                                    <h3 class="text-[#7D6AB8] text-[11px] md:text-xl font-bold mb-1 leading-tight">
                                        {{ $combo->titulo }}
                                    </h3>
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="text-[#333] text-[10px] md:text-lg font-extrabold uppercase italic">S/.
                                            {{ $combo->precio }}</span>
                                        @if($combo->precio_tachado)
                                            <span class="text-gray-500 line-through text-[9px] md:text-sm">S/.
                                                {{ $combo->precio_tachado }}</span>
                                        @endif
                                    </div>

                                    <div class="combo-actions flex flex-col gap-2">
                                        <button
                                            class="combo-btn bg-white border border-black text-black px-4 py-2 md:py-3 hover:bg-gray-100 transition-colors font-bold text-xs md:text-sm uppercase tracking-wide w-full"
                                            onclick="verCombo({{ $combo->id }})">
                                            Ver Productos
                                        </button>
                                        <button
                                            class="combo-btn bg-black text-white px-4 py-2 md:py-3 hover:bg-[#333] transition-colors font-bold text-xs md:text-sm uppercase tracking-wide shadow-xl w-full"
                                            onclick="agregarCombo({{ $combo->id }})">
                                            Agregar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination-combos mt-4 flex justify-center"></div>
            </div>
        </section>
    @endif

    @if (count($logosdestacados) > 0)
        <section class="w-full px-[5%] lg:px-[8%] py-8 lg:py-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-Urbanist_Bold text-2xl lg:text-3xl text-[#111]">Marcas destacadas</h2>
            </div>
            <div class="swiper logos-destacados">
                <div class="swiper-wrapper">
                    @foreach ($logosdestacados as $logosd)
                        <div class="swiper-slide">
                            <a href="/catalogo?marcas={{$logosd->id}}" class="block">
                                <div
                                    class="group relative overflow-hidden rounded-xl shadow-md border border-[#F0EAF7] brand-card-height">
                                    {{-- Background Image --}}
                                    <img src="{{ asset($logosd->url_image2) }}"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        alt="{{ $logosd->title }}">

                                    {{-- Dark Overlay --}}
                                    <div
                                        class="absolute inset-0 bg-black/45 transition-opacity duration-300 group-hover:bg-black/50">
                                    </div>

                                    {{-- Centered Content --}}
                                    <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-center">
                                        @if($logosd->url_image)
                                            <img src="{{ asset($logosd->url_image) }}"
                                                class="h-20 w-auto object-contain brightness-0 invert opacity-90 transition-all duration-300 group-hover:scale-110 group-hover:opacity-100"
                                                onerror="this.style.display='none'" alt="{{ $logosd->title }}">
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-row justify-center items-center mt-4">
                <div class="swiper-pagination-logos-destacados"></div>
            </div>
        </section>
    @endif

    @php
        $novedades = $destacados->count() > 0 ? $destacados : $ultimosProductos;
    @endphp
    @if ($novedades->count() > 0)
        <section class="w-full px-[5%] lg:px-[8%] py-12 lg:py-16 bg-gradient-to-br from-[#F7F2FB] via-white to-[#FFF2F6]">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-Urbanist_Bold text-2xl lg:text-3xl text-[#111]">Novedades</h2>
                <a href="/catalogo" class="text-sm font-Urbanist_Semibold text-[#6B5AA8] hover:text-[#4B3E77]">
                    Ver mas
                </a>
            </div>
            <div class="swiper novedades">
                <div class="swiper-wrapper">
                    @foreach ($novedades as $item)
                        <div class="swiper-slide px-2 mb-6">
                            @php
                                $tallasCount = (int) ($item->tallas_count ?? 0);
                                $colorsCount = (int) ($item->colors_count ?? 0);
                                $discountPercent = ($item->descuento > 0 && $item->precio > 0)
                                    ? round(100 - (($item->descuento * 100) / $item->precio))
                                    : 0;
                            @endphp
                            <div class="group flex flex-col h-full">
                                <div class="glamfit-featured-card">
                                    {{-- Image Container --}}
                                    <div class="glamfit-featured-media">
                                        <a href="{{ route('producto', $item->slug) }}" class="block w-full h-full">
                                            <img class="glamfit-featured-image"
                                                src="{{ asset($item->imagen) }}"
                                                onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"
                                                alt="{{$item->producto}}">
                                        </a>

                                        {{-- Discount Badge --}}
                                        @if ($discountPercent > 0)
                                            <span class="glamfit-featured-badge">
                                                -{{ $discountPercent }} %
                                            </span>
                                        @endif

                                        {{-- Add Button --}}
                                        <button type="button"
                                            data-id="{{ $item->id }}"
                                            class="glamfit-featured-plus"
                                            aria-label="Agregar al carrito">
                                            +
                                        </button>

                                        {{-- Bottom Badge (Sizes) --}}
                                        <span class="glamfit-featured-sizes">
                                            @if($tallasCount > 1)
                                                {{ $tallasCount }} Tallas
                                            @elseif($colorsCount > 0)
                                                {{ $colorsCount }} {{ $colorsCount === 1 ? 'Color disponible' : 'Colores disponibles' }}
                                            @else
                                                Detalles
                                            @endif
                                        </span>
                                    </div>

                                    {{-- Product Info --}}
                                    <div class="glamfit-featured-body text-left">
                                        <h3 class="glamfit-featured-title line-clamp-2">
                                            {{$item->producto}}
                                        </h3>
                                        <div class="glamfit-featured-prices">
                                            <span class="glamfit-featured-price">
                                                S/ {{ number_format($item->descuento > 0 ? $item->descuento : $item->precio, 2) }}
                                            </span>
                                            @if ($item->descuento > 0)
                                                <span class="glamfit-featured-price-old">
                                                    S/ {{ number_format($item->precio, 2) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex justify-center mt-8">
                    <div class="swiper-pagination-novedades"></div>
                </div>
            </div>
        </section>
    @endif



    <section class="w-full px-[5%] lg:px-[8%] pb-16 lg:pb-20">
        <div class="bg-[#EAE4F5] rounded-3xl p-8 lg:p-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center shadow-sm">
            <div class="text-[#3B334F]">
                <h3 class="text-2xl lg:text-3xl font-Urbanist_Bold text-[#2E2E2E] mb-4">Conocenos</h3>
                <p class="text-sm lg:text-base leading-relaxed mb-4">
                    En Glamfit creamos prendas y accesorios pensados para mujeres que quieren entrenar con estilo,
                    comodidad y confianza. Cada pieza esta seleccionada para acompanarte en tu rutina diaria,
                    combinando diseno funcional con un toque de glamour.
                </p>
                <p class="text-sm lg:text-base leading-relaxed">
                    Somos una marca peruana que cree en el poder de la comunidad fitness. Queremos inspirarte a dar
                    siempre lo mejor de ti, con productos que te hagan sentir segura y motivada.
                </p>
            </div>
            <div class="flex justify-center">
                <div class="bg-white p-3 rounded-3xl shadow-lg">
                    <img src="{{ asset('images/glamfit/Mesa de trabajo 10.jpg') }}" alt="Glamfit"
                        class="w-full h-[320px] object-cover rounded-2xl" />
                </div>
            </div>
        </div>
    </section>

</main>



<!-- Main modal -->
<div id="modalofertas" class="modal modalbanner">
    <!-- Modal body -->
    <div class="">
        <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
    </div>
</div>

@if(Session::has('welcome_message'))
    <div id="welcome-popup" class="claseocultar fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded shadow-lg text-center">
            <h2 class="text-lg font-bold mb-4">{{ Session::get('welcome_message') }}</h2>
            <button id="close-popup" class="bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
    </div>
@endif

<!-- Combo Detail Modal -->
<div id="modalComboDetail" class="modal">
    <div class="modal-content p-6 bg-white rounded-lg shadow-xl max-w-2xl mx-auto">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/2">
                <img id="modalComboImage" src="" alt="Combo Image" class="w-full h-auto object-cover rounded-lg">
            </div>
            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h2 id="modalComboTitle" class="text-2xl font-Urbanist_Bold text-[#2E2E2E] mb-2"></h2>
                    <div class="flex items-center gap-2 mb-4">
                        <span id="modalComboPrice" class="text-xl font-bold text-black"></span>
                        <span id="modalComboOldPrice" class="text-gray-500 line-through text-base"></span>
                    </div>
                    <h3 class="font-Urbanist_Semibold text-lg text-[#2E2E2E] mb-2">Productos incluidos:</h3>
                    <ul id="modalComboProducts" class="list-disc list-inside text-gray-700 mb-6">
                        <!-- Products will be loaded here -->
                    </ul>
                </div>
                <button id="modalComboBtnAdd"
                    class="bg-black text-white px-6 py-3 rounded-full hover:bg-[#333] transition-colors font-bold text-base uppercase tracking-wide shadow-xl w-full">
                    Agregar Combo al Carrito
                </button>
            </div>
        </div>
    </div>
</div>


@section('scripts_importados')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('welcome-popup');
        const closeButton = document.getElementById('close-popup');

        if (popup) {
            popup.classList.remove('hidden'); // Mostrar el popup

            closeButton.addEventListener('click', () => {
                popup.classList.add('hidden'); // Ocultar el popup
            });
        }
    });
</script>
<script>
    $(document).on('click', '.glamfit-featured-plus', function (event) {
        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();

        const productId = $(this).data('id');
        if (!productId) return;

        try {
            agregarAlCarrito(productId, 1);
        } catch (error) {
            console.error(error);
        }
    });
</script>

<script>
    let pops = @json($popups);

    function calcularTotal() {
        let articulos = Local.get('carrito')
        let total = articulos.map(item => {
            let monto
            if (Number(item.descuento) !== 0) {
                monto = item.cantidad * Number(item.descuento)
            } else {
                monto = item.cantidad * Number(item.precio)

            }
            return monto

        })
        const suma = total.reduce((total, elemento) => total + elemento, 0);

        $('#itemsTotal').text(`S/. ${suma.toFixed(2)} `)

    }
    $(document).ready(function () {
        if (pops.length > 0) {
            setTimeout(() => {
                $('#modalofertas').modal({
                    show: true,
                    fadeDuration: 300,
                    clickClose: true,
                    showClose: true
                });
            }, 500); // 500ms delay to help with image loading
        }


        $(document).ready(function () {
            articulosCarrito = Local.get('carrito') || [];

            // PintarCarrito();
        });

    })
</script>

<script>
    const initSwiper = (selector, options) => {
        const element = document.querySelector(selector);
        if (!element) return null;
        return new Swiper(selector, options);
    };

    initSwiper(".sliderab", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        autoplay: {
            delay: 3000,
        },

        pagination: {
            el: ".swiper-pagination-slider",
            clickable: true,
        },


    });


    initSwiper(".carruseltop", {
        slidesPerView: 6,
        spaceBetween: 20,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        autoHeight: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination-cat",
            clickable: true,
            dynamicBullets: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 2.2,
                spaceBetween: 16,
            },
            480: {
                slidesPerView: 3.2,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 4.2,
                spaceBetween: 18,
            },
            1024: {
                slidesPerView: 4.2,
                spaceBetween: 10,
            },
            1280: {
                slidesPerView: 4.2,
                spaceBetween: 15,
            },
            1440: {
                slidesPerView: 5.2,
                spaceBetween: 20,
            },
        },
    });

    initSwiper(".otrasmarcas", {
        slidesPerView: 4,
        spaceBetween: 25,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination-otrasmarcas",
            clickable: true,
            dynamicBullets: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 25,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            1350: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
    });


    initSwiper(".complementos", {
        slidesPerView: 5,
        spaceBetween: 25,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination-complementos",
            clickable: true,
            dynamicBullets: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 25,
            },
            600: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
            1350: {
                slidesPerView: 5,
                spaceBetween: 25,
            },
        },
    });

    initSwiper(".novedades", {
        slidesPerView: 4,
        spaceBetween: 24,
        loop: false,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        pagination: {
            el: ".swiper-pagination-novedades",
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.1,
                spaceBetween: 16,
            },
            600: {
                slidesPerView: 2.1,
                spaceBetween: 18,
            },
            900: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 24,
            },
        },
    });


    initSwiper(".instagram", {
        slidesPerView: 6,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            600: {
                slidesPerView: 2,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 0,
            },
            1350: {
                slidesPerView: 5,
                spaceBetween: 0,
            },
        },
    });


    initSwiper(".promo", {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        pagination: {
            el: ".swiper-pagination-promo",
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 50,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 50,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 50,
            },
        },
    });

    initSwiper(".logos-destacados", {
        slidesPerView: 3,
        spaceBetween: 15,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        pagination: {
            el: ".swiper-pagination-logos-destacados",
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
        },
    });

    initSwiper(".combos", {
        slidesPerView: 4,
        spaceBetween: 25,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        initialSlide: 0,
        autoHeight: true,
        pagination: {
            el: ".swiper-pagination-combos",
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            0: { slidesPerView: 2, spaceBetween: 10 },
            480: { slidesPerView: 2, spaceBetween: 12 },
            768: { slidesPerView: 2.25, spaceBetween: 22 },
            1024: { slidesPerView: 3, spaceBetween: 30 },
            1280: { slidesPerView: 4, spaceBetween: 25 },
        },
    });

    function agregarCombo(id) {
        let combos = @json($combos);
        let combo = combos.find(c => c.id == id);

        if (combo.stock == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Producto agotado',
            });
            return;
        }

        let carrito = Local.get('carrito') || [];

        // Check if exists
        // We use raw ID now, relying on isCombo to distinguish
        let existe = carrito.find(item => item.id == id && item.isCombo);

        if (existe) {
            if (existe.cantidad + 1 > combo.stock) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No hay suficiente stock',
                });
                return;
            }
            existe.cantidad++;
        } else {
            carrito.push({
                id: id, // Use raw ID
                isCombo: true,
                producto: combo.titulo,
                precio: combo.precio,
                descuento: 0,
                imagen: combo.imagen,
                cantidad: 1,
                color: null,
                peso: null,
                stock: combo.stock
            });
        }

        Local.set('carrito', carrito);
        limpiarHTML();
        PintarCarrito();
        mostrarTotalItems();

        Swal.fire({
            icon: 'success',
            title: 'Combo agregado al carrito',
            showConfirmButton: false,
            timer: 1500
        });
    }

    function verCombo(id) {
        let combos = @json($combos);
        let combo = combos.find(c => c.id == id);

        if (!combo) return;

        $('#modalComboTitlePremium').text(combo.titulo);
        $('#modalComboImagePremium').attr('src', '/' + combo.imagen);
        $('#modalComboPricePremium').text('S/. ' + combo.precio);

        if (combo.precio_tachado) {
            $('#modalComboOldPricePremium').text('S/. ' + combo.precio_tachado).show();
        } else {
            $('#modalComboOldPricePremium').hide();
        }

        let productsHtml = '';
        if (combo.products && combo.products.length > 0) {
            combo.products.forEach(p => {
                productsHtml += `
                <li class="flex items-start gap-3 animated-item">
                    <div class="mt-1 min-w-[20px]">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="text-base text-gray-700 font-Urbanist_Medium leading-snug">${p.producto}</span>
                </li>`;
            });
        }
        $('#modalComboProductsPremium').html(productsHtml);

        // Update Add Button logic
        $('#modalComboBtnAddPremium').off('click').on('click', function () {
            $.modal.close();
            agregarCombo(id);
        });

        $('#modalComboPremium').modal({
            show: true,
            fadeDuration: 200
        });
    }
</script>

<!-- Combo Detail Modal -->
<div id="modalComboPremium" class="modal"
    style="background: transparent; box-shadow: none; max-width: 550px !important; width: 100%; padding: 0;">
    <div class="modal-content relative bg-white rounded-2xl shadow-2xl overflow-hidden">

        <div class="flex flex-col md:flex-row h-auto items-stretch">
            <!-- Image Section -->
            <div class="md:w-1/2 relative bg-gray-100 min-h-[250px] md:min-h-[250px]">
                <img id="modalComboImagePremium" src="" alt="Combo Image"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/50 to-transparent h-20"></div>
            </div>

            <!-- Content Section -->
            <div class="md:w-1/2 p-5 flex flex-col justify-between bg-white">
                <div>
                    <h2 id="modalComboTitlePremium" class="text-3xl font-Urbanist_Black text-[#111] mb-2 leading-tight">
                    </h2>

                    <div class="flex items-end gap-3 mb-6 pb-6 border-b border-gray-100">
                        <span id="modalComboPricePremium" class="text-3xl font-Urbanist_Bold text-[#C1272D]"></span>
                        <span id="modalComboOldPricePremium"
                            class="text-gray-400 line-through text-lg mb-1 font-Urbanist_Medium"></span>
                    </div>

                    <div class="mb-6">
                        <h3 class="font-Urbanist_Bold text-sm text-gray-400 uppercase tracking-widest mb-4">Lo que
                            incluye:</h3>
                        <ul id="modalComboProductsPremium" class="space-y-3">
                            <!-- Products will be loaded here -->
                        </ul>
                    </div>
                </div>

                <button id="modalComboBtnAddPremium"
                    class="group relative w-full bg-black text-white px-6 py-4 rounded-xl hover:bg-[#333] transition-all duration-300 font-Urbanist_Bold text-lg uppercase tracking-wide shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Agregar al Carrito
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
@stop

@stop
