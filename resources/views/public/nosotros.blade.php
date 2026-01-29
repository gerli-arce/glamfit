@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop

<style>
  #Aboutus .prose {
    width: 100%;
    max-width: 100%;
    text-align: justify;
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }

  .prose p {

    margin-top: 0 !important;
    margin-bottom: 0 !important;

  }

  @media (max-width: 600px) {
    .fixedWhastapp {
      right: 116px !important;
    }
  }
</style>

@section('content')

<main class="z-[15]">
  <section class="max-w-7xl mx-auto px-[5%] md:px-[8%] py-12 lg:py-20">
    <div class="flex flex-col items-center w-full mb-16">
      <h1 class="text-3xl md:text-4xl font-semibold font-Inter_Medium text-[#333333] text-center tracking-tight">
        ACERCA DE NOSOTROS – GLAMFIT.PERÚ
      </h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
      <div class="flex justify-center md:justify-start">
        <img src="{{ asset('images/glamfit/Mesa de trabajo 12.jpg') }}" alt="Acerca de nosotros"
          class="w-full max-w-[500px] h-auto rounded-[30px] object-cover shadow-sm">
      </div>
      <div class="flex flex-col gap-6 font-Inter_Medium text-[#333333]">
        <p class="text-xl md:text-2xl font-medium">Verte bien, verte feliz.</p>
        <div class="text-base md:text-lg text-justify leading-relaxed">
          <p>En Glamfit.perú, creemos que el verdadero poder nace cuando te sientes segura de ti misma. Por eso creamos
            una marca que une lo mejor de dos mundos: el glamour y el fitness. “Glam” representa elegancia, estilo y
            actitud; “Fit” refleja fuerza, disciplina y bienestar. Juntas, forman el alma de una mujer que se cuida, se
            respeta y se expresa con confianza.</p>
        </div>
      </div>
    </div>

    <div class="w-full mb-16 text-justify text-base md:text-lg leading-relaxed font-Inter_Medium text-[#333333]">
      <p>Somos una marca peruana comprometida con ofrecer ropa deportiva de alto impacto, con diseños que realzan tu
        figura y materiales que acompañan tu movimiento. Cada prenda es una declaración: de belleza, de esfuerzo y de
        amor propio.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div class="flex flex-col gap-6 font-Inter_Medium text-[#333333]">
        <div class="text-base md:text-lg text-justify leading-relaxed">
          <p>Glamfit.perú no es solo una tienda, es una comunidad que inspira. Creemos que el estilo no se sacrifica al
            entrenar, y que el fitness puede vivirse con clase, autenticidad y propósito.</p>
        </div>
        <div class="text-base md:text-lg text-justify leading-relaxed">
          <p>Gracias por elegirnos para acompañarte en tu mejor versión: una mujer que se ve bien, se siente bien y es
            feliz siendo ella misma.</p>
        </div>
      </div>
      <div class="flex justify-center md:justify-end">
        <img src="{{ asset('images/glamfit/Mesa de trabajo 16.jpg') }}" alt="Nuestra tienda"
          class="w-full max-w-[500px] h-auto rounded-[30px] object-cover shadow-sm">
      </div>
    </div>
  </section>

</main>





</main>
{{-- modalOfertas --}}



<!-- Modal toggle -->


<!-- Main modal -->
{{--
<div id="modalofertas" class="modal">

  <!-- Modal body -->
  <div class="p-1 ">
    <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
  </div>


</div> --}}


@section('scripts_importados')

<script>
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

    $('#itemsTotal').text(`S/. ${suma} `)

  }
  $(document).ready(function () {
    console.log(pops.length)
    if (pops.length > 0) {
      $('#modalofertas').modal({
        show: true,
        fadeDuration: 100
      })

    }


    $(document).ready(function () {
      articulosCarrito = Local.get('carrito') || [];

      // PintarCarrito();
    });

  })
</script>


@stop

@stop