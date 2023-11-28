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
        Schema::create('detail_receps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recep_id');
            $table->unsignedBigInteger('user_id');
            $table->string('bahan', 255);
            $table->string('langkah', 255);
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('recep_id')->references('id')->on('receps');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_receps');
    }
};
