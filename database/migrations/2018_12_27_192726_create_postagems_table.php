<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulopost');
            $table->text('descricaopost');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->integer('tema_id')->unsigned();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');                       
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
        Schema::dropIfExists('postagems');
    }
}
