<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            Schema::create('tokens', function (Blueprint $table) {
                $table->id();
                $table->string('token')->nullable();
                $table->string('lang')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('users')->onDelete('cascade');
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
