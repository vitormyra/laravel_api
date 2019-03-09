<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bancos', function (Blueprint $table) {
            $table->increments('id_user_banco');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_banco')->unsigned();
            $table->unique(array('id_user', 'id_banco'));
            $table->boolean('ativo')->default(true);
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
        Schema::dropIfExists('user_bancos');
    }
}
