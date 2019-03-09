<?php

namespace App\Http\Controllers\Api\v1\Token;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Libs\DbAccess;
use App\Models\Token\TokenModel;
use Illuminate\Support\Facades\Validator;

class TokenController extends Controller
{
    public function __construct()
    {
        $this->instancia = new TokenModel();
    }
    public function getToken(Request $request)
    {       
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $parametros[0] = $request->email;
        $parametros[1] = $request->password;
        
        $retorno = DbAccess::query("selecionar", $this->instancia, true, $parametros);
        return $retorno;       
    }

    public function registrar(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $parametros[0] = $request->name;
        $parametros[1] = $request->email;
        $parametros[2] = $request->password;

        $retorno = DbAccess::query("registrar", $this->instancia, true, $parametros);
        return $retorno;
    }
}
