<?php

namespace App\Http\Controllers;

use App\DashGeneral;

use Illuminate\Http\Request;
use App\Ventas;
use App\Producto;

use App\CuentaCorriente;


class DashGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $from = date('Y-m-01'); // hard-coded '01' for first day
        $to  = date('Y-m-t');

        $importeVendidoMesActual = Ventas::whereBetween('created_at', [$from, $to])
                                                            ->selectRaw('sum(importe) as importe')
                                                            
                                                            ->get();
                                                     

        $cantidadEntregadasVendidoMesActual = Ventas::whereBetween('created_at', [$from, $to])
                                                            ->where('estado','=', 2)
                                                      
                                                            ->count();




        $carteraIngresaImporte= CuentaCorriente::where('tipo_movimiento','=', '1')->selectRaw('sum(importe) as importe')->selectRaw('tipo_movimiento')->groupBy('tipo_movimiento')->get();
        $carteraSaleImporte= CuentaCorriente::where('tipo_movimiento','=', '2')->selectRaw('sum(importe) as importe')->selectRaw('tipo_movimiento')->groupBy('tipo_movimiento')->get();
        $carteraDeudaImporte= CuentaCorriente::where('tipo_movimiento','=', '3')->selectRaw('sum(importe) as importe')->selectRaw('tipo_movimiento')->groupBy('tipo_movimiento')->get();


        $prodAltoStock = Producto::where("stock",">",12)->take(15)->orderBy('stock', 'asc')->get(); 
        $prodBajoStock = Producto::where("stock","<",5)->where("stock","<>",0)->orderBy('stock', 'desc')->take(15)->get(); 
        $prodCeroStock = Producto::where("stock","=",0)->take(999)->get();



        return view('dash', 
        
        compact(
            'importeVendidoMesActual',
            'prodAltoStock',
            'prodBajoStock','prodCeroStock',
            'cantidadEntregadasVendidoMesActual',
            'carteraIngresaImporte', 
            'carteraSaleImporte',
            'carteraDeudaImporte')

        );



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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DashGeneral  $dashGeneral
     * @return \Illuminate\Http\Response
     */
    public function show(DashGeneral $dashGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DashGeneral  $dashGeneral
     * @return \Illuminate\Http\Response
     */
    public function edit(DashGeneral $dashGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DashGeneral  $dashGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashGeneral $dashGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DashGeneral  $dashGeneral
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashGeneral $dashGeneral)
    {
        //
    }
}