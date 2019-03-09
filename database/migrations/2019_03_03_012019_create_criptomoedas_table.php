<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriptomoedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criptomoedas', function (Blueprint $table) {
            $table->increments('id_criptomoeda');
            $table->string('nome_criptomoeda')->unique();
            $table->string('imagem');
            $table->boolean('ativo')->default(true);
            $table->boolean('negociacao_interna')->default(false);
            $table->timestamp('criado')->default(DB::raw('CURRENT_TIMESTAMP'));  
            $table->timestamp('atualizado')->default(DB::raw('CURRENT_TIMESTAMP'));       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criptomoedas');
    }
}
