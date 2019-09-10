<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelModel;
use DB;

class HotelController extends Controller
{
    //Todos los hoteles
    public function index(){
    	$Hotel = HotelModel::all();
    	if(!empty($Hotel)){
    		return response()->json(['CODE' => 'OK','DATA' => $Hotel]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No hay hoteles en la BD']);
    	}
    }

    public function create(Request $request){

    	if(!empty($request)){
    		foreach ($request->all() as $req){
                $Hotel = new HotelModel();
                $Hotel->hot_nit = $req['hot_nit'];
                $Hotel->hot_nombre = $req['hot_nombre'];
                $Hotel->hot_direc = $req['hot_direc'];
                $Hotel->num_hab = $req['num_hab'];
                $Hotel->ciudad_cod = $req['ciudad_cod'];
		    	$Hotel->save();
	    	}
    		return response()->json(['CODE' => 'OK','message' => 'Insercion exitosa']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No envio ningun hotel']);
    	}
    }

    public function show($id){

    	$Hotel=HotelModel::find($id);
    	if(!empty($Hotel)){
    		return response()->json(['CODE' => 'OK','DATA' => $Hotel]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe el hotel en la BD']);
    	}
    }

    public function update(Request $request,$id){
        $Hotel=HotelModel::find($id);

      if(!empty($Hotel)){
          foreach ($request->all() as $req){
            $hot_nit = $req['hot_nit'];
            $hot_nombre = $req['hot_nombre'];
            $hot_direc = $req['hot_direc'];
            $num_hab = $req['num_hab'];
            $ciudad_cod = $req['ciudad_cod'];
          }
        $Hotel->hot_nit = $hot_nit;
        $Hotel->hot_nombre = $hot_nombre;
        $Hotel->hot_direc = $hot_direc;
        $Hotel->num_hab = $num_hab;
        $Hotel->ciudad_cod = $ciudad_cod;
        $Hotel->save();
          return response()->json(['CODE' => 'OK','DATA' => 'Actualizacion Exitosa']);
      }else{
          return response()->json(['CODE' => 'ERROR','message' => 'No existe el hotel en la BD']);
      }
  }

    public function delete($id){

    	$Hotel=HotelModel::find($id);

    	if(!empty($Hotel)){
    		HotelModel::destroy($id);
    		return response()->json(['CODE' => 'OK','DATA' => 'Hotel eliminada con exito']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe el hotel en la BD']);
    	}
    }
}
