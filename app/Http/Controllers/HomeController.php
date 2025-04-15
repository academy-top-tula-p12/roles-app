<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $isManager = $user->hasRole('project-manager');
        $isDeveloper = $user->hasRole('web-developer');

        return view('home', [
            "user" => $user,
            "isManager" => $isManager,
            "isDeveloper" => $isDeveloper,
        ]);
    }
}
