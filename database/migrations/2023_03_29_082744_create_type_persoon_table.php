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
        Schema::create('type_persoon', function (Blueprint $table) {
            // Id
            $table->id();

            //enum voor gast, werknemer, klant
            $table->enum('naam', ['gast', 'werknemer', 'klant']);

            // Timestamp
            $table->timestamps();

            //Is_actief (default true)
            $table->boolean('is_actief')->default(true);

            //opmerking
            $table->string('opmerking', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_persoon');
    }
};
