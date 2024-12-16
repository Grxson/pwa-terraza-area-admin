<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{

    //VISTA EXCLUSIVA DEL COCINERO

    public function cook(){

        $query = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->get('http://localhost:3000/api/orders');
        //dd(json_decode($query));
        $data=$query['data']['orders'];
        //dd($data);

        return view('/orders/orders_cook',compact('data'));


    }

    public function cook_show($id){

        $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
         ])->get("http://localhost:3000/api/orders/cook/".$id);

        $data=$response['data']['orders'];
          // dd($data);
        
        if(!$response->successful()){
            return back()->with('mensaje','No fue posible actualizar el registro');
        }

        return view('/orders/orders_cook_editar',compact('data','id'));


    }





    public function index()
    {   

        $query = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->get('http://localhost:3000/api/orders');
        //dd(json_decode($query));
        $data=$query['data']['orders'];
        //dd($data);

        return view('/orders/orders',compact('data'));


    }

    public function destroy( $id)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->delete('http://localhost:3000/api/orders/'.$id);
      
        //dd($response);
        
        if(!$response->successful()){
            return back()->with('mensaje','No fue posible actualizar el registro');
        }
        return redirect()->to('Order.index');

        
    }


    public function update($id)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), 
        ])->put('http://localhost:3000/api/orders/'.$id);
      
        dd(json_decode($response));
        
        if(!$response->successful()){
            return back()->with('mensaje','No fue posible actualizar el registro');
        }
        return redirect('/orders/orders')->with('mensaje','Registro actualizado con exito');
    }




    public function show($id)
    {
         $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
         ])->get("http://localhost:3000/api/orders/cook/".$id);

        $data=$response['data']['orders'];
          // dd($data);
        
        if(!$response->successful()){
            return back()->with('mensaje','No fue posible actualizar el registro');
        }
        return view('/orders/orders_editar',compact('data','id'));

    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
 


}
