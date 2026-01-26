<x-app-layout>
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ $combo->id ? route('combos.update', $combo->id) : route('combos.store') }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      @if ($combo->id)
        @method('PUT')
      @endif

      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            {{ $combo->id ? 'Editar Combo' : 'Nuevo Combo' }}
          </h2>
        </header>

        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4 border mb-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

              <div class="md:col-span-5">
                <label for="titulo">Título <span class="text-red-500 font-bold">*</span></label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                  </div>
                  <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $combo->titulo) }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Título del combo" required>
                </div>
              </div>

              <div class="md:col-span-2">
                <label for="precio">Precio <span class="text-red-500 font-bold">*</span></label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                  </div>
                  <input type="number" id="precio" name="precio" value="{{ old('precio', $combo->precio) }}"
                    step="0.01"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Precio" required>
                </div>
              </div>

              <div class="md:col-span-2">
                <label for="precio_tachado">Precio Tachado</label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                  </div>
                  <input type="number" id="precio_tachado" name="precio_tachado"
                    value="{{ old('precio_tachado', $combo->precio_tachado) }}" step="0.01"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Precio original (opcional)">
                </div>
              </div>

              <div class="md:col-span-1">
                <label for="stock">Stock</label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-box"></i>
                  </div>
                  <input type="number" id="stock" name="stock" value="{{ old('stock', $combo->stock ?? 0) }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Stock" required min="0">
                </div>
              </div>

              <div class="md:col-span-1 flex items-center">
                  <label class="inline-flex items-center cursor-pointer">
                    <input id="destacar" name="destacar" type="checkbox" class="sr-only peer"
                      {{ $combo->destacar ? 'checked' : '' }}>
                    <div
                      class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="block ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Destacar</span>
                  </label>
              </div>

              <div class="md:col-span-5">
                <label for="products">Productos del Combo</label>
                <div class="relative mb-2 mt-2">
                  <select id="products" name="products[]" multiple class="mt-1 w-full select2">
                    @foreach ($products as $product)
                      <option value="{{ $product->id }}"
                        @if ($combo->products && $combo->products->contains($product->id)) selected @endif>
                        {{ $product->producto }} - S/ {{ $product->precio }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="md:col-span-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="imagen">Imagen</label>
                
                <div class="flex items-center justify-center w-full">
                    <label for="imagen" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 relative overflow-hidden">
                        
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 z-10" id="imagen_placeholder">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click para subir</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF</p>
                        </div>
                        
                        <img id="imagen_preview" src="{{ $combo->imagen ? asset($combo->imagen) : '' }}" class="{{ $combo->imagen ? '' : 'hidden' }} absolute inset-0 w-full h-full object-contain bg-white" />
                        
                        <input id="imagen" name="imagen" type="file" class="hidden" accept="image/*" />
                    </label>
                </div> 
              </div>

            </div>
          </div>

          <div class="flex justify-end gap-2 mt-4">
            <a href="{{ route('combos.index') }}"
              class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
            <button type="submit"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
          </div>

        </div>
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('.select2').select2({
        placeholder: "Seleccionar productos",
        allowClear: true
      });

      $('#imagen').change(function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            $('#imagen_preview').attr('src', e.target.result).removeClass('hidden');
            $('#imagen_placeholder').addClass('hidden'); // Opcional: ocultar el placeholder si quieres que la imagen cubra todo
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
</x-app-layout>
