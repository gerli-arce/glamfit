<footer class="bg-[#7D6AB8] text-white relative">

    <style>
        #modalPoliticasDev #modalTerminosCondiciones #modallinkPoliticasDatos #modallinkTiempoEnvios #modallinkPlazoReembolso #modallinkTratamientoDatos #modallinkPoliticasCookies #modallinkCampanasPublicitarias #modallinkBeneficios #modallinkSeguimientoPedido #modallinkNuestrasTiendas {
            height: 70vh;
            overflow-y: auto;
        }

        #modalPoliticasDev .prose,
        #modalTerminosCondiciones .prose,
        #modallinkPoliticasDatos .prose,
        #modallinkTiempoEnvios .prose,
        #modallinkPlazoReembolso .prose,
        #modallinkTratamientoDatos .prose,
        #modallinkPoliticasCookies .prose,
        #modallinkCampanasPublicitarias .prose,
        #modallinkBeneficios .prose,
        #modallinkSeguimientoPedido .prose,
        #modallinkNuestrasTiendas .prose {
            max-width: 100%;
            text-align: justify;
        }

        .prose * {
            margin-bottom: 0% !important;
            margin-top: 0% !important;
        }

        .footer-wrap {
            padding: 50px 8% 40px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 40px;
        }

        .footer-heading {
            font-family: 'Urbanist_Bold', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 20px;
            color: #ffffff;
            letter-spacing: 0.05em;
            text-transform: none;
        }

        .footer-text {
            color: #ffffff;
            font-size: 0.8rem;
            line-height: 1.6;
            font-family: 'Urbanist_Regular', sans-serif;
        }

        .footer-link {
            color: #ffffff;
            font-size: 0.8rem;
            opacity: 0.9;
            transition: all 0.3s ease;
            font-family: 'Urbanist_Regular', sans-serif;
            display: block;
            margin-bottom: 10px;
        }

        .footer-link:hover {
            opacity: 1;
            transform: translateX(5px);
        }

        .footer-scroll {
            max-height: 250px;
            overflow-y: auto;
            padding-right: 20px;
            scrollbar-width: thin;
            scrollbar-color: #888888 #ffffff;
        }

        .footer-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .footer-scroll::-webkit-scrollbar-track {
            background: #ffffff;
            border-radius: 10px;
        }

        .footer-scroll::-webkit-scrollbar-thumb {
            background: #888888;
            border-radius: 10px;
            border: 2px solid #ffffff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding: 20px 5%;
            color: #ffffff;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.05);
        }

        @media (min-width: 1024px) {
            .footer-grid {
                grid-template-columns: 2.2fr 1fr 1fr 1fr 1.2fr;
                gap: 60px;
            }
        }
    </style>

    <div class="footer-wrap">
        <div class="footer-grid">
            {{-- Column 1: Acerca de Glamfit --}}
            <div>
                <h3 class="footer-heading">Acerca de Glamfit</h3>
                <div class="footer-scroll">
                    <p class="footer-text">
                        {{ $datosgenerales->aboutus ?? 'Glamfit es tu tienda online de ropa deportiva y accesorios fitness diseñada para mujeres que buscan verse y sentirse bien mientras entrenan. Combinamos estilo, comodidad y funcionalidad en cada prenda, ofreciendo productos de alta calidad que se adaptan a tu ritmo de vida activo. ¡Entrena con confianza, entrena con Glamfit!' }}
                    </p>
                </div>
            </div>

            {{-- Column 2: Categorías --}}
            <div>
                <h3 class="footer-heading">Categorías</h3>
                <div class="flex flex-col gap-3">
                    <a href="/catalogo" class="footer-link">Accesorios</a>
                    <a href="/catalogo" class="footer-link">Enterizo short</a>
                    <a href="/catalogo" class="footer-link">Enterizos pantalón</a>
                    <a href="/catalogo" class="footer-link">Short push-up</a>
                    <a href="/catalogo" class="footer-link">Leggings push-up</a>
                    <a href="/catalogo" class="footer-link">Conjuntos</a>
                    <a href="/catalogo" class="footer-link">Kits accesorios</a>
                </div>
            </div>

            {{-- Column 3: Información --}}
            <div>
                <h3 class="footer-heading">Información</h3>
                <div class="flex flex-col gap-3">
                    <a href="#" id="linkTiempoEnvios" class="footer-link">Envíos y Pagos</a>
                    <a href="#" id="linkPoliticas" class="footer-link">Devoluciones</a>
                    <a href="/nosotros" class="footer-link">Acerca de nosotros</a>
                    <a href="#" class="footer-link">Preguntas frecuentes</a>
                </div>
            </div>

            {{-- Column 4: Legal --}}
            <div>
                <h3 class="footer-heading">Legal</h3>
                <div class="flex flex-col gap-1">
                    <a href="#" id="linkTerminos" class="footer-link">Términos y condiciones</a>
                    <a href="#" id="linkPoliticasDatos" class="footer-link">Políticas y Privacidad</a>
                </div>
            </div>

            {{-- Column 5: Contáctanos --}}
            <div>
                <h3 class="footer-heading">Contáctanos</h3>
                <div class="flex flex-col gap-1">
                    @if($datosgenerales->cellphone)
                        <a href="tel:{{ $datosgenerales->cellphone }}" class="footer-link">{{ $datosgenerales->cellphone }}</a>
                    @endif
                    @if($datosgenerales->email)
                        <a href="mailto:{{ $datosgenerales->email }}" class="footer-link">{{ $datosgenerales->email }}</a>
                    @endif
                </div>
                
                <div class="flex gap-4 mt-6 items-center">
                    @if($datosgenerales->facebook)
                        <a href="{{ $datosgenerales->facebook }}" target="_blank" class="hover:scale-110 transition-transform">
                            <img src="{{ asset('images/svg/facebook.svg') }}" class="h-6 w-auto brightness-0 invert" alt="Facebook">
                        </a>
                    @endif
                    @if($datosgenerales->instagram)
                        <a href="{{ $datosgenerales->instagram }}" target="_blank" class="hover:scale-110 transition-transform">
                            <img src="{{ asset('images/svg/INSTAGRAMWHITE.svg') }}" class="h-6 w-auto" alt="Instagram">
                        </a>
                    @endif
                    @if($datosgenerales->tiktok)
                        <a href="{{ $datosgenerales->tiktok }}" target="_blank" class="hover:scale-110 transition-transform">
                            <img src="{{ asset('images/svg/TIKTOK.svg') }}" class="h-6 w-auto brightness-0 invert" alt="TikTok">
                        </a>
                    @endif
                    @if($datosgenerales->whatsapp)
                        <a href="https://api.whatsapp.com/send?phone={{ $datosgenerales->whatsapp }}&text={{ urlencode($datosgenerales->mensaje_whatsapp ?? '') }}" target="_blank" class="hover:scale-110 transition-transform">
                            <img src="{{ asset('images/svg/WHATSAPP.svg') }}" class="h-6 w-auto brightness-0 invert" alt="WhatsApp">
                        </a>
                    @endif
                    @if($datosgenerales->youtube)
                        <a href="{{ $datosgenerales->youtube }}" target="_blank" class="hover:scale-110 transition-transform">
                            <img src="{{ asset('images/svg/youtube.svg') }}" class="h-6 w-auto brightness-0 invert" alt="YouTube">
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="footer-bottom" style="justify-content: center;">
        <p>© {{ date('Y') }} <span class="font-bold">GLAMFIT by CONORLD</span></p>
    </div>

    <div id="modalTerminosCondiciones" class="modal" style="max-width: 900px !important;width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Términos y Condiciones</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $terminos->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modalPoliticasDev" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Políticas de Cambio de Devolución</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $politicas->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkPoliticasDatos" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Políticas de Datos</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $politicaDatos->content ?? '' !!}</div>
        </div>
    </div>
    <!-- ------------------------------------------------ -->
    <div id="modallinkTiempoEnvios" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Tiempo y Costos de Envío</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $TimeAndPriceDelivery->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkPlazoReembolso" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Plazos de Reembolso</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $PlazosDeReembolso->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkTratamientoDatos" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Tratamiento de Datos Adicional</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $TratamientoAdicionalDatos->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkPoliticasCookies" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Políticas de Cookies</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $PoliticasCookies->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkCampanasPublicitarias" class="modal"
        style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Campanas Publicitarias</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $CampanasPublicitarias->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkBeneficios" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Beneficios 0% Intereses</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $BeneficiosSinIntereses->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkSeguimientoPedido" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Seguimiento de Pedido</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $SeguimientoPedido->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modallinkNuestrasTiendas" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-Urbanist_Bold text-2xl lg:text-3xl text-center">Nuestras Tiendas</h1>
            <div class="font-Urbanist_Regular prose p-2">{!! $NuestrasTiendas->content ?? '' !!}</div>
        </div>
    </div>

