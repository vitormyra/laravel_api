<?php

namespace App\Models\Criptomoedas;

use Illuminate\Database\Eloquent\Model;
use DB;

class CriptomoedasModel extends Model
{
    /* Criptomoedas Início*/
    public function selecionar()
    {
        $criptomoedas = DB::table('criptomoedas')
            ->get();
        return $criptomoedas;
    }
    
    public function inserir($parametros)
    {
        try
        {
            DB::table('criptomoedas')
                ->insert(
                    [   
                        'nome_criptomoeda'   =>      $parametros[0],
                        'imagem'             =>      $parametros[1]
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
            DB::table('criptomoedas')
                ->where('id_criptomoeda', $parametros[0])
                ->update(['ativo'   => $parametros[1]]);
        }
        catch(Exception $ex)
        {

        }
    }
    /* Criptomoedas Fim*/
}
