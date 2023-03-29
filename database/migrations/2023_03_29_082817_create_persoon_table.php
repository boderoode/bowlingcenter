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
        Schema::create('persoon', function (Blueprint $table) {
            // Id
            $table->id();

            // Type persoon id
            $table->foreignId('type_persoon_id')->constrained('type_persoon');

            // Voornaam
            $table->string('voornaam', 50);

            // Tussenvoegsel
            $table->string('tussenvoegsel', 50)->nullable();

            // Achternaam
            $table->string('achternaam', 50);

            // Roepnaam
            $table->string('roepnaam', 50);

            // IsVolwassen
            $table->boolean('is_volwassen');

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
        Schema::dropIfExists('persoon');
    }
};
