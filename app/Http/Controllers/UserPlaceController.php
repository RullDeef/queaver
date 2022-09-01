<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUserPlaceRequest;
use Illuminate\Support\Facades\Cookie;
use RuntimeException;

class UserPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (User::find(Auth::id())->isAdmin()) {
            $userPlaces = UserPlace::all();
        } else {
            $userPlaces = UserPlace::where('user_id', Auth::id())->get();
        }

        return view('user_places.index', compact('userPlaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        throw new RuntimeException('Not implemented');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPlaceRequest $request)
    {
        $data = $request->only(['user_id', 'lab_queue_id', 'lab_task_id']);
        $userPlace = UserPlace::create($data);

        return redirect()->back()->with('place', $userPlace);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPlace  $userPlace
     * @return \Illuminate\Http\Response
     */
    public function show(UserPlace $userPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPlace  $userPlace
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPlace $userPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPlace  $userPlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPlace $userPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPlace  $userPlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPlace $userPlace)
    {
        //
    }
}
