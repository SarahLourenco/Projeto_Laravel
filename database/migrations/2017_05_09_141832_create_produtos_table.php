<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome',150);
            $table->text('descricao')->nullable();
            $table->decimal('custo', 5, 2);
            $table->integer('qtd');   
            $table->decimal('valor', 5, 2);
            // campo que verifica se tem no estoque// fazer no codigo metodo
            // para imagem $table->string('image',200) curso aula 12
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
