<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;
class UserController extends Controller
{
    /*
        Criar usuário
    */
    public function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->descricao = $request->descricao;

        $user->save();
        return response()->json($user);
    }

    /*
        Buscar usuario por id
    */

    public function showUser($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /*
        Listar usuários
    */

    public function listUser(){
        $user = User::all();
        return response()->json($user);
    }

    /*
        Alterar usuário
    */

    public function updateUser(Request $request,$id){
        $user = User::findOrFail($id);
        if($request->name){
            $user->name = $request->name;
        }
        if($request->email){
            $user->email = $request->email;
        }
        if($request->password){
            $user->password = $request->password;
        }
        if($request->phone){
            $user->phone = $request->phone;
        }
        if($request->date){
            $user->birth_date = $request->birth_date;
        }
        if($request->descricao){
            $user->descricao = $request->descricao;
        }
        $user->save();
        return response()->json($user);
    }

    /*
        Deletar usuário
    */

    public function deleteUser($id){
        User::destroy($id);
        return response()->json(["Usuário deletado."]);
    }
    /*
        Relacionar república com usuário (caso a relação 'usuário mora em república' seja implementada)
    */
    public function addRepublic($id,$republic_id){
        $user = User::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $user->$republic_id = $republic_id;
        $user->save();
        return response()->json($user);
    }

    /*
        Remover relação de república com usuário (caso a relação 'usuário mora em república' seja implementada)
    */

    public function removeRepublic($id,$republic_id){
        $user = User::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $user->republic_id = NULL;
        $user->save();
        return response()->json($user);
    }
}
