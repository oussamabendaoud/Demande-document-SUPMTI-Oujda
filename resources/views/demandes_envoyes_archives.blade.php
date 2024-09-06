@extends('layouts.style')

@section('content')
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des Demandes Envoyées Archivées</h2>

        @if($demandesEnvoyesArchives->isEmpty())
        <p>Aucune demande envoyée archivée trouvée.</p>
        @else
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date de Demande</th>
                    <th>Attestations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($demandesEnvoyesArchives as $archive)
                <tr>
                    <td>{{ $archive->nom }}</td>
                    <td>{{ $archive->prenom }}</td>
                    <td>{{ $archive->email }}</td>
                    <td>{{ $archive->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $archive->attestations }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>
@endsection