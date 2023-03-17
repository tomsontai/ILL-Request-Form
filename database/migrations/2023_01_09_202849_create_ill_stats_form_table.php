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
        Schema::create('ill_stats_form', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('dateName')->nullable();
            $table->string('resourceTypeName')->nullable();
            $table->string('actionType')->nullable();
            $table->string('fillTypeName')->nullable();
            $table->string('unfilledTypeName')->nullable();
            $table->string('libraryName')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ill_stats_form');
    }
};
