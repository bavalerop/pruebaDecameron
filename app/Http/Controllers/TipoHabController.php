<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoHabModel;
use DB;


class TipoHabController extends Controller
{
    //Todos los tipos de habitaciones
    public function index(){
    	$TipoHab = TipoHabModel::all();
    	if(!empty($Acomodacion)){
    		return response()->json(['CODE' => 'OK','DATA' => $TipoHab]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No hay tipos de habitaciones en la BD']);
    	}
    }

    public function create(Request $request){

    	if(!empty($request)){
    		foreach ($request->all() as $req){
	    		$TipoHab = new TipoHabModel();
		    	$TipoHab->thab_nombre = $req['nombre'];
		    	$TipoHab->save();
	    	}
    		return response()->json(['CODE' => 'OK','message' => 'Insercion exitosa']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No envio ningun tipo de habitacion']);
    	}
    }

    public function show($id){

    	$TipoHab=TipoHabModel::find($id);
    	if(!empty($TipoHab)){
    		return response()->json(['CODE' => 'OK','DATA' => $TipoHab]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe el tipo de habitacion en la BD']);
    	}
    }

    public function update(Request $request,$id){
        $TipoHab=TipoHabModel::find($id);

      if(!empty($TipoHab)){
          foreach ($request->all() as $req){
              $nombre = $req['nombre'];
          }
          $TipoHab->thab_nombre = $nombre;
          $TipoHab->save();
          return response()->json(['CODE' => 'OK','DATA' => 'Actualizacion Exitosa']);
      }else{
          return response()->json(['CODE' => 'ERROR','message' => 'No existe el tipo de habitacion en la BD']);
      }
  }

    public function delete($id){

    	$TipoHab=TipoHabModel::find($id);

    	if(!empty($TipoHab)){
    		TipoHabModel::destroy($id);
    		return response()->json(['CODE' => 'OK','DATA' => 'Tipo de habitacion eliminado con exito']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe el tipo de habitacion en la BD']);
    	}
    }
}
