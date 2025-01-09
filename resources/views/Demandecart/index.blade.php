@extends('layouts.app')
  
@section('title', 'Liste des demandes de carte ')
  
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
            background-color: #13532d; /* couleur vert foncé */
        }
    </style>
</head>
<body>
    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom complet l'utilisateur</th>
                    <th>Numéro de Carte</th>
                    {{-- <th>Adresse</th> --}}
                    <th>etablissement</th>
                    <th>Date_naissance</th>
                    <th>Mois de la demande</th>
                    <th>Statu  dossier</th>
                    <th>statu Cart bus</th>
                    <th>Dossier</th>

                   
                </tr>
            </thead>
            <tbody>
                @foreach ($demandesCartes as $demandeCarte)
                    <tr>
                        <td>{{ $demandeCarte->utilisateur_nom }} {{ $demandeCarte->prenom_utilisateur }}</td>
                        <td>{{ $demandeCarte->numero_de_carte }}</td>
                        <td>{{ $demandeCarte->etablissement }}</td>
                        <td>{{ $demandeCarte->date_naissance }}</td>


                        <td>
                            @php
                                $mois = [
                                    1 => 'Janvier',
                                    2 => 'Février',
                                    3 => 'Mars',
                                    4 => 'Avril',
                                    5 => 'Mai',
                                    6 => 'Juin',
                                    7 => 'Juillet',
                                    8 => 'Août',
                                    9 => 'Septembre',
                                    10 => 'Octobre',
                                    11 => 'Novembre',
                                    12 => 'Décembre',
                                ];
                            @endphp
                            {{ $mois[$demandeCarte->mois_demande] }}
                        </td>
                        <td>{{ $demandeCarte->dossier_accepte }}</td>

                        <td class="d-flex">

                            @if(auth()->user()->type === 'admin')
                                @if($demandeCarte->cart_active == 1)
                                    
                                    <form method="POST" action="{{ route('activation', $demandeCarte->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Activer</button>
                                    </form>
                                    &nbsp; &nbsp;  <a href="{{ route('demandes_carte.show', $demandeCarte->id) }}" class="btn btn-info"> détails</a>

                                    
                                @else
                                    
                                    <form method="POST" action="{{ route('desactivation', $demandeCarte->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Désactiver</button>
                                    </form>
                          
                                   &nbsp; &nbsp; <a href="{{ route('demandes_carte.show', $demandeCarte->id) }}" class="btn btn-info"> détails</a>

                                @endif


                            @else

                            @if($demandeCarte->cart_active == 1)
                                    
                            <p>Activer</p>
                        @else
                            
                        <p>Désactiver</p>
                        
                        @endif
                                
                            @endif
                        </td>
                        <td><a href="{{ route('telecharger.document', $demandeCarte) }}" class="btn btn-primary btn-sm">Compléter le dossier</a></td>
                        
                                            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  
    <div class="mt-4">
        {{$demandesCartes->links()}}
    </div>
@endsection