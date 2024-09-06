<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */


public function up()
{
    Schema::create('demande_documents', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('prenom');
        $table->date('date_naissance');
        $table->string('cin')->nullable(); // Numero de passport pour les étudiants étrangers
        $table->string('filere'); // Filére
        $table->enum('niveau', ['1ere', '2eme', '3eme', '4eme', '5eme']); // Niveau
        $table->enum('attestation', [
            'attestation_inscription',
            'attestation_scolarite',
            'attestation_reussite',
            'releve_notes',
            'convention_stage',
            'diplome'
        ]); // Attestation
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_documents');
    }
};