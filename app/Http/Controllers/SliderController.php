<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsRoot');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::where("status", "=", true)->orderBy('order', 'asc')->get();

        return view('pages.sliders.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);


        $slider = new Slider();


        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(new Driver());

            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img = $manager->read($request->file('imagen'));
            // $img->coverDown(968, 351, 'center');
            $basePath = 'images/slider/';
            $path = storage_path('app/public/' . $basePath);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $img->save($path . $nombreImagen);

            $slider->url_image = 'storage/' . $basePath;
            $slider->name_image = $nombreImagen;
        }

        if ($request->hasFile("link1")) {

            $manager = new ImageManager(new Driver());

            $nombreImagen = Str::random(10) . '_' . $request->file('link1')->getClientOriginalName();
            $img = $manager->read($request->file('link1'));

            $basePath = 'images/slider/';
            $path = storage_path('app/public/' . $basePath);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $img->save($path . $nombreImagen);
            $slider->link1 = 'storage/' . $basePath . $nombreImagen;

        }

        $slider->botontext1 = $request->botontext1;
        $slider->botontext2 = $request->botontext2;
        $slider->link2 = $request->link2;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->order = $request->order;



        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $slider = Slider::find($id);

        return view('pages.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrfail($id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->botontext1 = $request->botontext1;
        $slider->link1 = $request->link1;
        $slider->botontext2 = $request->botontext2;
        $slider->link2 = $request->link2;
        $slider->order = $request->order;


        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(new Driver());
            $rutaEliminar = storage_path('app/public/images/slider/') . $slider->name_image;

            if (File::exists($rutaEliminar)) {
                File::delete($rutaEliminar);
            }

            $basePath = 'images/slider/';
            $path = storage_path('app/public/' . $basePath);
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img = $manager->read($request->file('imagen'));

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $img->save($path . $nombreImagen);
            $slider->url_image = 'storage/' . $basePath;
            $slider->name_image = $nombreImagen;
        }


        if ($request->hasFile("imagemobile")) {

            $manager = new ImageManager(new Driver());

            if ($slider->link1) {
                $rutaEliminar = public_path($slider->link1);
                if (File::exists($rutaEliminar)) {
                    File::delete($rutaEliminar);
                }
            }

            $nombreImagen = Str::random(10) . '_' . $request->file('imagemobile')->getClientOriginalName();
            $img = $manager->read($request->file('imagemobile'));

            $basePath = 'images/slider/';
            $path = storage_path('app/public/' . $basePath);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $img->save($path . $nombreImagen);

            $slider->link1 = 'storage/' . $basePath . $nombreImagen;

        }



        $slider->update();

        return redirect()->route('slider.index')->with('success', 'Slider actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }




    public function deleteSlider(Request $request)
    {
        //Recupero el id mandado mediante ajax
        $id = $request->id;
        //Busco el servicio con id como parametro
        $service = Slider::findOrfail($id);
        //Modifico el status a false
        $service->status = false;
        //Guardo 
        $service->save();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Slider eliminado.']);
    }



    public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $service = Slider::findOrFail($id);

        $service->$field = $status;

        $service->save();

        return response()->json(['message' => 'Slider eliminado.']);
    }
}
