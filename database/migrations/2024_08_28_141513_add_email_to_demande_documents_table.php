<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToDemandeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demande_documents', function (Blueprint $table) {
            $table->string('email')->after('prenom'); // Ajoute la colonne email après la colonne prenom
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demande_documents', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}