</footer>


<script>
    $(document).ready(function () {


        $(document).on('click', '#linkTerminos', function () {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#terminoslibro', function () {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkPoliticas', function () {
            $('#modalPoliticasDev').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkPoliticasDatos', function () {
            $('#modallinkPoliticasDatos').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkTiempoEnvios', function () {
            $('#modallinkTiempoEnvios').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkPlazoReembolso', function () {
            $('#modallinkPlazoReembolso').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkTratamientoDatos', function () {
            $('#modallinkTratamientoDatos').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkPoliticasCookies', function () {
            $('#modallinkPoliticasCookies').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkCampanasPublicitarias', function () {
            $('#modallinkCampanasPublicitarias').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkBeneficios ', function () {
            $('#modallinkBeneficios ').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkSeguimientoPedido', function () {
            $('#modallinkSeguimientoPedido').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkNuestrasTiendas', function () {
            $('#modallinkNuestrasTiendas').modal({
                show: true,
                fadeDuration: 400,
            })
        })



        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarEmail(value) {
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("Por favor, asegúrate de ingresar una dirección de correo electrónico válida");
                return false;
            }
            return true;
        }


        $("#subsEmail").submit(function (e) {

            console.log('enviando subscripcion');

            e.preventDefault();

            Swal.fire({

                title: 'Realizando suscripción',
                html: `Registrando... 
          <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4">
              <div role="status">
              <svg aria-hidden="true" class="w-8 h-8 text-[#E91E63] animate-spin dark:text-gray-600 " viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
              </svg>

              </div>
          </div>
          `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });


            if (!validarEmail($('#emailFooter').val())) {
                return;
            };
            $.ajax({
                url: '{{ route('guardarUserNewsLetter') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.close();
                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });
                    $('#subsEmail')[0].reset();
                },
                error: function (response) {
                    let message = ''

                    let isDuplicado = response.responseJSON.message.includes(
                        'Duplicate entry')
                    console.log(isDuplicado)

                    if (isDuplicado) {
                        message =
                            'El correo que ha ingresado ya existe. Utilice  otra direccion de correo'
                    } else {
                        message = response.responseJSON.message
                    }
                    Swal.close();
                    Swal.fire({
                        title: message,
                        icon: "error",
                    });
                }
            });

        })






    })
</script>