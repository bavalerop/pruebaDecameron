<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcomodacionModel;
use DB;

class AcomodacionController extends Controller
{
    //Todas las acomodaciones
    public function index(){
    	$Acomodacion = AcomodacionModel::all();
    	if(!empty($Acomodacion)){
    		return response()->json(['CODE' => 'OK','DATA' => $Acomodacion]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No hay Acomodaciones en la BD']);
    	}
    }

    public function create(Request $request){

    	if(!empty($request)){
    		foreach ($request->all() as $req){
	    		$Acomodacion = new AcomodacionModel();
		    	$Acomodacion->aco_nombre = $req['nombre'];
		    	$Acomodacion->save();
	    	}


    		return response()->json(['CODE' => 'OK','message' => 'Insercion exitosa']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No envio ninguna Acomodacion']);
    	}
    }

    public function show($id){

    	$Acomodacion=AcomodacionModel::find($id);
    	if(!empty($Acomodacion)){
    		return response()->json(['CODE' => 'OK','DATA' => $Acomodacion]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe la acomodacion en la BD']);
    	}
    }

    public function update(Request $request,$id){
        $Acomodacion=AcomodacionModel::find($id);

      if(!empty($Acomodacion)){
          foreach ($request->all() as $req){
              $nombre = $req['nombre'];
          }
          $Acomodacion->aco_nombre = $nombre;
          $Acomodacion->save();
          return response()->json(['CODE' => 'OK','DATA' => 'Actualizacion Exitosa']);
      }else{
          return response()->json(['CODE' => 'ERROR','message' => 'No existe la Acomodacion en la BD']);
      }
  }

    public function delete($id){

    	$Acomodacion=AcomodacionModel::find($id);

    	if(!empty($Estudiante)){
    		AcomodacionModel::destroy($id);
    		return response()->json(['CODE' => 'OK','DATA' => 'Acomodacion eliminada con exito']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe la Acomodacion en la BD']);
    	}
    }
}
