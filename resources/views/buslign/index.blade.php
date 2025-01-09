@extends('layouts.app')
  
@section('title', ' listes  ligne bus ')
  
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
<table>
    <thead>
        <tr>
            <th>Numéro de bus</th>
            <th>Modèle</th>
            <th>Immatriculation</th>
            <th>Origine</th>
            <th>Destination</th>
            <th>Tarifs</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buses as $bus)
        <tr>
            <td>{{ $bus->numéro_de_bus }}</td>
            <td>{{ $bus->modèle }}</td>
            <td>{{ $bus->immatriculation }}</td>
            <td>{{ $bus->Origine }}</td>
            <td>{{ $bus->Destination }}</td>
            <td>{{ $bus->Tarifs }}</td>
            <td class="actions">
                <a href="{{ route('bus.edit', $bus->id) }}">Modifier</a>
                <form action="{{ route('bus.destroy', $bus->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<div class="mt-4">
    {{$buses->links()}}
</div>
</div>
@endsection