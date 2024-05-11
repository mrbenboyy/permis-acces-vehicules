<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liste_permis', function (Blueprint $table) {
            $table->bigIncrements('id')->startFrom(70000);
            $table->string('immatriculation')->unique();
            $table->enum('type_permis', ['captif', 'non_captif']);
            $table->string('proprietaire_chauffeur');
            $table->string('type_vehicule');
            $table->enum('zone_acces', ['acces_1', 'acces_2', 'acces_3']);
            $table->dateTime('date_expiration');
            $table->string('raison_acces');
            $table->integer('annee_courante');
            $table->integer('numero')->unique();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liste_permis');
    }
};
