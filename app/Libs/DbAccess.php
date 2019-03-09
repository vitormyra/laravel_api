<?php

namespace App\Libs;
use Auth;
use Response;
 
class DbAccess 
{
    public static function query($metodo, $instancia, $retorno = false, $parametros = null, $nivel_acesso = null)
    {
        try {
            if(isset($nivel_acesso))
            {
                if(!Auth::check())
                {
                    return Response::json([
                            'mensagem' => "Não Autenticado"
                        ], 401);
                }
                else if(auth()->user()->access_level < $nivel_acesso)
                {
                    return Response::json([
                        'mensagem' => "Acesso Negado"
                    ], 403);
                }
            }
            if($retorno == true)
            {
                if(!empty($parametros)){
                    $return = $instancia->$metodo($parametros);  
                }
                else{
                    $return = $instancia->$metodo();
                }
                return Response::json([
                    'retorno' => $return
                ], 200);  
            }
            else{
                if(isset($parametros)){
                    $instancia->$metodo($parametros);
                }
                else{
                    $instancia->$metodo();
                }
                return Response::json([
                    'retorno' => 'Feito'
                ], 200);  
            }
        } catch (\Throwable $th) {
            return Response::json([
                // 'mensagem' => "Erro Genérico"
                'mensagem' => $th
            ], 500);
        }
    }
 
}