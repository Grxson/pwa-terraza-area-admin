<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $query = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->get('http://localhost:3000/api/employee/index');
            



           // dd(json_decode($query));
            $data=$query['data']['employee'];

            //dd($data);

         if($query->failed()){
            return back()->withErrors(['No se pudo hacer la consulta']);

            }
    
         //dd($data);
         return view('employee/employee',compact('data')); 

    
    }



    // public function index_inactive()
    // {
    //     $query = Http::withToken(Session::get('Token'))-> 
    //     withoutVerifying()->get("http://127.0.0.1:8000/api/Proveedor_Inactive");


    //      if($query->failed()){
    //         return back()->withErrors(['No se pudo hacer la consulta']);

    //         }
    
    //      $data=$query['data']['suppliers'];
    //      //dd($data);
    //      return view('suppliers/suppliers_inactive',compact('data'));

    
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Session::get('Token')==null){

            return back()->withErrors(['No se pudo hacer la consulta']);
    
           } 
    
    
            $request->validate([
                'nombre'=>'required',
                'apellidoP'=>'required',
                'apellidoM'=>'required',
                'email'=>'required',
                'telefono'=>'required|min:10|max:10',

            ]);



            try {

                $response = Http::withHeaders([
                    'Authorization' => Session::get('Token'), // Add your token
                ])->withoutVerifying()->post('http://localhost:3000/api/auth/signup', [
                    'nombre' => $request->nombre,
                    'apellidoP' => $request->apellidoP,
                    'apellidoM' => $request->apellidoM,
                    'password'=>$request->email,
                    'tipo'=>'empleado',
                    'email' => $request->email,
                    'telefono' => $request->telefono,

                ]);

                return redirect()->back()->with('Exito','Empleado agregado con exito');

                //dd($response->json()); 
            } catch (\Exception $e) {
               // dd($e->getMessage()); 
               return redirect()->back()->with('Exito',$e->getMessage());

            }


            

    
    }





    public function edit($id)
    {
        $query = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->get('http://localhost:3000/api/employee/show/'.$id);
            
           // dd($query);    
            $data=$query['data']['employee'];

            return view('/employee/employee_editar',compact('data'));


    }

    public function add(supplier $supplier)
    {
      return view('/employee/employee_agregar');

    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre'=>'required',
            'apellidoP'=>'required',
            'apellidoM'=>'required',
            'email'=>'required',
            'telefono'=>'required',
        ]);



          //  dd("HI");
            $response = Http::withHeaders([
                'Authorization' => Session::get('Token'), 
                ])->withoutVerifying()->put('http://localhost:3000/api/employee/'.$id, [
                'nombre' => $request->nombre,
                'apellidoP' => $request->apellidoP,
                'apellidoM' => $request->apellidoM,
                'email' => $request->email,
                'telefono' => $request->telefono,
            ]);

            
           //  dd($response);

        if($response->failed()){
            return back()->with('mensaje','No fue posibre realizar el registro');
        }

return redirect()->back()->with('Exito','Empleado actualizado con exito');        //dd(json_decode($response));
    }




    public function destroy($id)
    {
            
    
      $response = Http::withHeaders([
            'Authorization' => Session::get('Token'), // Add your token
        ])->delete('http://localhost:3000/api/employee/'.$id);

        if(!$response->successful()){
            return back()->with('mensaje','No fue posible actualizar el registro');
        }
        return redirect('Employee.index')->with('mensaje','Registro actualizado con exito');
    



    }
}
