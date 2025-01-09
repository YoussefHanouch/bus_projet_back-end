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

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th> matriculation</th>
            <th>Prix</th>
            <th>Paid At</th>
            <th>card_holder_name</th>

        </tr>
    </thead>
    <tbody>
        @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->id }}</td>
            <td>
                {{-- Récupérer l'utilisateur associé au paiement --}}
                @php
                    $user = App\Models\User::find($payment->user_id);
                @endphp
    
                {{-- Afficher le nom et le prénom de l'utilisateur --}}
                @if ($user)
                    {{ $user->name }} {{ $user->prenom }}
                @else
                    Utilisateur non trouvé
                @endif
            </td>
            <td>
                {{-- Récupérer la carte associée au paiement --}}
                @php
                    $cart = App\Models\DemandeCart::find($payment->cart_id);
                @endphp
    
                {{-- Afficher le numéro de matriculation de la carte --}}
                @if ($cart)
                    {{ $cart->numero_de_carte }}
                @else
                    Carte non trouvée
                @endif
            </td>            <td>{{ $payment->amount }}</td>
            <td>{{ $payment->paid_at }}</td>
            <td>{{ $payment->card_holder_name }}</td>
            <td>
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
