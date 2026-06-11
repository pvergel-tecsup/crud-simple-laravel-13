<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $productos = Producto::orderBy('nombre')->simplePaginate(2);

            return view('productos.index', compact('productos'));

        } catch (Exception $err) {
            Log::error('Error obteniendo la lista de productos: ' . $err->getMessage());
            return back()->withInput()
                         ->with('error', 'Ocurrió un error al intentar obtener la lista de productos.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        try {
            $categorias = Categoria::all();

            return view('productos.create', compact('categorias'));

        } catch (Exception $err) {
            Log::error('Error obteniendo la lista de categorías: ' . $err->getMessage());
            return back()->withInput()
                         ->with('error', 'Ocurrió un error al intentar obtener la lista de categorías.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required','string','max:150'],
            'precio' => ['required','numeric','min:10'],
            'stock' => ['integer','min:1'],
            'id_categoria' => ['required','exists:categoria,id']
        ]);

        try {
            Producto::create([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'stock' => $request->stock,
                'id_categoria' => $request->id_categoria
            ]);

            return redirect()->route('productos.index')
                             ->with('success', 'Producto creado exitosamente.');
        } catch (Exception $err) {
            Log::error('Error creando un producto: ' . $err->getMessage());
            return back()->withInput()
                         ->with('error', 'Ocurrió un error al crear un producto.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $producto = Producto::find($id);

            return view('productos.show', compact('producto'));

        } catch (Exception $err) {
            Log::error('Error obteniendo un producto: ' . $err->getMessage());
            return back()->withInput()
                         ->with('error', 'Ocurrió un error al intentar obtener un producto.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        
        try {
            $producto = Producto::find($id);
            $categorias = Categoria::all();

            return view('productos.edit', compact('producto', 'categorias'));

        } catch (Exception $err) {
            Log::error('Error obteniendo un producto: ' . $err->getMessage());
            return back()->withInput()
                         ->with('error', 'Ocurrió un error al intentar obtener un producto.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => ['required','string','max:100'],
            'precio' => ['required','numeric','min:10'],
            'stock' => ['integer','min:1'],
            'id_categoria' => ['required','exists:categoria,id']
        ]);

        try {
            $producto = Producto::find($id);

            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->stock = $request->stock;
            $producto->id_categoria = $request->id_categoria;
            $producto->save();

            return redirect()->route('productos.index');

        } catch (Exception $err) {
            Log::error('Error al actualizar un producto: ' . $err->getMessage());
            return back()->withInput()
                         ->with('error', 'Ocurrió un error al actualizar el producto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Producto::find($id)->delete();

            return redirect()->route('productos.index');

        } catch (Exception $err) {
            Log::error('Error creando un producto: ' . $err->getMessage());
            return back()->withInput()
                         ->with('error', 'Ocurrió un error al eliminar el producto.');
        }
    }
}
