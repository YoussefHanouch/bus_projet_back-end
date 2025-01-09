@extends('layouts.app')
  
@section('title','Liste des trajets de bus')
  
@section('contents')
    <style>
       

        .table-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #62A1D9;
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .actions a, .actions button {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            background-color: #62A1D9;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .actions button {
            background-color: #dc3545; /* couleur rouge */
        }

        .actions a:hover, .actions button:hover {
            background-color: #62A1D9; /* couleur vert foncé */
        }
    </style>
</head>
<body>
    <div class="">
       
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">matriculation</th>
                                    <th scope="col">Bus</th>
                                    <th scope="col">Lieu de départ</th>
                                    <th scope="col">Lieu d'arrivée</th>
                                    <th scope="col">Heure de départ</th>
                                    <th scope="col">Heure d'arrivée</th>
                                    <th scope="col">Actions</th> 

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trajets as $trajet)
                                    <tr>
                                        <td scope="row"><b>{{ $trajet->bus->immatriculation }}</b></td>
                                        <td><b>{{ $trajet->bus->numéro_de_bus }}</b></td>
                                        <td>{{ $trajet->lieu_depart }}</td>
                                        <td>{{ $trajet->lieu_arrivee }}</td>
                                        <td>{{ $trajet->heure_depart }}</td>
                                        <td>{{ $trajet->heure_arrivee }}</td>
                                        <td>
                                            <a href="{{ route('trajet_bus.edit', $trajet->idtrajet) }}" class="btn btn-primary">Modifier</a> <!-- Lien pour modifier -->
                                            <form action="{{ route('trajet_bus.destroy', $trajet->idtrajet) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?')">Supprimer</button> <!-- Bouton pour supprimer -->
                                            </form>
                                        </td>
                                    </tr>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
           
    <div class="mt-4">
        {{$trajets->links()}}
    </div>
@endsection