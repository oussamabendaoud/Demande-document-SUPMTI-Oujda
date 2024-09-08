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
        'first_registration_year' => 'nullable|integer|min:1900|max:' . date('Y'),
        'handicap' => 'nullable|string|max:255',
        'resident' => 'boolean',
        'civil_servant' => 'boolean',
        'scholarship_percentage' => 'nullable|integer|min:0|max:100',
        'mobility_student' => 'boolean',
        'documents_submitted' => 'nullable|string|max:255',
    ]);

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