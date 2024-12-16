<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\supplier;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductsController extends Controller
{

    public function index()
    {


    $query = Http::withHeaders([
        'Authorization' => Session::get('Token'),
        ])->get('http://localhost:3000/api/products');
            

        if($query->failed()){
        return back()->withErrors(['No se pudo hacer la consulta']);

        }

         $data=$query['data']['products'];

        return view('productos/productos',compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()

    { 
       return view('productos/producto_agregar');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'nombre'=>'required',
            'tipo'=>'required',
            'precio'=>'required',
            'descripcion'=>'required',
            'valorPuntos'=>'required|integer',
        ]);
    

        $http=Http::baseUrl('');


    if($request->hasFile('imagen')){
        $http->attach('imagen',file_get_contents($request->imagen->getpathname()),
                $request->imagen->getClientOriginalName(),     
            );
    }


   // dd($http);

    try {
        $response = $http->withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->withoutVerifying()->post('http://localhost:3000/api/products', [
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'status' => 'disponible',
            'imagen' => $request->imagen,
            'valorPuntos'=>$request->valorPuntos
    
        ]);

    
        return redirect()->back()->with('Exito','Producto agregado con exito');
    


        //dd($response->json()); 
    } catch (\Exception $e) {
        dd($e->getMessage()); 
    }


    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    public function edit($id)
    {
        
    $query = Http::withHeaders([
        'Authorization' => Session::get('Token'), // Add your token
    ])->get('http://localhost:3000/api/products/'.$id);
    //dd($query);

    $data=$query['data']['product'];
    return view('/productos/producto_editar',compact('data'));
    }





    public function update(Request $request,$id)
    {
       
       $http=Http::baseUrl('');

       if($request->hasFile('imagen')){
           $http->attach('imagen',file_get_contents($request->imagen->getpathname()),
                   $request->imagen->getClientOriginalName(),    
       );
       }

 

       $response = $http->withHeaders([
            'Authorization' => Session::get('Token'), 
        ])->withoutVerifying()->put('http://localhost:3000/api/products/'.$id, [
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'status' => $request->status,
          'imagen' => $request->imagen,
            'valorPuntos'=>$request->valorPuntos,
        ]);

               dd(json_decode($response));

                if($response){
                    return back()->with('mensaje','No fue posibre realizar el registro');
                }

        return redirect()->back()->with('Exito','Producto actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

      $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->delete('http://localhost:3000/api/products/'.$id);
      
        
        if(!$response->successful()){
            return back()->with('mensaje','No fue posible actualizar el registro');
        }
        return redirect('/productos/productos')->with('mensaje','Registro actualizado con exito');
    

    }
}
