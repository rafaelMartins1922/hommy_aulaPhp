<?php
/*
    Controller de Repúblicas     
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Republic;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\RepublicRequest;
class RepublicController extends Controller


{
    /*
        Criar república
    */
    public function createRepublic(RepublicRequest $request){
        $republic = new Republic;
        $republic->createRepublic($request);
        return response()->json($republic);
    }

    /*
        buscar república por id
    */
    public function showRepublic($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }

    /*
        Listar todas as repúblicas
    */

    public function listRepublic(){
        $republic = Republic::all();
        return response()->json([$republic]);
    }

    /*
        Alterar república
    */

    public function updateRepublic(RepublicRequest $request,$id){
        $republic = Republic::findOrFail($id);
        $republic->updateRepublic($request);
        return response()->json($republic);
    }

    /*
        Excluir república
    */
    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(["República deletada."]);
    }

    public function locatario($id){
        $republic = Republic::findOrFail($id);
        $locatarios = $republic->userLocatario;
        return response()->json($locatarios);
    }

    public function locador($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic->user);
    }   

}
