<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeArchive extends Model
{
    use HasFactory;

    protected $table = 'demande_archive';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'date_naissance',
        'cin',
        'filere',
        'niveau',
        'attestations',
    ];
}