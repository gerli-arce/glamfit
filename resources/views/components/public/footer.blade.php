<footer class="bg-[#111111] text-white overflow-hidden relative">

    {{-- Decorative gradient blob --}}
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#E91E63] via-[#9B51E0] to-[#E91E63]"></div>

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
    </style>

    <div class="w-full px-[5%] pt-16 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">

            {{-- Column 1: Brand Info --}}
            <div class="flex flex-col gap-5">
                <h2 class="text-4xl font-Urbanist_Bold tracking-widest text-[#E91E63]">
                    GLAMFIT
                </h2>
                <p class="text-gray-400 font-Urbanist_Light text-sm leading-relaxed max-w-sm">
                    Ropa deportiva con estilo y glamour para el gimnasio y más. Encuentra las mejores prendas para
                    entrenar con actitud y comodidad.
                </p>
                <div class="flex flex-row gap-4 mt-2">
                    @if ($datosgenerales->instagram)
                        <a href="{{ $datosgenerales->instagram }}" target="_blank"
                            class="w-10 h-10 rounded-full bg-[#1F1F1F] flex items-center justify-center hover:bg-[#E91E63] hover:text-white text-gray-400 transition-all duration-300 group">
                            <i class="fa-brands fa-instagram text-xl group-hover:text-white"></i>
                        </a>
                    @endif

                    @if ($datosgenerales->tiktok)
                        <a href="{{ $datosgenerales->tiktok }}" target="_blank"
                            class="w-10 h-10 rounded-full bg-[#1F1F1F] flex items-center justify-center hover:bg-[#E91E63] hover:text-white text-gray-400 transition-all duration-300 group">
                            <i class="fa-brands fa-tiktok text-xl group-hover:text-white"></i>
                        </a>
                    @endif

                    @if ($datosgenerales->facebook)
                        <a href="{{ $datosgenerales->facebook }}" target="_blank"
                            class="w-10 h-10 rounded-full bg-[#1F1F1F] flex items-center justify-center hover:bg-[#E91E63] hover:text-white text-gray-400 transition-all duration-300 group">
                            <i class="fa-brands fa-facebook-f text-xl group-hover:text-white"></i>
                        </a>
                    @endif

                    @if ($datosgenerales->whatsapp)
                        <a href="https://api.whatsapp.com/send?phone={{ $datosgenerales->whatsapp }}&text=Hola%20GLAMFIT%2C%20vengo%20de%20la%20web%20estoy%20interesado%20en%20adquirir%20algunos%20productos."
                            target="_blank"
                            class="w-10 h-10 rounded-full bg-[#1F1F1F] flex items-center justify-center hover:bg-[#E91E63] hover:text-white text-gray-400 transition-all duration-300 group">
                            <i class="fa-brands fa-whatsapp text-xl group-hover:text-white"></i>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Column 2: Links --}}
            <div class="flex flex-col gap-6">
                <h3
                    class="font-Urbanist_Bold text-lg text-white tracking-wider uppercase border-l-4 border-[#E91E63] pl-3">
                    Atención al Cliente</h3>
                <div class="flex flex-col gap-3 font-Urbanist_Light text-gray-400 text-sm">
                    <a href="{{route('contacto')}}"
                        class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Contáctanos</a>
                    <a target="_blank"
                        href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE4MDQ5OTQ5MDYyODM2OTM2?story_media_id=3433199994630037399&igsh=MXZoaDBlM2gxcW1wdg=="
                        class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Nuestras Tiendas</a>
                    <a href="#" class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Preguntas
                        Frecuentes</a>
                    <a href="#" class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Términos y
                        Condiciones</a>
                </div>
            </div>

            {{-- Column 3: Links --}}
            <div class="flex flex-col gap-6">
                <h3
                    class="font-Urbanist_Bold text-lg text-white tracking-wider uppercase border-l-4 border-[#E91E63] pl-3">
                    Categorías</h3>
                <div class="flex flex-col gap-3 font-Urbanist_Light text-gray-400 text-sm">
                    <a href="/catalogo" class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Ver Todo</a>
                    <a href="/catalogo?categoria=1"
                        class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Ropa Deportiva</a>
                    <a href="/catalogo?categoria=2"
                        class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Accesorios</a>
                    <a href="/catalogo?ofertas=1"
                        class="hover:text-[#E91E63] hover:pl-2 transition-all duration-300">Ofertas</a>
                </div>
            </div>

            {{-- Column 4: Newsletter --}}
            <div class="flex flex-col gap-6">
                <h3
                    class="font-Urbanist_Bold text-lg text-white tracking-wider uppercase border-l-4 border-[#E91E63] pl-3">
                    SUSCRÍBETE</h3>
                <p class="text-gray-400 font-Urbanist_Light text-sm leading-relaxed">
                    Suscríbete para recibir las últimas novedades y ofertas exclusivas.
                </p>
                <form action="#" class="flex flex-col gap-3">
                    <input type="email" placeholder="Tu correo electrónico"
                        class="bg-[#1F1F1F] border border-[#333] text-white px-4 py-3 rounded-md focus:outline-none focus:border-[#E91E63] font-Urbanist_Light text-sm placeholder-gray-500">
                    <button type="button"
                        class="bg-[#E91E63] text-white px-4 py-3 rounded-md font-Urbanist_Bold text-sm uppercase tracking-wide hover:bg-[#D81B60] transition-colors">
                        Suscribirme
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="text-gray-500 pt-8 pb-10 border-t border-[#1F1F1F]">
        <div class="w-full px-[5%] flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-center md:text-left">
                <p class="font-Urbanist_Light text-sm">
                    Copyright &copy; {{ date('Y') }} <span class="font-Urbanist_Bold text-white">GLAMFIT</span>. Todos
                    los derechos reservados.
                </p>
            </div>
            <div class="flex gap-4">
                {{-- Payment icons could go here --}}
            </div>
        </div>
    </div>



    </div>
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