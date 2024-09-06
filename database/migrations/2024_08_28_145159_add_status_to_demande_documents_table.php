<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToDemandeDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('demande_documents', function (Blueprint $table) {
            $table->string('status')->default('nouvelle')->after('attestation');
        });
    }

    public function down()
    {
        Schema::table('demande_documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}