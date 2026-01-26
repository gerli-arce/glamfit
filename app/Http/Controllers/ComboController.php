<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combos = Combo::where("status", "=", true)
            ->orderByDesc('created_at')
            ->get();

        return view('pages.combos.index', compact('combos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $combo = new Combo();
        $products = Products::where('status', '=', 1)->where('visible', '=', 1)->get();
        return view('pages.combos.save', compact('combo', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'required|image'
        ]);

        $body = $request->except('products');

        if ($request->hasFile("imagen")) {
            $manager = new ImageManager(Driver::class);
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img = $manager->read($request->file('imagen'));
            $ruta = 'storage/images/combos/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            $img->save($ruta . $nombreImagen);
            $body['imagen'] = $ruta . $nombreImagen;
        }

        $body['status'] = true;
        $body['destacar'] = $request->has('destacar') ? 1 : 0;
        $body['stock'] = $request->input('stock', 0);

        $combo = Combo::create($body);

        if ($request->has('products')) {
            $combo->products()->sync($request->products);
        }

        return redirect()->route('combos.index')->with('success', 'Combo creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $combo = Combo::findOrFail($id);
        $products = Products::where('status', '=', 1)->where('visible', '=', 1)->get();
        return view('pages.combos.save', compact('combo', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $combo = Combo::findOrFail($id);

        $body = $request->except('products');

        if ($request->hasFile("imagen")) {
            $manager = new ImageManager(new Driver());

            // Delete old image
            if (File::exists($combo->imagen)) {
                File::delete($combo->imagen);
            }

            $ruta = 'storage/images/combos/';
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
            $img = $manager->read($request->file('imagen'));

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            $img->save($ruta . $nombreImagen);
            $body['imagen'] = $ruta . $nombreImagen;
        }

        $combo->update($body);
        $combo->stock = $request->input('stock', 0);
        $combo->destacar = $request->has('destacar') ? 1 : 0;
        $combo->save();

        if ($request->has('products')) {
            $combo->products()->sync($request->products);
        } else {
            $combo->products()->detach();
        }

        return redirect()->route('combos.index')->with('success', 'Combo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function deleteCombo(Request $request)
    {
        $id = $request->id;
        $combo = Combo::findOrFail($id);
        $combo->status = false;
        $combo->save();
        return response()->json(['message' => 'Combo eliminado']);
    }

    public function updateVisible(Request $request)
    {
        $id = $request->id;
        $field = $request->field;
        $status = $request->status;
        $combo = Combo::findOrFail($id);
        $combo->$field = $status;
        $combo->save();
        return response()->json(['message' => 'Combo modificado']);
    }
}
