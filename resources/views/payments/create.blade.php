@extends('layouts.app')
  
@section('title', 'Payments cart bus')
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
<form method="POST" action="{{ route('payments.store') }}">
    @csrf

    <div class="form-group">
        <label for="user_id">Nom complet  Utilisateur</label>
        <input type="hidden" name="user_id" value="{{ $users->id }}">
            <input type="text" name="" value="{{ $userName }}" readonly>
          @error('user_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="cart_id">Carte:</label>
        <select id="cart_id" name="cart_id" class="form-control" required>
            <option value="">Sélectionner une carte</option> <!-- Add an empty option for placeholder -->
            @foreach($carts as $cart)
                <option value="{{ $cart->id }}">{{ $cart->numero_de_carte }}</option>
            @endforeach
        </select>
        @error('cart_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
   
  
    <div class="form-group">
        <label for="numbus">Numéro de bus:</label>
        <input type="text" value="{{ $cart->bus->numéro_de_bus }}" readonly>
        @error('numbus')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
   

    <div class="form-group">
        <label for="card_holder_name">Nom du titulaire de la carte:</label>
        <input type="text" name="card_holder_name" class="form-control" required>
        @error('card_holder_name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="card_number">Numéro de carte Bancaire:</label>
        <input type="text" name="card_number" class="form-control" required>
        @error('card_number')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="card_expiry">Date d'expiration de la carte:</label>
            <input type="text" name="card_expiry" class="form-control" placeholder="MM/YY" required>
            @error('card_expiry')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="card_cvc">Code de vérification de la carte:</label>
            <input type="text" name="card_cvc" class="form-control" placeholder="CVC" required>
            @error('card_cvc')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="amount">Montant:</label>
        <input type="text" id="amount" name="" value="100dh" class="form-control" disabled required>
        <input type="hidden" id="amount" name="amount" value="100" class="form-control" >
        @error('amount')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="paid_at">Date de paiement:</label>
        <input type="datetime-local" id="paid_at" name="paid_at" class="form-control" required value="{{ now()->format('Y-m-d\TH:i') }}">
        @error('paid_at')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <button type="submit" class="btn btn-primary">Ajouter Paiement</button>
</form>

@endsection