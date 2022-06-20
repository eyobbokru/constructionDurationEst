<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('param_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dataType');
            $table->string('value')->nullable();
            $table->string('unit')->nullable();

            $table->foreignId('sub_categories_id');
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
        Schema::dropIfExists('param_fields');
    }
}
