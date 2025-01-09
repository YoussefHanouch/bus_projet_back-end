{{-- 

<div class="container">

    <center><h1  class="mb-4" style="color:#62A1D9"> demandes de carte Busma</h1>
    <div class="row">
        <div class="card-body">
            @if($demandeCarte)
                <pre>Prénom et Nom: {{ $demandeCarte->utilisateur_nom }} {{ $demandeCarte->prenom_utilisateur }}</pre> 
                <pre>Genre: {{ $demandeCarte->genre }}</pre>  
                <pre>Mois de la Demande: {{ $demandeCarte->mois_demande }}</pre> 
                <pre>Numéro de Carte: {{ $demandeCarte->numero_de_carte }}</pre> 
                <pre>Numéro de téléphone: {{ $demandeCarte->phone_number }}</pre> 
                <pre>Email: {{ $demandeCarte->user->email }}</pre> 
                <pre>Date de naissance: {{ $demandeCarte->date_naissance }}</pre> 
                <pre>Établissement: {{ $demandeCarte->etablissement }}</pre> 
                <pre>Adresse: {{ $demandeCarte->adresse }}</pre> 
                <pre>Numéro de Bus: {{ $demandeCarte->bus->numéro_de_bus }}</pre> 
            @else
                <p>No demandeCarte found.</p>
            @endif
        </div>
            <br>
            <table style="margin-left: 60%" border="2" class="table table-bordered mb-10">
                <tr>
                  <td width='50%'  class="border-2 border-cyan-400 h-7 ">   <center>Cachet visa du doyen ou <br> directeur de l'établissement   </center> </td>                 </tr>
                <tr >
                    <td   class="border border-primary"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;</td>
                </tr>
            </table>
        
        
            
            
       
    </div>
</div>
</center>
 --}}
<style>
    .container {
    margin: 50px auto;
    max-width: 800px;
    padding: 20px;
    background-color: #f8f8f8;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.card-body {
    margin-bottom: 20px;
}

pre {
    margin: 0;
}

table {
    width: 50%;
}

table td {
    padding: 10px;
    text-align: center;
}

.border-cyan-400 {
    border-color: #62A1D9;
}

</style>
 <div class="container">
    <center><h1 class="mb-4" style="color:#62A1D9">Demandes de carte Busma</h1></center>
    <div class="row">
        <div class="card-body">
            @if($demandeCarte)
                <pre>Prénom et Nom: {{ $demandeCarte->utilisateur_nom }} {{ $demandeCarte->prenom_utilisateur }}</pre> 
                <br>
                <pre>Genre: {{ $demandeCarte->genre }}</pre> 
                <br> 
                
                <pre>Mois de la Demande: {{ $demandeCarte->mois_demande }}</pre>  <br>
                <pre>Numéro de Carte: {{ $demandeCarte->numero_de_carte }}</pre> <br> 
                <pre>Numéro de téléphone: {{ $demandeCarte->phone_number }}</pre>  <br>
                <pre>Email: {{ $demandeCarte->user->email }}</pre>  <br>
                <pre>Date de naissance: {{ $demandeCarte->date_naissance }}</pre>  <br>
                <pre>Établissement: {{ $demandeCarte->etablissement }}</pre>  <br>
                <pre>Adresse: {{ $demandeCarte->adresse }}</pre>  <br>
                <pre>Numéro de Bus: {{ $demandeCarte->bus->numéro_de_bus }}</pre>  <br>
            @else
                <p>No demandeCarte found.</p>
            @endif
        </div>
        <br>
        <table style="margin-left: 30%" border="2" class="table table-bordered mb-10">
            <tr>
                <td width='50%' class="border-2 border-cyan-400 h-7 ">
                    <center>Cachet visa du doyen ou <br> directeur de l'établissement</center>
                </td>
            </tr>
            <tr>
                <td class="border border-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;</td>
            </tr>
        </table>
    </div>
</div>
