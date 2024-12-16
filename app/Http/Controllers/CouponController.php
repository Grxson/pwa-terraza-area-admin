<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;



class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->get('http://localhost:3000/api/coupons');
        //dd($query);
            
        $data=$query['data']['coupons'];
        //dd($data);

        return view('/coupon/coupon',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
    
        return view('/coupon/coupon_agregar');



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre'=>'required',
            'descuento'=>'required',
            'descripcion'=>'required',
            'costoPuntos'=>'required',
        ]);



        $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->withoutVerifying()->post('http://localhost:3000/api/coupons', [

            'nombre'=>$request->nombre,
            'descuento'=>$request->descuento,
            'status' =>'disponible',
            'descripcion'=>$request->descripcion,
            'costoPuntos'=>$request->costoPuntos,
                     ]);



             if(!$response->successful()){
                        return back()->with('mensaje','No fue posibre realizar el registro');
                    }


        return redirect()->back()->with('Exito','Cupon agregado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $query = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->get('http://localhost:3000/api/coupons/'.$id);
        //dd($query);
    
        $data=$query['data']['coupon'];
       // dd($data);
        return view('/coupon/coupon_editar',compact('data'));
        



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre'=>'required',
            'descuento'=>'required',
            'descripcion'=>'required',
            'costoPuntos'=>'required',
        ]);



        $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), 
            ])->withoutVerifying()->put('http://localhost:3000/api/coupons/'.$id,[
                'nombre'=>$request->nombre,
                'descuento'=>$request->descuento,
                'descripcion'=>$request->descripcion,
                'costoPuntos'=>$request->costoPuntos,
    
                    ]);

                  //  dd($response);



         
        if(!$response->successful()){
            return back()->with('mensaje','No fue posibre realizar el registro');
        }

       //dd($response);


       



    
        return redirect()->back()->with('Exito','Información del cupon actualizada con exito');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->delete('http://localhost:3000/api/coupons/'.$id);
      
        //dd($response);
        
        if(!$response->successful()){
            return back()->with('mensaje','No fue posible actualizar el registro');
        }
        return redirect('Coupon.index')->with('mensaje','Registro actualizado con exito');
    }
}
