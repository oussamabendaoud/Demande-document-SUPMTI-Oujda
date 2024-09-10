<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemandeDocumentController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Students\StudentsRegistrationController;



Route::get('/a', [DemandeDocumentController::class, 'create'])->name('demande.create');
Route::post('/demande-document', [DemandeDocumentController::class, 'store'])->name('demande.store');
Route::post('/archiver-demandes-envoyees', [DemandeDocumentController::class, 'archiverDemandesEnvoyees'])->name('archiver_demandes_envoyees');
Route::get('/documents-envoyes-archives', [ArchiveController::class, 'documentsEnvoyesArchives'])->name('documents.envoyes_archives');
Route::get('/demandes-envoyes-archives', [ArchiveController::class, 'demandesEnvoyesArchives'])->name('demandes.envoyes_archives');
  
Route::get('/students/registration', [StudentsRegistrationController::class, 'showRegistrationForm'])->name('students.registration');
Route::post('/students/registration', [StudentsRegistrationController::class, 'store'])->name('students.store');
Route::get('/students/list', [StudentsRegistrationController::class, 'showList'])->name('students.list');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route pour traiter la soumission du formulairex
    Route::post('/demande-document', [DemandeDocumentController::class, 'store'])->name('demande.store');
    Route::get('/service-communication', [DemandeDocumentController::class, 'index'])->name('service.communication');
    Route::post('/demande/{id}/envoyer', [DemandeDocumentController::class, 'envoyer'])->name('demande.envoyer');
    Route::get('/service-scolarite', [DemandeDocumentController::class, 'scolarite'])->name('service.scolarite');
    Route::post('/envoyer-document/{id}', [DemandeDocumentController::class, 'envoyerDocument'])->name('demande.envoyer_document');

});