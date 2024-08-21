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

        Schema::create('tappe', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('viaggio_id')->unsigned()->index();
            $table->foreign('viaggio_id')->references('id')->on('viaggi');
            $table->string('immagine')->nullable();
            $table->date('data');
            $table->string('titolo');
            $table->text('descrizione')->nullable();
            $table->decimal('longitudine');
            $table->decimal('latitudine');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tappe');
    }
};
