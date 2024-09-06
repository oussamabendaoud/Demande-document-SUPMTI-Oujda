    <!-- resources/views/service_scolarite.blade.php -->
    @extends('layouts.style')

    @section('title', 'Home Page')

    @section('content')

                <!-- Main Content -->

                <!-- DataTable Code starts -->
                <div class="jumbotron">
                    <h2 class="mb-4">Liste des Demandes de Documents - Statut : Envoyée</h2>
                    <div class="mb-4">

                        <a href="{{ route('documents.envoyes_archives') }}" class="btn btn-secondary">Voir les Documents Envoyés
                            Archivés</a>
                    </div>
                    <hr class="my-4">

                    <!-- Vérifier s'il y a des demandes -->
                    @if($demandes->isEmpty())
                    <p>Aucune demande de document envoyée n'a été trouvée.</p>
                    @else
                    <table id="example" class="table table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Date de Demande</th>
                                <th>CIN/Numéro de Passeport</th>
                                <th>Filière</th>
                                <th>Niveau</th>
                                <th>Attestation Demandée</th>
                                <th>Date de Naissance</th>
                                <th>envoyer le document</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demandes as $demande)
                            <tr>
                                <td>{{ $demande->nom }}</td>
                                <td>{{ $demande->prenom }}</td>
                                <td>{{ $demande->email }}</td>
                                <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $demande->cin }}</td>
                                <td>{{ $demande->filere }}</td>
                                <td>{{ $demande->niveau }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $demande->attestations)) }}</td>
                                <td>{{ $demande->date_naissance }}</td>
                                <td>
                                    <form action="{{ route('demande.envoyer_document', ['id' => $demande->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Choisir fichier :</label>
                                            <input type="file" id="file" name="file" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Envoyer le document</button>
                                    </form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @endif
                </div>
            </div>
        </div>
    </main>
    @endsection