<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); // kg, cm , mm
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // add relacionamento com tabela produto
        Schema::table('produtos', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //add relacionamento com a tabela produto_detalhes

        Schema::table('produto_detalhes', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //removendo relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table){
            //remove a foreign key
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //{tabela}_{coluna}_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        // removendo relacionamento com tabela produto
        Schema::table('produtos', function (Blueprint $table){
            //remove a foreign key
            $table->dropForeign('produtos_unidade_id_foreign'); //{tabela}_{coluna}_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });
        Schema::dropIfExists('unidades');
    }
};
