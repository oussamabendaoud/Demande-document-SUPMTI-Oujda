<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Demande document</title>
</head>

<body>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="{{ asset('img/Logo-SupMTI-s-2024.png') }}" height="60" alt="" loading="lazy" />
            </img>
                <span class="fs-4" style="margin-left: 20px;">E-Documment</span>
            </a>
        </header>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h2 class="display-5 fw-bold">Demande Documment</h2>
                <p>Simplifiez vos démarches en ligne. Faites votre demande de fichiers directement auprès de notre
                    administration scolaire.</p>
                <div class="container py-4">
                    <!-- Affichage des messages de succès -->
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
                    <form class="row g-3" action="{{ route('demande.store') }}" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                value="{{ old('prenom') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="date_naissance" class="form-label">Date de naissance</label>
                            <input type="Date" class="form-control" id="date_naissance" name="date_naissance"
                                value="{{ old('date_naissance') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin" name="cin" value="{{ old('cin') }}"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="filere" class="form-label">Filière</label>
                            <select class="form-select" id="filere" name="filere" required>
                                <option selected disabled value="">Filière...</option>
                                <option value="MGE" {{ old('filere') == 'MGE' ? 'selected' : '' }}>MGE</option>
                                <option value="ISI" {{ old('filere') == 'ISI' ? 'selected' : '' }}>ISI</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="niveau" class="form-label">Niveau</label>
                            <select class="form-select" id="niveau" name="niveau" required>
                                <option selected disabled value="">Niveau...</option>
                                <option value="1ere" {{ old('niveau') == '1ere' ? 'selected' : '' }}>1er Année</option>
                                <option value="2eme" {{ old('niveau') == '2eme' ? 'selected' : '' }}>2ème Année</option>
                                <option value="3eme" {{ old('niveau') == '3eme' ? 'selected' : '' }}>3ème Année</option>
                                <option value="4eme" {{ old('niveau') == '4eme' ? 'selected' : '' }}>4ème Année</option>
                                <option value="5eme" {{ old('niveau') == '5eme' ? 'selected' : '' }}>5ème Année</option>
                            </select>
                        </div>
                        <div class="col-12">

                            <label class="form-label">Attestation demandée:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="attestation_inscription"
                                    name="attestation[]" value="attestation_inscription"
                                    {{ in_array('attestation_inscription', old('attestation', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="attestation_inscription">Attestation
                                    d'inscription</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="attestation_scolarite"
                                    name="attestation[]" value="attestation_scolarite"
                                    {{ in_array('attestation_scolarite', old('attestation', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="attestation_scolarite">Attestation de
                                    scolarité</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="attestation_reussite"
                                    name="attestation[]" value="attestation_reussite"
                                    {{ in_array('attestation_reussite', old('attestation', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="attestation_reussite">Attestation de
                                    réussite</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="releve_notes" name="attestation[]"
                                    value="releve_notes"
                                    {{ in_array('releve_notes', old('attestation', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="releve_notes">Relevé de notes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="convention_stage"
                                    name="attestation[]" value="convention_stage"
                                    {{ in_array('convention_stage', old('attestation', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="convention_stage">Convention de stage</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="diplome" name="attestation[]"
                                    value="diplome" {{ in_array('diplome', old('attestation', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="diplome">Diplôme</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>