<?php

namespace App\Http\Controllers;

use App\Models\User;

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
        $resp = view('home');

        if (auth()->check()) {
            $mates = User::where('group_index', auth()->user()->group_index)->get();
            $resp = $resp->with('groupmates', $mates);
        }

        return $resp;
    }
}
