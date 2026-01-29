@extends('components.public.matrix', ['pagina' => 'comentario'])

@section('css_importados')

@stop


@section('content')

<main class="bg-white py-12 lg:py-20 px-[5%] md:px-[10%]">
  <section class="max-w-7xl mx-auto">
    <div class="flex flex-col gap-6 mb-12">
      <h1 class="text-3xl md:text-4xl font-bold font-Inter_Medium text-[#111111]">
        Opiniones de clientes
      </h1>
      <div class="flex items-center gap-4">
        <div class="flex gap-1">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-6 h-6 text-[#FFB800]" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
              </path>
            </svg>
          @endfor
        </div>
        <span class="text-lg font-semibold text-[#111111]">5.0 de 5</span>
      </div>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center border-t border-gray-100 pt-8 mb-10 gap-4">
      <p class="text-sm font-semibold text-[#666666]">
        @if ($contarcomentarios == 1)
          {{ $contarcomentarios }} calificación
        @else
          {{ $contarcomentarios }} calificaciones
        @endif
      </p>

      <div class="relative inline-block text-left">
        <button type="button"
          class="inline-flex justify-between items-center w-48 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-[#333333] hover:bg-gray-50 transition-colors">
          Fecha: Más recientes
          <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      @foreach ($comentarios as $item)
        <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm flex flex-col gap-5">
          <div class="flex justify-between items-start">
            <div class="flex flex-col gap-1">
              <h3 class="text-lg font-bold text-[#333333]">{{ $item->name }}</h3>
              <div class="flex gap-0.5">
                @for ($i = 0; $i < ($item->rating ?? 5); $i++)
                  <svg class="w-5 h-5 text-[#FFB800]" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                  </svg>
                @endfor
              </div>
            </div>
            <span class="text-sm text-[#999999]">{{ \Carbon\Carbon::parse($item->created_at)->format('d M. Y') }}</span>
          </div>

          <p class="text-base text-[#444444] leading-relaxed">
            {{ $item->testimonie }}
          </p>

          @if($item->img_product)
            <div class="mt-2 flex flex-col gap-3">
              <span class="text-xs font-semibold text-[#999999] uppercase tracking-wider">Productos</span>
              <div class="flex gap-3">
                <div class="w-20 h-20 rounded-2xl overflow-hidden border border-gray-100">
                  <img src="{{ asset($item->img_product) }}" alt="Producto reseñado" class="w-full h-full object-cover">
                </div>
              </div>
            </div>
          @endif
        </div>
      @endforeach
    </div>

    <div class="mt-16 flex justify-center">
      {{ $comentarios->links() }}
    </div>

    {{-- Optional: New comment form styled to match --}}
    <div class="mt-24 border-t border-gray-100 pt-16 max-w-2xl">
      <h2 class="text-2xl font-bold text-[#111111] mb-8">Cuéntanos tu experiencia</h2>
      <form action="{{ route('nuevocomentario') }}" method="POST" class="flex flex-col gap-6">
        @csrf
        <textarea name="testimonie" placeholder="Comparte tus pensamientos..." rows="4"
          class="w-full rounded-2xl border-gray-200 focus:border-[#7D6AB8] focus:ring-[#7D6AB8] text-base p-4 transition-all">{{ old('testimonie') }}</textarea>
        @error('testimonie')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <div class="flex justify-end">
          <button type="submit"
            class="bg-[#7D6AB8] text-white px-10 py-3.5 rounded-full font-bold text-base hover:bg-[#6a59a3] transition-colors shadow-lg shadow-[#7D6AB8]/20">
            Enviar reseña
          </button>
        </div>
      </form>
      @if (session('mensaje'))
        <div
          class="mt-6 p-4 rounded-2xl @if (session('alerta') == 2) bg-red-50 text-red-700 @else bg-green-50 text-green-700 @endif">
          {{ session('mensaje') }}
        </div>
      @endif
    </div>
  </section>
</main>

@section('scripts_importados')
<script>
  $(document).ready(function () {


    function capitalizeFirstLetter(string) {
      string = string.toLowerCase()
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  })
  $('#disminuir').on('click', function () {
    console.log('disminuyendo')
    let cantidad = Number($('#cantidadSpan span').text())
    if (cantidad > 0) {
      cantidad--
      $('#cantidadSpan span').text(cantidad)
    }


  })
  // cantidadSpan
  $('#aumentar').on('click', function () {
    console.log('aumentando')
    let cantidad = Number($('#cantidadSpan span').text())
    cantidad++
    $('#cantidadSpan span').text(cantidad)

  })
</script>
<script>
  let articulosCarrito = [];


  function deleteOnCarBtn(id, operacion) {
    console.log('Elimino un elemento del carrito');
    console.log(id, operacion)
    const prodRepetido = articulosCarrito.map(item => {
      if (item.id === id && item.cantidad > 0) {
        item.cantidad -= Number(1);
        return item; // retorna el objeto actualizado 
      } else {
        return item; // retorna los objetos que no son duplicados 
      }

    });
    Local.set('carrito', articulosCarrito)
    limpiarHTML()
    PintarCarrito()


  }

  function calcularTotal() {
    let articulos = Local.get('carrito')
    console.log(articulos)
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

  function addOnCarBtn(id, operacion) {
    console.log('agrego un elemento del cvarrio');
    console.log(id, operacion)

    const prodRepetido = articulosCarrito.map(item => {
      if (item.id === id) {
        item.cantidad += Number(1);
        return item; // retorna el objeto actualizado 
      } else {
        return item; // retorna los objetos que no son duplicados 
      }

    });
    console.log(articulosCarrito)
    Local.set('carrito', articulosCarrito)
    // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
    limpiarHTML()
    PintarCarrito()


  }

  function deleteItem(id) {
    console.log('borrando elemento')
    articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

    Local.set('carrito', articulosCarrito)
    limpiarHTML()
    PintarCarrito()
  }

  var appUrl = <?php echo json_encode($url_env); ?>;
  console.log(appUrl);
  $(document).ready(function () {
    articulosCarrito = Local.get('carrito') || [];

    PintarCarrito();
  });

  function limpiarHTML() {
    //forma lenta 
    /* contenedorCarrito.innerHTML=''; */
    $('#itemsCarrito').html('')


  }



  // function PintarCarrito() {
  //   console.log('pintando carrito ')

  //   let itemsCarrito = $('#itemsCarrito')

  //   articulosCarrito.forEach(element => {
  //     let plantilla = `<div class="flex justify-between bg-white font-poppins border-b-[1px] border-[#E8ECEF] pb-5">
  //         <div class="flex justify-center items-center gap-5">
  //           <div class="bg-[#F3F5F7] rounded-md p-4">
  //             <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
  //           </div>
  //           <div class="flex flex-col gap-3 py-2">
  //             <h3 class="font-semibold text-[14px] text-[#151515]">
  //               ${element.producto}
  //             </h3>
  //             <p class="font-normal text-[12px] text-[#6C7275]">

  //             </p>
  //             <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
  //               <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
  //                 <span  class="text-[20px]">-</span>
  //               </button>
  //               <div class="w-8 h-8 flex justify-center items-center">
  //                 <span  class="font-semibold text-[12px]">${element.cantidad }</span>
  //               </div>
  //               <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
  //                 <span class="text-[20px]">+</span>
  //               </button>
  //             </div>
  //           </div>
  //         </div>
  //         <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
  //           <p class="font-semibold text-[14px] text-[#151515]">
  //             S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
  //           </p>
  //           <div class="flex items-center">
  //             <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
  //             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  //               <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
  //             </svg>
  //             </button>

  //           </div>
  //         </div>
  //       </div>`

  //     itemsCarrito.append(plantilla)

  //   });

  //   calcularTotal()
  // }






  $('#btnAgregarCarrito').on('click', function () {
    let url = window.location.href;
    let partesURl = url.split('/')
    let item = partesURl[partesURl.length - 1]
    let cantidad = Number($('#cantidadSpan span').text())
    item = item.replace('#', '')



    // id='nodescuento'


    $.ajax({

      url: `{{ route('carrito.buscarProducto') }}`,
      method: 'POST',
      data: {
        _token: $('input[name="_token"]').val(),
        id: item,
        cantidad

      },
      success: function (success) {
        console.log(success)
        let {
          producto,
          id,
          descuento,
          precio,
          imagen,
          color
        } = success.data
        let cantidad = Number(success.cantidad)
        let detalleProducto = {
          id,
          producto,
          descuento,
          precio,
          imagen,
          cantidad,
          color

        }
        let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id)
        if (existeArticulo) {
          //sumar al articulo actual 
          const prodRepetido = articulosCarrito.map(item => {
            if (item.id === detalleProducto.id) {
              item.cantidad += Number(detalleProducto.cantidad);
              return item; // retorna el objeto actualizado 
            } else {
              return item; // retorna los objetos que no son duplicados 
            }

          });
        } else {
          articulosCarrito = [...articulosCarrito, detalleProducto]

        }

        Local.set('carrito', articulosCarrito)
        let itemsCarrito = $('#itemsCarrito')
        let ItemssubTotal = $('#ItemssubTotal')
        let itemsTotal = $('#itemsTotal')
        limpiarHTML()
        PintarCarrito()

      },
      error: function (error) {
        console.log(error)
      }

    })



    // articulosCarrito = {...articulosCarrito , detalleProducto }
  })
  // $('#openCarrito').on('click', function() {
  //   console.log('abriendo carrito ');
  //   $('.main').addClass('blur')
  // })
  // $('#closeCarrito').on('click', function() {
  //   console.log('cerrando  carrito ');

  //   $('.cartContainer').addClass('hidden')
  //   $('#check').prop('checked', false);
  //   $('.main').removeClass('blur')


  // })
</script>

<script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop