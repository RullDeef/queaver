<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUserPlaceRequest;
use App\Models\LabTask;
use App\Models\UserTaskState;
use Illuminate\Support\Facades\Cookie;
use RuntimeException;

class UserPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (User::find(Auth::id())->isAdmin()) {
            $userPlaces = UserPlace::all();
        } else {
            $userPlaces = UserPlace::where('user_id', Auth::id())->get();
        }

        if ($request->expectsJson()) {
            return $userPlaces;
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
        $data = $request->only(['lab_queue_id', 'lab_task_id']);

        if ($request->has('user_id')) {
            $data['user_id'] = $request->input('user_id');
        } else {
            $data['user_id'] = Auth::id();
        }
        $userPlace = UserPlace::create($data);

        if ($request->prefersJson()) {
            return response()->json($userPlace, 201);
        }

        return redirect()->back()->with('place', $userPlace);
    }

    public function done(Request $request)
    {
        $userPlace = UserPlace::find($request->only(['user_id', 'lab_queue_id', 'lab_task_id']));

        // $userPlace->delete();
        // UserTaskState::updateOrCreate(
        //     $request->only(['user_id', 'lab_task_id']),
        //     ['state' => UserTaskState::COMPLETED]
        // );
        Cookie::queue('done', true, 1);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPlace  $userPlace
     * @return \Illuminate\Http\Response
     */
    public function show(REquest $request, UserPlace $userPlace)
    {
        if ($request->expectsJson()) {
            return $userPlace;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPlace  $userPlace
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPlace $userPlace)
    {
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
        return response()->json([
            'request' => $request->all(),
            'task' => $userPlace->user_id,
        ]);
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
