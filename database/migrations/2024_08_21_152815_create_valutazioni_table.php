<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('valutazioni', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tappa_id')->unsigned()->index();
            $table->foreign('tappa_id')->references('id')->on('tappe');
            $table->tinyInteger('voto');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valutazioni');
    }
};
