<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\DemandeArchive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    // Afficher les documents envoyés archivés
    public function documentsEnvoyesArchives()
    {
        $documentsEnvoyesArchives = Archive::all(); // Remplacez DemandeArchive par le modèle approprié pour les documents envoyés

        return view('documents_envoyes_archives', compact('documentsEnvoyesArchives'));
    }

    // Afficher les demandes envoyées archivées
    public function demandesEnvoyesArchives()
    {
        $demandesEnvoyesArchives = DemandeArchive::all();

        return view('demandes_envoyes_archives', compact('demandesEnvoyesArchives'));
    }
}