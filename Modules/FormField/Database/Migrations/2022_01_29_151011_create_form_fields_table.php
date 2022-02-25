<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();

            $table->foreignId('form_id')
            ->constrained('forms')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('field_id')
            ->constrained('fields')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_fields');
    }
}
