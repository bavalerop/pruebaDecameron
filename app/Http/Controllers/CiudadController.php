<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CiudadModel;
use DB;

class CiudadController extends Controller
{
    //Todas las ciudades
    public function index(){
    	$Ciudad = CiudadModel::all();
    	if(!empty($Ciudad)){
    		return response()->json(['CODE' => 'OK','DATA' => $Ciudad]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No hay ciudades en la BD']);
    	}
    }

    public function create(Request $request){

    	if(!empty($request)){
    		foreach ($request->all() as $req){
	    		$Ciudad = new CiudadModel();
		    	$Ciudad->ciu_nombre = $req['nombre'];
		    	$Ciudad->save();
	    	}


    		return response()->json(['CODE' => 'OK','message' => 'Insercion exitosa']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No envio ninguna ciudad']);
    	}
    }

    public function show($id){

    	$Ciudad=CiudadModel::find($id);
    	if(!empty($Ciudad)){
    		return response()->json(['CODE' => 'OK','DATA' => $Ciudad]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe la ciudad en la BD']);
    	}
    }

    public function update(Request $request,$id){
        $Ciudad=CiudadModel::find($id);

      if(!empty($Ciudad)){
          foreach ($request->all() as $req){
              $nombre = $req['nombre'];
          }
          $Ciudad->ciu_nombre =  $nombre;
          $Ciudad->save();
          return response()->json(['CODE' => 'OK','DATA' => 'Actualizacion Exitosa']);
      }else{
          return response()->json(['CODE' => 'ERROR','message' => 'No existe la ciudad en la BD']);
      }
  }

    public function delete($id){

    	$Ciudad=CiudadModel::find($id);

    	if(!empty($Ciudad)){
    		CiudadModel::destroy($id);
    		return response()->json(['CODE' => 'OK','DATA' => 'Ciudad eliminada con exito']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe la ciudad en la BD']);
    	}
    }
}
