<?php

namespace App\Models\Token;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Auth;
use DB;

class TokenModel extends Model
{
    /* Serviços Início */
    public function selecionar($parametros)
    {
        if(Auth::attempt(['email' => $parametros[0], 'password' => $parametros[1]])){ 
            $token = Str::random(60);
            Auth::user()->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();

            $retorno = Auth::user();
            $retorno->api_token = $token;
            return $retorno;
        } 
        else{ 
            return "Usuário ou senha inválidos";
        } 
    }

    /* Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function registrar($parametros)
    {
        try
        {
            $token = Str::random(60);

            $teste = DB::table('users')
                ->insert(
                    [   
                        'name'      => $parametros[0],
                        'email'     => $parametros[1],
                        'password'  => bcrypt($parametros[2]),
                        'api_token' => hash('sha256', $token),
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]
                );
            return $token; 
        }
        catch(Exception $ex)
        {
            
        }
    }    
}
