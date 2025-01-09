@foreach ($buses as $bus)
    <h2>Bus ID: {{ $bus->id }}</h2>
    <ul>
        @foreach ($bus->arrets as $arret)
            <li>Lieu d'arrivée : {{ $arret->lieu_arrete }}</li>
            <li>Heure d'arrêt : {{ $arret->heure_arret }}</li>
        @endforeach
    </ul>
@endforeach