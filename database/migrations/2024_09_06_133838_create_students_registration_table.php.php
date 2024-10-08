<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsRegistrationTable extends Migration
{
    /**
     * Exécute les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_registration', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté
            $table->string('massar_cne'); // Massar/CNE (Identifiant étudiant marocain)
            $table->string('cnie')->nullable(); // CNIE (Carte nationale d'identité pour les marocains)
            $table->string('passport')->nullable(); // Passeport (pour les étudiants étrangers)
            $table->string('first_name'); // Prénom
            $table->string('last_name'); // Nom
            $table->enum('gender', ['M', 'F']); // Sexe (M ou F)
            $table->date('date_of_birth'); // Date de naissance (JJ/MM/AAAA)
            $table->string('city'); // Nationalité
            $table->string('nationality'); // Nationalité
            $table->string('field_code'); // Code du domaine d'études
            $table->string('type_filier');
            $table->integer('level_of_study'); // Niveau d'études (1, 2, 3, etc.)
            $table->string('student_status')->nullable(); // Situation de l'étudiant (N, R, P)
            $table->string('diploma_access')->nullable(); // Diplôme d'accès
            $table->string('baccalaureate_series')->nullable(); // Série du baccalauréat
            $table->year('baccalaureate_year'); // Année d'obtention du baccalauréat
            $table->string('diploma_speciality')->nullable(); // Spécialité du diplôme
            $table->string('diploma_mention')->nullable(); // Mention du diplôme
            $table->string('diploma_location')->nullable(); // Lieu d'obtention du diplôme
            $table->string('first_registration_year'); // Première année d'inscription à l'établissement
            $table->string('handicap')->nullable(); // Situation de handicap
            $table->boolean('resident')->default(false); // Statut de résident (Oui ou Non)
            $table->boolean('civil_servant')->default(false); // Statut de fonctionnaire (Oui ou Non)
            $table->integer('scholarship_percentage')->nullable(); // Pourcentage de la bourse
            $table->boolean('mobility_student')->default(false); // Statut d'étudiant en mobilité (Oui ou Non)
            $table->string('niveaux')->nullable(); // Documents fournis
           // Fichiers pour Bac
        $table->string('cin_bac')->nullable(); // Chemin du fichier CIN pour Bac
        $table->string('diplome_bac')->nullable(); // Chemin du Diplôme baccalauréat pour Bac
        $table->string('relv_note_bac')->nullable(); // Chemin du Relevé de notes pour Bac

        // Fichiers pour Bac +2
        $table->string('cin_bac2')->nullable(); // Chemin du fichier CIN pour Bac +2
        $table->string('diplome_bac2')->nullable(); // Chemin du Diplôme baccalauréat pour Bac +2
        $table->string('att_rs_bac2')->nullable(); // Chemin de l'attestation de réussite pour Bac +2
        $table->string('relv_note_bac2')->nullable(); // Chemin du Relevé de notes pour Bac +2

        // Fichiers pour Bac +3
        $table->string('cin_bac3')->nullable(); // Chemin du fichier CIN pour Bac +3
        $table->string('diplome_bac3')->nullable(); // Chemin du Diplôme baccalauréat pour Bac +3
        $table->string('att_rs_bac3')->nullable(); // Chemin du Diplôme de licence pour Bac +3
        $table->string('relv_note_bac3')->nullable(); // Chemin du Relevé de notes pour Bac +3

            $table->timestamps(); // Horodatages created_at et updated_at
        });
    }

    /**
     * Annule les migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_registration');
    }
}