<ul class="navbar-nav  sidebar bc sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{asset('/assets/image/logo.png')}}" class="lg">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    
    <!-- Nav Item - Pages Collapse Menu -->
    @if( auth()->user()->type === 'admin')

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
          <i class="fas fa-fw fa-user"></i>

          <span>Gestion d'admin</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('admin.create')}}">ajouter admin</a>
            <a class="collapse-item" href="{{route('admin.index')}}">Afficher les admin</a>
          </div>
        </div>
      </li>
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
        <i class="fas fa-fw fa-user-shield"></i>
          <span>Gestion des utulisateur</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('utilisateur.create')}}">Ajouter utilisateur</a>
            <a class="collapse-item" href="{{route('utilisateur.index')}}">Afficher les utilisateur</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVehicle" aria-expanded="true" aria-controls="collapseVehicle">
          <i class="fas fa-fw fa-bus"></i>
          <span>Gestion ligne des bus</span>
        </a>
        <div id="collapseVehicle" class="collapse" aria-labelledby="headingVehicle" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('bus.create')}}">Ajouter un ligne des bus</a>
            <a class="collapse-item" href="{{route('bus.index')}}">Afficher ligne des bus</a>
          </div>
        </div>
      </li>
      @endif
     
      
    <!-- Nav Item - Utilities Collapse Menu -->
   
    
    <!-- Nav Item - Charts -->
  <!-- Menu pour le propriétaire de véhicule -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ownerMenu" aria-expanded="true" aria-controls="ownerMenu">
      <i class="fas fa-fw fa-map"></i>
      <span>Gestion de carte</span>
    </a>
    <div id="ownerMenu" class="collapse" aria-labelledby="headingOwner" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('demande_carte.create') }}">Demander une carte</a>

        <a class="collapse-item" href="{{route('demandes_carte.index')}}">Afficher les cartes</a>
      </div>
    </div>
  </li>
 

  @if( auth()->user()->type === 'admin')
  
  <!-- Menu pour l'inspecteur -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trajetMeu" aria-expanded="true" aria-controls="trajetMeu">
        <i class="fas fa-fw fa-route"></i> <!-- Utilisation de l'icône fa-route pour représenter la gestion des trajets -->
        <span>Gestion des trajets</span>
    </a>
    <div id="trajetMeu" class="collapse" aria-labelledby="headingTrajet" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('trajet_bus.create')}}">Ajouter un trajet</a> <!-- Lien pour ajouter un nouveau trajet -->
            <a class="collapse-item" href="{{route('trajet_bus.index')}}">Afficher les trajets</a> <!-- Lien pour afficher tous les trajets -->
            <a class="collapse-item" href="{{route('bus-arrete.create')}}">Les arrets de bus</a> <!-- Lien pour afficher tous les trajets -->

          </div>
    </div>
</li>

 @endif

 <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trajetMenu" aria-expanded="true" aria-controls="trajetMenu">
    <i class="fas fa-fw fa-money-check-alt"></i>
    <span>Paiement</span>
  </a>
  <div id="trajetMenu" class="collapse" aria-labelledby="headingTrajet" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('payments.create')}}">Recharge de Cartes</a> <!-- Lien pour ajouter un nouveau trajet -->

          <a class="collapse-item" href="{{route('payments.index')}}">Historique des paiements</a> <!-- Lien pour ajouter un nouveau trajet -->
      </div>
  </div>
</li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
     
      
    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2"  src="{{asset('/assets/image/logo.png')}}" alt="...">
        
       <p class="text-center mb-2"><strong>busma </strong> 
          notre service de bus,votre trajet en toute facilité !.votre voyage sans souci.</p>
    </div>
    
    </ul>