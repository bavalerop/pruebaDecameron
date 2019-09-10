<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsigAcomodacionModel;
use App\HotelModel;
use DB;

class AsigAcomodacionController extends Controller
{
    //Todas las asignaciones de acomodaciones
    public function index(){
    	$AsigAcomodacion = AsigAcomodacionModel::all();
    	if(!empty($AsigAcomodacion)){
    		return response()->json(['CODE' => 'OK','DATA' => $AsigAcomodacion]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No hay asignacion de acomodaciones en la BD']);
    	}
    }

    public function create(Request $request){
        $Hab=0;
        $Num=0;
        $faltantes=0;
    	if(!empty($request)){
    		foreach ($request->all() as $req){
                $AsigAcomodacion = new AsigAcomodacionModel();
                $AsigAcomodacion->cant_hab = $req['cant_hab'];
                $AsigAcomodacion->thab_cod = $req['thab_cod'];
                $AsigAcomodacion->aco_cod = $req['aco_cod'];
                $AsigAcomodacion->hot_cod = $req['hot_cod'];
                $Hotel=HotelModel::find($req['hot_cod']);
                if(!empty($Hotel)){
                    $Hab=$Hotel->num_hab;
                }
                $Num = DB::select(DB::raw("select count(cant_hab) from asig_acomodacion where hot_cod=".$req['hot_cod']));
                $faltantes=$Hab-$Num;
                if($faltantes>=$req['cant_hab']){
                    $AsigAcomodacion->save();
                }else{
                    return response()->json(['CODE' => 'ERROR','message' => 'La cantidad de Habitaciones que ingreso supera el limite de este hotel']);
                }
	    	}
    		return response()->json(['CODE' => 'OK','message' => 'Insercion exitosa']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No envio ninguna asignacion de acomodacion']);
    	}
    }

    public function show($id){

    	$AsigAcomodacion=AsigAcomodacionModel::find($id);
    	if(!empty($AsigAcomodacion)){
    		return response()->json(['CODE' => 'OK','DATA' => $AsigAcomodacion]);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe la asignacion de acomodacion en la BD']);
    	}
    }

    public function update(Request $request,$id){
        $AsigAcomodacion=AsigAcomodacionModel::find($id);
        $Hab=0;
        $Num=0;
        $faltantes=0;
         if(!empty($AsigAcomodacion)){
          foreach ($request->all() as $req){
              $cant_hab = $req['cant_hab'];
              $thab_cod = $req['thab_cod'];
              $aco_cod = $req['aco_cod'];
              $hot_cod = $req['hot_cod'];
          }
          $AsigAcomodacion->cant_hab = $cant_hab;
          $AsigAcomodacion->thab_cod = $thab_cod;
          $AsigAcomodacion->aco_cod = $aco_cod;
          $AsigAcomodacion->hot_cod = $hot_cod;
          $Hotel=HotelModel::find($hot_cod);
          if(!empty($Hotel)){
            $Hab=$Hotel->num_hab;
          }
          $Num = DB::select(DB::raw("select count(cant_hab) from asig_acomodacion where hot_cod=".$hot_cod));
          $faltantes=$Hab-$Num;
                if($faltantes>=$req['cant_hab']){
                    $AsigAcomodacion->save();
                }else{
                    return response()->json(['CODE' => 'ERROR','message' => 'La cantidad de Habitaciones que ingreso supera el limite de este hotel']);
                }
          return response()->json(['CODE' => 'OK','DATA' => 'Actualizacion Exitosa']);
      }else{
          return response()->json(['CODE' => 'ERROR','message' => 'No existe la asignacion de acomodacion en la BD']);
      }
  }

    public function delete($id){

    	$AsigAcomodacion=AsigAcomodacionModel::find($id);

    	if(!empty($AsigAcomodacion)){
    		AsigAcomodacionModel::destroy($id);
    		return response()->json(['CODE' => 'OK','DATA' => 'Asignacion de acomodacion eliminada con exito']);
    	}else{
    		return response()->json(['CODE' => 'ERROR','message' => 'No existe la asignacion de acomodacion en la BD']);
    	}
    }
}
