@extends('layouts.app')
  
@section('title')
  
@section('contents')
@if( auth()->user()->type === 'admin')
<h1> Dashboard -  Admin   Busma </h1>
@else
<h1> Bonjour  utilisateur {{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h1>

@endif
@if( auth()->user()->type === 'admin')
  <div class="row">
    
   

    <!-- Earnings (Monthly) Card Example -->
   
  
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                         Nombre d'utilisateurs  </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usersCount }}</div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">      Nombre des admis 

                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adminsCount }}</div>

                            </div>
                            <div class="col">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Carte  active </div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">{{$activeCardsCount}}</div>

                        </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Carte désactivée</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$inactiveCardsCount}}</div>
                        </div>
                       
                        
                    <div class="col-auto">
                                      
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
  @else
  <div >
@endif
@endsection