@extends('layouts.app')
  
@section('title', 'Créer un nouveau bus')


<style>
    
    .lg{
    width: 60px;
    height: 60px;
    transform: rotate(15deg);
    mix-blend-mode: darken;
}
.bc{
    background-color: #62A1D9;
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
<div class="container">
    <form action="{{ route('bus.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="numéro_de_bus">Numéro de bus :</label>
            <input type="text" name="numéro_de_bus" id="numéro_de_bus" class="form-control" required>
            @error('numéro_de_bus')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="modèle">Modèle :</label>
            <input type="text" name="modèle" id="modèle" class="form-control" required>
            @error('modèle')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="immatriculation">Immatriculation :</label>
            <input type="text" name="immatriculation" id="immatriculation" class="form-control" required>
            @error('immatriculation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Origine">Origine :</label>
            <input type="text" name="Origine" id="Origine" class="form-control" required>
            @error('Origine')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Destination">Destination :</label>
            <input type="text" name="Destination" id="Destination" class="form-control" required>
            @error('Destination')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Tarifs">Tarifs :</label>
            <input type="text" name="Tarifs" id="Tarifs" class="form-control" required>
            @error('Tarifs')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('bus.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
