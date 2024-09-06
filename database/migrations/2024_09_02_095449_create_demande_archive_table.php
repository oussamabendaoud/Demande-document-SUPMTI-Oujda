<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_archive', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->date('date_naissance');
            $table->string('cin')->nullable(); // CIN or passport number for foreign students
            $table->string('filere'); // Field of study
            $table->string('niveau'); // Level (e.g., 1ere, 2eme, 3eme, etc.)
            $table->text('attestations')->nullable(); // Attestations can be multiple, so using text to store them
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_archive');
    }
};