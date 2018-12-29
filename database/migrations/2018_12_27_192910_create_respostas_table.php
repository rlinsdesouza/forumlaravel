<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('resposta');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('postagem_id')->unsigned()->nullable();
            $table->foreign('postagem_id')->references('id')->on('postagems');
            $table->integer('resposta_mae_id')->unsigned()->nullable();
            $table->foreign('resposta_mae_id')->references('id')->on('respostas');
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
        Schema::dropIfExists('respostas');
    }
}
