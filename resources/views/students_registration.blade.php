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
                        <label for="cnie" class="form-label">CIN</label>
                        <input type="text" class="form-control" id="cnie" name="cnie" value="{{ old('cnie') }}">
                    </div>

                    <!-- Champ pour le passeport -->
                    <div class="col-md-4">
                        <label for="passport" class="form-label">Passeport </label>
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
                        <label for="province" class="form-label">Ville</label>
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



                    <!-- Champ pour le niveau d'étude -->
                    <div class="col-md-4">
                        <label for="level_of_study" class="form-label">Niveau d'étude</label>
                        <select class="form-select" id="level_of_study" name="level_of_study" required>
                            <option value="" disabled selected>Choisissez un niveau</option>
                            <option value="1" {{ old('level_of_study') == 1 ? 'selected' : '' }}>1ère année</option>
                            <option value="2" {{ old('level_of_study') == 2 ? 'selected' : '' }}>2ème année</option>
                            <option value="3" {{ old('level_of_study') == 3 ? 'selected' : '' }}>3ème année</option>
                            <option value="4" {{ old('level_of_study') == 4 ? 'selected' : '' }}>4ème année</option>

                        </select>
                    </div>




                    <!-- Champ pour l'année du baccalauréat -->
                    <div class="col-md-4">
                        <label for="baccalaureate_year" class="form-label">Année du baccalauréat</label>
                        <select class="form-control" id="baccalaureate_year" name="baccalaureate_year" required>
                            <option value="">Sélectionnez l'année</option>
                            @for($year = date('Y'); $year >= 2017; $year--)
                            <option value="{{ $year }}" {{ old('baccalaureate_year') == $year ? 'selected' : '' }}>
                                {{ $year }}</option>
                            @endfor
                        </select>
                    </div>


                    <!-- Champ pour la spécialité du diplôme -->
                    <div class="col-md-4">
                        <label for="diploma_speciality" class="form-label">Spécialité du diplôme </label>
                        <input type="text" class="form-control" id="diploma_speciality" name="diploma_speciality"
                            value="{{ old('diploma_speciality') }}">
                    </div>

                    <!-- Champ pour la mention du diplôme -->


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
                        <input type="date" class="form-control" id="first_registration_year"
                            name="first_registration_year" value="{{ old('first_registration_year') }}" required>
                    </div>

                    <!-- Champ pour le type de filière -->
                    <div class="col-md-4"> filière d'acces</label>
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




                    <!-- Champ pour les documents soumis -->


                    <!-- les check box  -->
                    <!-- Bac  -->
                    <div class="col-md-12">
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="niveaux" value="bac"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    BAC
                                </label>
                            </div>
                            <!-- Bac  +2-->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="niveaux" value="bac2"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    BAC +2
                                </label>
                            </div>
                            <!-- Bac  +3-->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="niveaux" value="bac3"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    BAC +3
                                </label>
                            </div>
                        </div>


                        <!-- Bac  -->
                        <div class="row bac box">
                            <div class="col-md-6 mb-3">
                                <label>CIN *</label>
                                <input class="form-control" type="file" name="cin">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Diplome baccaloreat *</label>
                                <input class="form-control" type="file" name="diplome_bac">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Relevé des notes *</label>
                                <input class="form-control" type="file" name="relv_note">
                            </div>
                        </div>

                        <!-- Bac +2 -->
                        <div class="row bac2 box">
                            <div class="col-md-6 mb-3">
                                <label>CIN _ Fiche relative à l'admision parallèlle *</label>
                                <input class="form-control" type="file" name="cin">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Diplome baccaloreat *</label>
                                <input class="form-control" type="file" name="diplome_bac">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Attestation de reussite de Bac+2 *</label>
                                <input class="form-control" type="file" name="att_rs">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Relevés des années d'études.*</label>
                                <input class="form-control" type="file" name="relv_note">
                            </div>
                        </div>

                        <!-- Bac +3 -->
                        <div class="row bac3 box">
                            <div class="col-md-6 mb-3">
                                <label>CIN _ Fiche relative à l'admision parallèlle *</label>
                                <input class="form-control" type="file" name="cin">
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label>Diplome baccaloreat *</label>
                                <input class="form-control" type="file" name="diplome_bac">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Diplome de licence *</label>
                                <input class="form-control" type="file" name="att_rs">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Relevés des années d'études.*</label>
                                <input class="form-control" type="file" name="relv_note">
                            </div>
                        </div>
                    </div>

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


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const bacBox = document.querySelector('.bac');
        const bac2Box = document.querySelector('.bac2');
        const bac3Box = document.querySelector('.bac3');

        // Hide all sections by default
        hideAll();

        // Add event listeners for each radio button
        document.querySelectorAll('input[name="niveaux"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                hideAll();
                if (this.value === 'bac') {
                    bacBox.style.display = 'block';
                } else if (this.value === 'bac2') {
                    bac2Box.style.display = 'block';
                } else if (this.value === 'bac3') {
                    bac3Box.style.display = 'block';
                }
            });
        });

        function hideAll() {
            bacBox.style.display = 'none';
            bac2Box.style.display = 'none';
            bac3Box.style.display = 'none';
        }

        // Set the initial display based on the checked radio button
        const checkedRadio = document.querySelector('input[name="niveaux"]:checked');
        if (checkedRadio) {
            checkedRadio.dispatchEvent(new Event('change'));
        }
    });
    </script>

</body>

</html>