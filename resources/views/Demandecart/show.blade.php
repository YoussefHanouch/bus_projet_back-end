@extends('layouts.app')

@section('title')

@section('contents')

<style>
    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .lg{
    width: 60px;
    height: 60px;
    transform: rotate(15deg);
    mix-blend-mode: darken;
}
.bc{
    background: #62A1D9;
}

    .card {
        width: 80%;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #62A1D9;
        color: #fff;
        font-weight: bold;
        padding: 15px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .list-group-item {
        padding: 10px 0;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .card-footer {
        padding: 15px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .btn-secondary {
        background-color: #62A1D9;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
    }

    .btn-secondary:hover {
        background-color: #62A1D9;
    }

</style>
<div class="container">
    <div class="card">
        <div style="background-color: #62A1D9" class="card-header  text-white">
          <center>Détails de la demande de carte</center>  
        </div>
        <div class="card-body">
            <h5 class="card-title">Informations de la demande</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nom de l'utilisateur:</strong> {{ $demandeCarte->utilisateur_nom }}</li>
                <li class="list-group-item"><strong>Prénom de l'utilisateur:</strong> {{ $demandeCarte->prenom_utilisateur }}</li>
                <li class="list-group-item"><strong>genre</strong> {{ $demandeCarte->genre  }}</li>
                <li class="list-group-item"><strong>Numéro de carte:</strong> {{ $demandeCarte->numero_de_carte }}</li>
                <li class="list-group-item"><strong>Adresse:</strong> {{ $demandeCarte->adresse }}</li>
                <li class="list-group-item"><strong>Mois de la demande:</strong> {{ $demandeCarte->mois_demande }}</li>
                <li class="list-group-item"><strong>phone_number:</strong> {{ $demandeCarte->phone_number }}</li>
                <li class="list-group-item"><strong> Statut dossier </strong> {{ $demandeCarte->dossier_accepte }}</li>
            </ul>
        </div>
        <div class="card-footer">
            <td>
                <form action="{{ route('demande-carte.accepter', $demandeCarte) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-lg">Accepter</button>
                </form>
            </td>
            <td>
                <form action="{{ route('demande-carte.refuser', $demandeCarte) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger btn-lg">Refuser</button>
                </form>
            </td>
            <a href="{{ route('demandes_carte.index') }}" class="btn btn-secondary ">Retour à la liste</a>
            <button id="toggleButton" class="btn btn-primary btn-lg">Afficher/Masquer photo</button>

            <div class="mt-4">
                <div id="photoDiv">
                    @if($demandeCarte->document_validation)
                        <h5>Photo téléchargée :</h5>
                        <img src="{{ asset('photos/' . $demandeCarte->document_validation) }}" id="photo" class="img-fluid" alt="Photo">
                    @else
                        <h5>Validation non terminée :</h5>
                        <p>Aucune photo n'a été téléchargée pour le moment.</p>
                    @endif
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const photoDiv = document.getElementById('photoDiv');
                    const toggleButton = document.getElementById('toggleButton');
            
                    toggleButton.addEventListener('click', function() {
                        if (photoDiv.style.display === 'none') {
                            photoDiv.style.display = 'block';
                            toggleButton.textContent = 'Masquer photo';
                        } else {
                            photoDiv.style.display = 'none';
                            toggleButton.textContent = 'Afficher photo';
                        }
                    });
                });
            </script>
            

        </div>
    </div>
</div>


@endsection
