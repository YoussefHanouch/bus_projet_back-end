@extends('layouts.app')

@section('title', 'Modifier le trajet de bus')
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
<div class="container">
    <form action="{{ route('trajet_bus.update', $trajet->idtrajet) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="bus_id">Sélectionner un bus :</label>
            <select name="bus_id" id="bus_id" class="form-control" required>
                @foreach($buses as $bus)
                <option value="{{ $bus->id }}" {{ $trajet->bus_id == $bus->id ? 'selected' : '' }}>{{ $bus->numéro_de_bus }}</option>
                @endforeach
            </select>
            @error('bus_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    

        <div class="form-group">
            <label for="lieu_depart">Lieu de départ :</label>
            <select name="lieu_depart" class="form-control">
                @foreach($arrets as $arret)
                    <option value="{{ $arret->lieu_arrete }}" {{ $trajet->lieu_depart == $arret->lieu_arrete ? 'selected' : '' }}>{{ $arret->lieu_arrete }}</option>
                @endforeach
            </select>
            @error('lieu_depart')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="lieu_arrivee">Lieu d'arrivée :</label>
            <select name="lieu_arrivee" class="form-control">
                @foreach($arrets as $arret)
                    <option value="{{ $arret->lieu_arrete }}" {{ $trajet->lieu_arrivee == $arret->lieu_arrete ? 'selected' : '' }}>{{ $arret->lieu_arrete }}</option>
                @endforeach
            </select>
            @error('lieu_arrivee')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        










        <div class="form-group">
            <label for="heure_depart">Heure de départ :</label>
            <input type="time" name="heure_depart" id="heure_depart" class="form-control" value="{{ $trajet->heure_depart }}" required>
            @error('heure_depart')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="heure_arrivee">Heure d'arrivée :</label>
            <input type="time" name="heure_arrivee" id="heure_arrivee" class="form-control" value="{{ $trajet->heure_arrivee }}" required>
            @error('heure_arrivee')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('trajet_bus.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
