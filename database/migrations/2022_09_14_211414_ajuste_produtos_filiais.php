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
        // criando tabela filiais
        Schema::create('filiais',function (Blueprint $table){
           $table->id();
           $table->string('filial',30);
           $table->timestamps();
        });

        //criando tabela produto_filiais
        Schema::create('protudo_filiais',function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //foreign key
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produtos
        Schema::table('produtos',function (Blueprint $table){
//            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
            $table->dropColumn('preco_venda');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionando colunas da tabela produtos
        Schema::table('produtos',function (Blueprint $table){
            $table->decimal('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        //removendo relacionamento com a tabela produto_detalhes
        Schema::table('protudo_filiais', function (Blueprint $table){
            //remove a foreign key
            $table->dropForeign('protudo_filiais_filial_id_foreign'); //{tabela}_{coluna}_foreign
            $table->dropForeign('protudo_filiais_produto_id_foreign'); //{tabela}_{coluna}_foreign
            //remover a coluna filial_id
            $table->dropColumn('filial_id');
            $table->dropColumn('produto_id');
        });

        Schema::dropIfExists('protudo_filiais');
        Schema::dropIfExists('filiais');
    }
};
