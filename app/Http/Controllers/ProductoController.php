<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $productos = Producto::orderBy('etiqueta')->get();
        return view('productos', compact('productos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function editarGet(Request $request, $idProducto)
    {
        $prod = Producto::findorfail($idProducto)->get();
        return view('productoEditar', compact('prod'));
    }

    
    public function editarPost(Request $request, $idProducto)
    {
 
        Producto::findorfail($idProducto)->get();

        Producto::where('id', $idProducto )->update(
            ['etiqueta'=> $request->input('etiqueta'),
            'cepa'=> $request->input('cepa'),
            'precio'=> $request->input('precio'),
            'stock'=> $request->input('stock'),
            'precio_ml'=> $request->input('precio_ml')]);

        return back()->with('success','Producto editado correctamente.');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'cepa' => 'required',
            'etiqueta' => 'required',
           
        ]);

        Producto::create($input);

        return back()->with('success','Producto  creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
