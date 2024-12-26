<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $saranaCount = Sarana::count();

        $userCount = User::count();

        return view('dashboard', compact('userCount', 'saranaCount'));

    }
}
