<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCriptomoedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_criptomoedas', function (Blueprint $table) {
            $table->increments('id_user_criptomoeda');
            $table->boolean('ativo')->default(true);
            $table->boolean('negociacao_interna')->default(false);
            $table->foreign('id_criptomoeda')->references('id_criptomoeda')->on('criptomoedas')->onDelete('cascade');
            $table->integer('id_criptomoeda')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->unique(array('id_user', 'id_criptomoeda'));
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
        Schema::dropIfExists('user_criptomoedas');
    }
}
