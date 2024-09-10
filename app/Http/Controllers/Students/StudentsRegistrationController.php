<?php

namespace App\Http\Controllers\Students;
use App\Models\Students\StudentsRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StudentsRegistrationController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('students_registration');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    //dd($request->all());    
    // Valider les données de la requête entrante
    $validated = $request->validate([
        'massar_cne' => 'required|string|max:255',
        'cnie' => 'nullable|string|max:255',
        'passport' => 'nullable|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'required|in:M,F',
        'date_of_birth' => 'required|date',
        'city' => 'required|string|max:255',
        'nationality' => 'required|string|max:255',
        'field_code' => 'required|string|max:255',
        'type_filier' => 'required', 
        'level_of_study' => 'required|integer|min:1|max:7',
        'student_status' => 'nullable|string|max:255',
        'diploma_access' => 'nullable|string|max:255',
        'baccalaureate_series' => 'nullable|string|max:255',
        'baccalaureate_year' => 'nullable|integer|min:1900|max:' . date('Y'),
        'diploma_speciality' => 'nullable|string|max:255',
        'diploma_mention' => 'nullable|string|max:255',
        'diploma_location' => 'nullable|string|max:255',
        'first_registration_year' => 'required|string|max:255' ,
        'handicap' => 'nullable|string|max:255',
        'resident' => 'boolean',
        'civil_servant' => 'boolean',
        'scholarship_percentage' => 'nullable|integer|min:0|max:100',
        'mobility_student' => 'boolean',
        'niveaux' => 'nullable|string|max:255',
       
                // Validation pour les fichiers Bac
                'cin_bac' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'diplome_bac' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'relv_note_bac' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        
                // Validation pour les fichiers Bac +2
                'cin_bac2' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'diplome_bac2' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'att_rs_bac2' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'relv_note_bac2' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        
                // Validation pour les fichiers Bac +3
                'cin_bac3' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'diplome_bac3' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'att_rs_bac3' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                'relv_note_bac3' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
            ]);

            if ($request->hasFile('cin_bac')) {
                $validated['cin_bac'] = $request->file('cin_bac')->store('documents/bac');
            }
            if ($request->hasFile('diplome_bac')) {
                $validated['diplome_bac'] = $request->file('diplome_bac')->store('documents/bac');
            }
            if ($request->hasFile('relv_note_bac')) {
                $validated['relv_note_bac'] = $request->file('relv_note_bac')->store('documents/bac');
            }
        
            // Gérer les fichiers pour Bac +2
            if ($request->hasFile('cin_bac2')) {
                $validated['cin_bac2'] = $request->file('cin_bac2')->store('documents/bac2');
            }
            if ($request->hasFile('diplome_bac2')) {
                $validated['diplome_bac2'] = $request->file('diplome_bac2')->store('documents/bac2');
            }
            if ($request->hasFile('relv_note_bac2')) {
                $validated['relv_note_bac2'] = $request->file('relv_note_bac2')->store('documents/bac2');
            }
        
            // Gérer les fichiers pour Bac +3
            if ($request->hasFile('cin_bac3')) {
                $validated['cin_bac3'] = $request->file('cin_bac3')->store('documents/bac3');
            }
            if ($request->hasFile('diplome_bac3')) {
                $validated['diplome_bac3'] = $request->file('diplome_bac3')->store('documents/bac3');
            }
            if ($request->hasFile('relv_note_bac3')) {
                $validated['relv_note_bac3'] = $request->file('relv_note_bac3')->store('documents/bac3');
            }
   




    if (is_array($request->input('type_filier'))) {
        // Si c'est un tableau, utiliser implode pour convertir en chaîne
        $validated['type_filier'] = implode(',', $request->input('type_filier'));
    } else {
        // Si ce n'est pas un tableau, utiliser la valeur telle qu'elle est (probablement une chaîne)
        $validated['type_filier'] = $request->input('type_filier');
    }
    

    // Créer une nouvelle entrée dans la base de données avec les données validées
    StudentsRegistration::create($validated);

    // Rediriger avec un message de succès
    return redirect()->route('students.store')->with('success', 'Étudiant inscrit avec succès !');
}


    /**
     * Display the specified resource.
     */
    public function showRegistrationForm()
    {
        return view('students_registration');
    }

    public function showList()
    {
        // Récupérer toutes les inscriptions
        $students = StudentsRegistration::all(); // Cela récupère toutes les données de la table
        
        // Passer les données à la vue
        return view('liste_registration', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}