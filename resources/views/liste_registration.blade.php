<!-- resources/views/list_registration.blade.php -->
@extends('layouts.style')

@section('title', 'Liste des Inscriptions')

@section('content')

<!-- Main Content -->

<!-- DataTable Code starts -->
<div class="jumbotron">
    <h2 class="mb-4">Liste des Inscriptions des Étudiants</h2>
    <hr class="my-4">

    <!-- Vérifier s'il y a des inscriptions -->
    @if($students->isEmpty())
    <p>Aucune inscription trouvée.</p>
    @else
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Massar CNE</th>
                <th>CNIE</th>
                <th>Passeport</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Date de naissance</th>
                <th>Ville</th>
                <th>Nationalité</th>
                <th>Code de filière</th>
                <th>Type de filière</th>
                <th>Niveau d'étude</th>
                <th>Statut étudiant</th>
                <th>Diplôme d'accès</th>
                <th>Série du baccalauréat</th>
                <th>Année du baccalauréat</th>
                <th>Spécialité du diplôme</th>
                <th>Mention du diplôme</th>
                <th>Lieu du diplôme</th>
                <th>Première inscription</th>
                <th>Handicap</th>
                <th>Résident</th>
                <th>Fonctionnaire</th>
                <th>Pourcentage bourse</th>
                <th>Étudiant en mobilité</th>
                <th>Documents soumis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->massar_cne }}</td>
                <td>{{ $student->cnie }}</td>
                <td>{{ $student->passport }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->gender == 'M' ? 'Masculin' : 'Féminin' }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->city }}</td>
                <td>{{ $student->nationality }}</td>
                <td>{{ $student->field_code }}</td>
                <td>{{ $student->type_filier }}</td>
                <td>{{ $student->level_of_study }}</td>
                <td>{{ $student->student_status }}</td>
                <td>{{ $student->diploma_access }}</td>
                <td>{{ $student->baccalaureate_series }}</td>
                <td>{{ $student->baccalaureate_year }}</td>
                <td>{{ $student->diploma_speciality }}</td>
                <td>{{ $student->diploma_mention }}</td>
                <td>{{ $student->diploma_location }}</td>
                <td>{{ $student->first_registration_year }}</td>
                <td>{{ $student->handicap }}</td>
                <td>{{ $student->resident ? 'Oui' : 'Non' }}</td>
                <td>{{ $student->civil_servant ? 'Oui' : 'Non' }}</td>
                <td>{{ $student->scholarship_percentage }}%</td>
                <td>{{ $student->mobility_student ? 'Oui' : 'Non' }}</td>
                <td>{{ $student->documents_submitted }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection