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
        Schema::create('reserverings', function (Blueprint $table) {
            // Id
            $table->id();

            // name
            $table->string('naam', 50);

            // Persoon id
            $table->foreignId('persoon_id')->constrained('persoon');

            // Reserverings nummer
            $table->string('reserverings_nummer', 10);

            // Datum
            $table->date('datum');

            // AantalUren
            $table->integer('aantal_uren');

            // BeginTijd
            $table->time('begin_tijd');

            // EindTijd
            $table->time('eind_tijd');

            // AantalVolwassenen
            $table->integer('aantal_volwassenen');

            // AantalKinderen nullable
            $table->integer('aantal_kinderen')->nullable();

            // baan nummer
            $table->integer('baan_nummer');

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
        Schema::dropIfExists('reserverings');
    }
};
