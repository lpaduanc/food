<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalhesPlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes_planos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plano_id');
            $table->string('nome');
            $table->timestamps();

            $table
                ->foreign('plano_id')
                ->references('id')
                ->on('planos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhes_planos');
    }
}
