<!-- resources/views/service_communication.blade.php -->
@extends('layouts.style')

@section('title', 'Home Page')

@section('content')
       
              
                  <!-- DataTable Code starts -->
                <div class="jumbotron">

                      <h2 class="mb-4">Liste des Demandes de Documents</h2>
                      <div class="mb-4">
                        <a href="{{ route('demandes.envoyes_archives') }}" class="btn btn-secondary">Voir les Demandes Envoyées
                            Archivées</a>
                    </div>
                      <hr class="my-4">
                      <!-- Vérifier s'il y a des demandes -->
                      @if($demandes->isEmpty())
                      <p>Aucune demande de document trouvée.</p>
                      @else
                      <div class="container p-3 my-5 bg-light border border-primary">

                      <table id="example" class="table table-striped nowrap" style="width:100%">
                          <thead>
                              <tr>
                                  <th><small class="fw-bold sm-1">Nom</small></th>
                                  <th><small class="fw-bold sm-1">Prénom</small></th>
                                  <th><small class="fw-bold sm-1">Email</small></th>
                                  <th><small class="fw-bold sm-1">Date de Demande</small></th>

                                  <th><small class="fw-bold sm-1">CIN/Numéro de Passeport</small></th>
                                  <th><small class="fw-bold sm-1">Filière</small></th>
                                  <th><small class="fw-bold sm-1">Niveau</small></th>
                                  <th><small class="fw-bold sm-1">Attestation Demandée</small></th>
                                  <th><small class="fw-bold sm-1">status</small></th>
                                  <th><small class="fw-bold sm-1">Date de Naissance</small></th>
                                  <th><small class="fw-bold sm-1">Action</small></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($demandes as $demande)
                              <tr>
                                  <td>{{ $demande->nom }}</td>
                                  <td>{{ $demande->prenom }}</td>
                                  <td>{{ $demande->email }}</td>
                                  <td>
                                      <p class="fw-normal sm-1">{{ $demande->created_at->format('d/m/Y H:i') }}</p>
                                  </td>
                                  <td>{{ $demande->cin }}</td>
                                  <td>{{ $demande->filere }}</td>
                                  <td>{{ $demande->niveau }}</td>
                                  <td>{{ ucfirst(str_replace('_', ' ', $demande->attestation)) }}</td>
                                  <td>
                                  <span class="badge badge-danger rounded-pill d-inline">{{ $demande->status }}</span>
                                  </td>

                                  <td>{{ $demande->date_naissance }}</td>
                                  <td>
                                      <form action="{{ route('demande.envoyer', $demande->id) }}" method="POST">
                                          @csrf
                                          <button type="submit" class="btn btn-primary">Envoyer la demande</button>
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
          </div>
    </main>
    @endsection