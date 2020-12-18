<?php

namespace App\Http\Controllers;

use App\Ventas;
use App\Producto;
use App\Cliente;
use App\VentaItem;
use App\CuentaCorriente;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Ventas::all();
        $productos = Producto::orderBy('etiqueta')->get();
        $clientes = Cliente::all();    
    
        session()->put('cart', array() );   
    
        return view('ventas', compact('ventas','clientes', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pedidos()
    {
        $pedidos =        Ventas::where('estado','=', 1)->get();

        $pedidosHoy =        Ventas::where('estado','=', 1)->whereRaw('Date(fecha_entrega) = CURDATE()')->count();

        return view('pedidos', compact('pedidos','pedidosHoy'));

    }


    public function pedidosAll()
    {
        $pedidos =   Ventas::all();


        return view('pedidosAll', compact('pedidos'));

    }


    public function cambioEstado(Request $request){

       if ( Ventas::where('id', $request->input('id_venta'))->update(['estado'=> $request->input('estado')]) ){

        if ($request->input('estado') == 2) {
            return back()->with('message','Venta Entregada.');
        }

        if ($request->input('estado')==3){
            return back()->with('message','Venta Cancelada.');

        }
    }else{
        return back()->with('message','Error.');

    }


    }




    public function store(Request $request)
    {
        
        $carrito = session()->get('cart');
        
        if ( $carrito!= null && count($carrito) > 0 ){
            $input = $request->all();

            $request->validate([
                'rela_cliente' => 'required',
                'fecha_entrega' => 'required',
                'importe' => 'required', 
                'medio_pago'=> 'required'          
            ]);


   

            
        //ok abajo
            $venta = Ventas::create($input);

            foreach ($carrito as $item){
                //ajustamos stock
                $producto= Producto::find( $item['id']);
                $producto->stock = $producto->stock -  $item['cantidad'];
                $producto->save();
                //guardmaos item venta
                $ventaItem = new VentaItem();
                $ventaItem->rela_venta = $venta->id;
                $ventaItem->rela_producto = $item['id'];
                $ventaItem->cantidad = $item['cantidad'];
                $ventaItem->importe = $item['importe'];	
                $ventaItem->save();

            }


            // REGISTRAMOS MOVIMIENTO EN CTA CTE
            $array =   array(
                'tipo_movimiento' => 1,
                'rela_venta' =>  $venta->id,
                'importe' => $request->input('importe'), 
                'medio_pago' => $request->input('medio_pago'), 
                'descripcion'=> 'VENTA', 
                'proveedor'=> null          
            );
            CuentaCorriente::create($array);


            return back()->with('success','Venta creada correctamente.');

        }else{
        
            return back()->with('false','No agregaste items al carrito.');

        }


    }

    public function addCart(Request $request)
    {
        $product = Producto::find($request->input('rela_producto'));
        $cart = Session::get('cart');

        $cart[$product->id] = array(
            "id" => $product->id,
            "etiqueta" => $product->etiqueta,
            "importe" => $product->precio,
            "cantidad" => $request->input('cantidad')
        );
    
        Session::put('cart', $cart);
        Session::flash('success','Agregado');
        return view('carrito', compact('cart'));

    }

    
    
    public function deleteCart(Request $request)
    {

        Session::forget('cart'); // Removes a specific variable

        $cart = null;
        
       return view('carrito', compact('cart'));
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show(Ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ventas $ventas)
    {
        //
    }
}