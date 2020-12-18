<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Producto;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $productos = Producto::orderBy('etiqueta')->get();
        $compras = Compra::all();

        return view('compras', compact('productos','compras'));


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
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'rela_producto' => 'required',
            'cantidad' => 'required',
            'importe' => 'required',
           
        ]);

        $cantidadCompra = $request->input('cantidad');
        $producto = Producto::findorfail( $request->input('rela_producto'));
        $producto->stock =$producto->stock +  $cantidadCompra;
        $producto->save();
        
        Compra::create($input);

        return back()->with('success','Compra creada correctamente. El producto, '.$producto->etiqueta . ' cuenta con '.$producto->stock.'botellas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
