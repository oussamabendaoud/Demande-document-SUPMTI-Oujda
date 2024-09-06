<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDocument extends Model
{
    use HasFactory;

    // Nom de la table dans la base de données
    protected $table = 'demande_documents';

    // Les champs qui peuvent être assignés en masse
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'date_naissance',
        'cin',
        'filere',
        'niveau',
        'attestation',
        'status',
    ];
}