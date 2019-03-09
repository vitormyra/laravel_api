<?php

namespace App\Models\Servicos;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServicosModel extends Model
{
    /* Serviços Início */
    public function selecionar()
    {
        $servicos = DB::table('servicos')
            ->get();
        return $servicos;
    }
    
    public function inserir($parametros)
    {
        try
        {
            DB::table('servicos')
                ->insert(
                    [   
                        'nome_servico'      =>      $parametros[0],
                        'imagem'            =>      $parametros[1]
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
            DB::table('servicos')
                ->where('id_servico', $parametros[0])
                ->update(['ativo' => $parametros[1]]);
        }
        catch(Exception $ex)
        {

        }
    }
    /* Serviços Fim */
}
