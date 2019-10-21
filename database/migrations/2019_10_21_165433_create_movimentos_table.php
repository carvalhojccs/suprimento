<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materiais');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('locais');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('tipo_movimento');
            $table->string('numero_documento')->nullable();
            $table->date('data_documento')->nullable();
            $table->integer('estoque_anterior')->nullable();
            $table->integer('entrada')->nullable();
            $table->integer('saida')->nullable();
            $table->integer('estoque_atual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentos');
    }
}
