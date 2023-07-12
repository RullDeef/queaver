<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LabQueue;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Requests\StoreLabQueueRequest;
use App\Http\Requests\UpdateLabQueueRequest;
use Illuminate\Http\Request;

class LabQueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queues = LabQueue::all();

        if ($request->expectsJson()) {
            return $queues;
        }

        return view('lab_queue.index')->with(compact('queues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lab_queue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLabQueueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabQueueRequest $request)
    {
        $data = $request->validated();

        if ($request->has('group_index_indifference'))
            $data['group_index_indifference'] = true;
        else
            $data['group_index_indifference'] = false;

        $data['creator_id'] = Auth::id();
        $queue = LabQueue::create($data);

        if ($request->expectsJson()) {
            return $queue;
        }

        return redirect()->route('queue.show', compact('queue'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabQueue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LabQueue $queue)
    {
        $queue->load([
            'userPlaces',
            'userPlaces.owner',
            'userPlaces.labTask',
            'tasks',
        ]);

        if ($request->expectsJson()) {
            return $queue;
        }

        $me = User::find(Auth::id());
        $taskStates = User::find(Auth::id())->taskStates->whereIn('lab_task_id', $queue->tasks);
        return view('lab_queue.show', compact('queue', 'taskStates', 'me'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabQueue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit(LabQueue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabQueueRequest  $request
     * @param  \App\Models\LabQueue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabQueueRequest $request, LabQueue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabQueue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabQueue $queue)
    {
        //
    }
}
