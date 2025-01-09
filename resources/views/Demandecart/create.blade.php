@extends('layouts.app')
  
@section('title', 'Demande cart bus')
<style>
    
    .lg{
    width: 60px;
    height: 60px;
    transform: rotate(15deg);
    mix-blend-mode: darken;
}
.bc{
    background: #62A1D9;
}
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    button[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #62A1D9;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #62A1D9; /* couleur vert foncé */
    }
</style>



@section('contents')
<form method="POST" action="{{ route('demande_carte.store') }}">
    @csrf

    <div class="form-group">
        <label for="utilisateur_id">Nom de l'Utilisateur:</label>
        <input type="text" id="utilisateur_id" name="utilisateur_nom" class="form-control" value="{{ auth()->user()->name }}" required>
        @error('utilisateur_nom')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="prenom_utilisateur">Prénom de l'Utilisateur:</label>
        <input type="text" id="prenom_utilisateur" name="prenom_utilisateur" class="form-control" value="{{ auth()->user()->prenom }}" required>
        @error('prenom_utilisateur')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="genre">Genre:</label>
        <select required class="form-control" id="genre" name="genre">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select>
        @error('genre')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
        @error('phone_number')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="numero_de_carte">Numéro de Carte:</label>
        <input type="text" id="numero_de_carte" name="" class="form-control" value="{{ mt_rand(1000000000, 9999999999) }}" disabled >
        <input type="hidden" id="numero_de_carte" name="numero_de_carte" class="form-control" value="{{ mt_rand(1000000000, 9999999999) }}"  required>
        @error('numero_de_carte')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    
    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" class="form-control" required>
        @error('adresse')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" class="form-control" required>
        @error('date_naissance')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="etablissement">Établissement:</label>
        <input type="text" id="etablissement" name="etablissement" class="form-control" placeholder="Nom de l'établissement" required>
        @error('etablissement')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    
   
    <div class="form-group">
        <label for="mois_demande">Mois de la Demande:</label>
        <select id="mois_demande" name="mois_demande" class="form-control" required>
            <option value="1">Janvier</option>
            <option value="2">Février</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Août</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
       
        </select>
        @error('mois_demande')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    
    
    <div class="form-group">
        <label for="bus_id">Numéro de Bus:</label>
        <select id="bus_id" name="bus_id" class="form-control" required >
            @foreach($buses as $bus)
                <option value="{{ $bus->id }}">{{ $bus->numéro_de_bus }}</option>
            @endforeach
        </select>
        @error('bus_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    

    <button type="submit" class="btn btn-primary">Ajouter Demande de Carte</button>
</form>
@endsection