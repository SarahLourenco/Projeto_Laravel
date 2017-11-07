<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hist_vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('qtd_vendido');
            $table->integer('produto_id')->unsigned();
            $table->date('data_venda');
            
            $table->foreign('produto_id')
                    ->references('id')
                    ->on('produtos');         
        });            
                
    }

    public function down()
    {
        Schema::dropIfExists('hist_vendas');
    }
}
