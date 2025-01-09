@extends('layouts.app')
  
@section('title', 'Profile Setting')
  
@section('contents')
    <hr />
    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="First name" value="{{ old('nom', auth()->user()->nom) }}">
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">prenom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Last name" value="{{ old('prenom', auth()->user()->prenom) }}">
                            @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="email" name="email"  class="form-control" value="{{ old('email', auth()->user()->email) }}" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Role</label>
                            <input type="text" name="role" class="form-control" disabled value="{{ old('role', auth()->user()->role) }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="New Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button style="background-color:  #62A1D9;color:white;" id="btn" class="btn  profile-button" type="submit">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>   
    </form>
    
@endsection
