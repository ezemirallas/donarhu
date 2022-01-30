<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Donacion;
use Iluminate\Support\Facades\Redirect;
use app\Http\Requests\DonacionFormRequest;
use DB;

class DonacionController extends Controller
{
    public function __construct(){

    }

    public function index(){

    }

    public function check(Request $request){
        return view('check', [
            "amount" => $request['amount'],
            "dni" => $request['dni'],
            "nombre" => $request['nombre'],
            "apellido" => $request['apellido'],
            "telefono" => $request['telefono'],
            "domicilio" => $request['domicilio'],
            "preference_id" => $request['preference_id'],
      ]);
    }

    public function store(Request $request){ 
       Donacion::create($request->all());
       return redirect($request['checkout']);
    }

    public function success(Request $request){

        if($this->update($request)){
            return view('success', [
                "payment_id" => $request['payment_id'],
                "status" => $request['status'],
                "payment_type" => $request['payment_type'],
                "order_id" => $request['merchant_order_id'],
                "preference_id" => $request['preference_id'],
            ]);
        }
        else{
            return view('/');
        }

    }

    public function pending(Request $request){
        
        if($this->update($request)){
            return view('pending', [
                "payment_id" => $request['payment_id'],
                "status" => $request['status'],
                "payment_type" => $request['payment_type'],
                "order_id" => $request['merchant_order_id'],
                "preference_id" => $request['preference_id'],
            ]);
        }
        else{
            return view('/');
        }

    }

    public function failure(Request $request){
        
        if($this->update($request)){
            return view('failure', [
                "payment_id" => $request['payment_id'],
                "status" => $request['status'],
                "payment_type" => $request['payment_type'],
                "order_id" => $request['merchant_order_id'],
                "preference_id" => $request['preference_id'],
            ]);
        }
        else{
            return view('/');
        }

    }

    private function update(Request $request){
        $donacion = Donacion::where('preference_id', $request['preference_id'])->update([
            'status'=> $request['status'],
            'payment_id'=> $request['payment_id'],
            'payment_type'=> $request['payment_type'],
            'order_id'=> $request['merchant_order_id'],
        ]);

        return $donacion;
    }
}


    