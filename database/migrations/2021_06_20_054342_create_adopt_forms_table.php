<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopt_forms', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap');
            $table->string('usia');
            $table->longText('alamat');
            $table->string('email');
            $table->longText('alasan');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->BigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('adopt_forms');
    }
}
