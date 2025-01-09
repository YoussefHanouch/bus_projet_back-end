<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DemandeCart;

class DashboardController extends Controller
{
    public function index()
    {
        $adminsCount = User::where('type', 'admin')->count();
        $usersCount = User::where('type', 'user')->count();
        $activeCardsCount = DemandeCart::where('cart_active', 1)->count();
        $inactiveCardsCount = DemandeCart::where('cart_active', 0)->count();
    
        return view('dashboard', compact('adminsCount', 'usersCount', 'activeCardsCount', 'inactiveCardsCount'));
    }
}
