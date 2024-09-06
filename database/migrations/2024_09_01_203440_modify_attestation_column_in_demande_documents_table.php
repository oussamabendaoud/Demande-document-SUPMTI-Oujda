<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAttestationColumnInDemandeDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('demande_documents', function (Blueprint $table) {
            $table->text('attestation')->change(); // Modify the column to TEXT
        });
    }

    public function down()
    {
        Schema::table('demande_documents', function (Blueprint $table) {
            $table->enum('attestation', [
                'attestation_inscription',
                'attestation_scolarite',
                'attestation_reussite',
                'releve_notes',
                'convention_stage',
                'diplome'
            ])->change(); // Revert back to ENUM if needed
        });
    }
}