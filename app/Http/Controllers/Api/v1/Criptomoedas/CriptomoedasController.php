<?php

namespace App\Http\Controllers\Api\v1\Criptomoedas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\DbAccess;
use App\Models\Criptomoedas\CriptomoedasModel;
use Response;

class CriptomoedasController extends Controller
{
    public function __construct()
    {
        $this->instancia = new CriptomoedasModel();
    }
    public function buscar()
    {       
        $retorno = DbAccess::query("selecionar", $this->instancia, true);
        return $retorno;
    }

    public function inserir(Request $request)
    {
        $parametros[0] = $request->parametro1;
        $parametros[1] = $request->parametro2;
        
        $retorno = DbAccess::query("inserir", $this->instancia, false, $parametros, 1);
        return $retorno;
    }

    public function gerenciarAtivacao(Request $request)
    {
        $parametros[0] = $request->id;
        $parametros[1] = $request->ativacao;           
        
        $retorno = DbAccess::query("atualizarAtivacao", $this->instancia, false, $parametros, 1);
        return $retorno;
    }
}
