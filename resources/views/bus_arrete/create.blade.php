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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('bus-arrete.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="bus_id">Sélectionner un bus :</label>
        <select name="bus_id" id="bus_id" class="form-control">
            @foreach($buses as $bus)
                <option value="{{ $bus->id }}">{{ $bus->numéro_de_bus }}</option>
            @endforeach
        </select>
        @error('bus_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div id="arrets_fields">
        <div class="form-group">
            <label for="arret_ids">Sélectionner les arrêts :</label>
            <select name="arret_ids[]" class="form-control">
                @foreach($arrets as $arret)
                    <option value="{{ $arret->id }}">{{ $arret->lieu_arrete }}</option>
                @endforeach
            </select>
            @error('arret_ids')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
{{-- 
        <div class="form-group">
            <label for="heure_arretes">Heures d'arrêt :</label>
            <input type="time" name="heure_arretes[]" class="form-control" required>
            @error('heure_arretes')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div> --}}
    <div class="form-group">
        <label for="heure_arretes">Heures d'arrêt :</label>
        <select name="heure_arretes[]" class="form-control" required>
            @foreach ($heureArretes as $heureArrete)
                @php
                    $heureMinute = date('H:i', strtotime($heureArrete));
                @endphp
                <option value="{{ $heureMinute }}">{{ $heureMinute }}</option>
            @endforeach
        </select>
        @error('heure_arretes')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    
    
    {{-- <button type="button" id="add_arret" class="btn btn-primary">Ajouter un autre arrêt</button> --}}

    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>

{{-- <script>
    document.getElementById('add_arret').onclick = function() {
        var arretField = document.getElementById('arrets_fields').firstElementChild.cloneNode(true);
        document.getElementById('arrets_fields').appendChild(arretField);
    };
</script> --}}

@endsection
