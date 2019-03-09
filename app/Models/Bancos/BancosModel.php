<?php

namespace App\Models\Bancos;

use Illuminate\Database\Eloquent\Model;
use DB;

class BancosModel extends Model
{
    /* Bancos Início */
    public function selecionar()
    {
        $bancos = DB::table('bancos')
            ->get();
        return $bancos;
    }
    
    public function inserir($parametros)
    {
        try
        {
            DB::table('bancos')
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
            DB::table('bancos')
                    ->where('id_banco', $parametros[0])
                    ->update(['ativo' => $parametros[1]]);
        }
        catch(Exception $ex)
        {

        }
    }
    /* Bancos Fim */
}
