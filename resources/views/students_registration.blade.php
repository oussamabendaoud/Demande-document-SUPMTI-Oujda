<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Inscription des Étudiants</title>
</head>

<body>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="{{ asset('img/Logo-SupMTI-s-2024.png') }}" height="60" alt="Logo" loading="lazy">
                <span class="fs-4" style="margin-left: 20px;">Inscription des Étudiants</span>
            </a>
        </header>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h2 class="display-5 fw-bold">Formulaire d'Inscription</h2>
                <p>Veuillez remplir le formulaire ci-dessous pour vous inscrire en tant qu'étudiant.</p>

                <!-- Affichage du message de succès -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Affichage des erreurs de validation -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Formulaire pour l'inscription des étudiants -->
                <form class="row g-3" action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <!-- Champ pour le Massar CNE -->
                    <div class="col-md-4">
                        <label for="massar_cne" class="form-label">Massar CNE</label>
                        <input type="text" class="form-control" id="massar_cne" name="massar_cne"
                            value="{{ old('massar_cne') }}" required>
                    </div>

                    <!-- Champ pour le CNIE -->
                    <div class="col-md-4">
                        <label for="cnie" class="form-label">CNIE (facultatif)</label>
                        <input type="text" class="form-control" id="cnie" name="cnie" value="{{ old('cnie') }}">
                    </div>

                    <!-- Champ pour le passeport -->
                    <div class="col-md-4">
                        <label for="passport" class="form-label">Passeport (facultatif)</label>
                        <input type="text" class="form-control" id="passport" name="passport"
                            value="{{ old('passport') }}">
                    </div>

                    <!-- Champ pour le prénom -->
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" required>
                    </div>

                    <!-- Champ pour le nom -->
                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ old('last_name') }}" required>
                    </div>

                    <!-- Champ pour le sexe -->
                    <div class="col-md-4">
                        <label for="gender" class="form-label">Sexe</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option selected disabled value="">Choisissez...</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculin</option>
                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Féminin</option>
                        </select>
                    </div>

                    <!-- Champ pour la date de naissance -->
                    <div class="col-md-4">
                        <label for="date_of_birth" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                            value="{{ old('date_of_birth') }}" required>
                    </div>

                    <!-- Champ pour la nationalité -->
                    <div class="col-md-4">
                        <label for="nationality" class="form-label">Nationalité</label>
                        <input type="text" class="form-control" id="nationality" name="nationality"
                            value="{{ old('nationality') }}" required>
                    </div>

                    <!-- Champ pour la province (liste des villes) -->
                    <div class="col-md-4">
                        <label for="province" class="form-label">Ville/Province</label>
                        <select class="form-select" id="province" name="city" required>
                            <option selected disabled value="">Sélectionnez une ville</option>
                            <option value="Agadir" {{ old('province') == 'Agadir' ? 'selected' : '' }}>Agadir</option>
                            <!-- (Autres villes conservées) -->
                            <option value="Zagora" {{ old('province') == 'Zagora' ? 'selected' : '' }}>Zagora</option>
                        </select>
                    </div>

                    <!-- Champ pour le code filière -->
                    <div class="col-md-4">
                        <label for="field_code" class="form-label">Code de la filière</label>
                        <input type="text" class="form-control" id="field_code" name="field_code"
                            value="{{ old('field_code') }}" required>
                    </div>

                    <!-- Champ pour le type de filière -->
                    <div class="col-md-4">
                        <label for="type_filier" class="form-label">Type de filière</label>
                        <select class="form-select" id="type_filier" name="type_filier[]" multiple required>
                            <option value="Sciences"
                                {{ in_array('Sciences', old('type_filier', [])) ? 'selected' : '' }}>Sciences</option>
                            <option value="Lettres" {{ in_array('Lettres', old('type_filier', [])) ? 'selected' : '' }}>
                                Lettres</option>
                            <option value="Économie"
                                {{ in_array('Économie', old('type_filier', [])) ? 'selected' : '' }}>Économie</option>
                            <option value="Informatique"
                                {{ in_array('Informatique', old('type_filier', [])) ? 'selected' : '' }}>Informatique
                            </option>
                            <option value="Médecine"
                                {{ in_array('Médecine', old('type_filier', [])) ? 'selected' : '' }}>Médecine</option>
                        </select>
                    </div>

                    <!-- Champ pour le niveau d'étude -->
                    <div class="col-md-4">
                        <label for="level_of_study" class="form-label">Niveau d'étude</label>
                        <input type="number" class="form-control" id="level_of_study" name="level_of_study"
                            value="{{ old('level_of_study') }}" min="1" max="7" required>
                    </div>

                    <!-- Champ pour le statut étudiant -->
                    <div class="col-md-4">
                        <label for="student_status" class="form-label">Statut de l'étudiant (facultatif)</label>
                        <input type="text" class="form-control" id="student_status" name="student_status"
                            value="{{ old('student_status') }}">
                    </div>

                    <!-- Champ pour le diplôme d'accès -->
                    <div class="col-md-4">
                        <label for="diploma_access" class="form-label">Diplôme d'accès (facultatif)</label>
                        <input type="text" class="form-control" id="diploma_access" name="diploma_access"
                            value="{{ old('diploma_access') }}">
                    </div>

                    <!-- Champ pour la série du baccalauréat -->
                    <div class="col-md-4">
                        <label for="baccalaureate_series" class="form-label">Série du baccalauréat (facultatif)</label>
                        <input type="text" class="form-control" id="baccalaureate_series" name="baccalaureate_series"
                            value="{{ old('baccalaureate_series') }}">
                    </div>

                    <!-- Champ pour l'année du baccalauréat -->
                    <div class="col-md-4">
                        <label for="baccalaureate_year" class="form-label">Année du baccalauréat</label>
                        <input type="number" class="form-control" id="baccalaureate_year" name="baccalaureate_year"
                            value="{{ old('baccalaureate_year') }}" min="1900" max="{{ date('Y') }}" required>
                    </div>

                    <!-- Champ pour la spécialité du diplôme -->
                    <div class="col-md-4">
                        <label for="diploma_speciality" class="form-label">Spécialité du diplôme (facultatif)</label>
                        <input type="text" class="form-control" id="diploma_speciality" name="diploma_speciality"
                            value="{{ old('diploma_speciality') }}">
                    </div>

                    <!-- Champ pour la mention du diplôme -->
                    <div class="col-md-4">
                        <label for="diploma_mention" class="form-label">Mention du diplôme (facultatif)</label>
                        <input type="text" class="form-control" id="diploma_mention" name="diploma_mention"
                            value="{{ old('diploma_mention') }}">
                    </div>

                    <!-- Champ pour le lieu d'obtention du diplôme -->
                    <div class="col-md-4">
                        <label for="diploma_location" class="form-label">Lieu d'obtention du diplôme
                            (facultatif)</label>
                        <input type="text" class="form-control" id="diploma_location" name="diploma_location"
                            value="{{ old('diploma_location') }}">
                    </div>

                    <!-- Champ pour la première année d'inscription -->
                    <div class="col-md-4">
                        <label for="first_registration_year" class="form-label">Première année d'inscription</label>
                        <input type="number" class="form-control" id="first_registration_year"
                            name="first_registration_year" value="{{ old('first_registration_year') }}" min="1900"
                            max="{{ date('Y') }}" required>
                    </div>

                    <!-- Champ pour le handicap -->
                    <div class="col-md-4">
                        <label for="handicap" class="form-label">Handicap (facultatif)</label>
                        <input type="text" class="form-control" id="handicap" name="handicap"
                            value="{{ old('handicap') }}">
                    </div>

                    <!-- Champ pour le statut résident -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="resident" name="resident" value="1"
                                {{ old('resident') ? 'checked' : '' }}>
                            <label class="form-check-label" for="resident">Statut résident</label>
                        </div>
                    </div>

                    <!-- Champ pour le statut fonctionnaire -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="civil_servant" name="civil_servant"
                                value="1" {{ old('civil_servant') ? 'checked' : '' }}>
                            <label class="form-check-label" for="civil_servant">Fonctionnaire</label>
                        </div>
                    </div>

                    <!-- Champ pour le pourcentage de bourse -->
                    <div class="col-md-4">
                        <label for="scholarship_percentage" class="form-label">Pourcentage de bourse
                            (facultatif)</label>
                        <input type="number" class="form-control" id="scholarship_percentage"
                            name="scholarship_percentage" value="{{ old('scholarship_percentage') }}" min="0" max="100">
                    </div>

                    <!-- Champ pour le statut étudiant en mobilité -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="mobility_student"
                                name="mobility_student" value="1" {{ old('mobility_student') ? 'checked' : '' }}>
                            <label class="form-check-label" for="mobility_student">Étudiant en mobilité</label>
                        </div>
                    </div>

                    <!-- Champ pour les documents soumis -->
                    <div class="col-md-4">
                        <label for="documents_submitted" class="form-label">Documents soumis (facultatif)</label>
                        <input type="text" class="form-control" id="documents_submitted" name="documents_submitted"
                            value="{{ old('documents_submitted') }}">
                    </div>

                    <!-- Soumettre le formulaire -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>