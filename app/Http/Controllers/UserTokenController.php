<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class UserTokenController extends Controller
{
    private $url ="http://localhost:3000/api/auth/";


public function login(){

    return view('auth.login');
            }


    public function in(Request $request){
        $response=Http::post($this->url.'login',[
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        //dd($response);
        if($response->failed()){
            return back()->withErrors(['Error no fue posible establecer comunicacion']);
        }

        //dd(request()->cookie());
        //request()->cookie();




        $json=json_decode($response->body());
      // dd($json);

        $token=$json->data->token;
        $TipoDeAcceso = $json->data->tipo;


        if(!$token){
            return back()->withErrors(['Credenciales invalidas']);
        }



    //dd($TipoDeAcceso);
    Session::put('Token',$token);
    Session::put('TipoDeAcceso',$TipoDeAcceso);


if($TipoDeAcceso=="admin"){
return redirect()->route('dashboard');
}

else{
    //return redirect()->route('dashboard');
   //$love= url()->current();

   //dd($love);

    return redirect()->to('Cook.index');

}       



        //return redirect()->route('dashboard');


    }

    public function out(Request $request){
           $response=Http::get($this->url.'logout');
           Session::forget('Token');
           Session::regenerate(); 
           return redirect()->route('login.form');

    }




}
