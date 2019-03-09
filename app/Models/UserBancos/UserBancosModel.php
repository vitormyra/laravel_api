<?php

namespace App\Models\UserBancos;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserBancosModel extends Model
{
    /* Bancos Início */
    public function selecionar()
    {
        $bancos = DB::table('user_bancos')
            ->get();
        return $bancos;
    }
    
    public function inserir($parametros)
    {
        try
        {
            DB::table('user_bancos')
                ->insert(
                    [   
                        'nome_banco'   =>      $parametros[0],
                        'imagem'       =>      $parametros[1]
                    ]
                );
        }
        catch(Exception $ex)
        {

        }
    }

    public function atualizarAtivacao($parametros)
    {
        try
        {
            DB::table('user_bancos')
                    ->where('id_banco', $parametros[0])
                    ->update(['ativo' => $parametros[1]]);
        }
        catch(Exception $ex)
        {

        }
    }
    /* Bancos Fim */
}
