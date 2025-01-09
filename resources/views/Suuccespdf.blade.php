@extends('layouts.app')

@section('title',)

@section('contents')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .actions {
        margin-top: 20px;
        text-align: center;
    }

    .btn{
        display: inline-block;
        padding: 10px 20px;
        background-color: #62A1D9;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #62A1D9;
    }
</style>
</head>
<body>

<div class="container">
<center><h1>L'opération a été effectuée avec succès</h1></center>

<div class="actions">
    <p>Merci  de votre confiance Veuillez télécharger votre Document ci-dessous :</p>
    <a href="{{ route('busma.generate') }}" class="btn">Télécharger le Document</a>
    <a href="{{ route('demandes_carte.index') }}" class="btn">Voir  votre demande</a>

</div>
</div>



@endsection