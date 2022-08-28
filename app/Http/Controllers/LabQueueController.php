<?php

namespace App\Http\Controllers;

use App\Models\LabQueue;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Requests\StoreLabQueueRequest;
use App\Http\Requests\UpdateLabQueueRequest;

class LabQueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Debugbar::error('queue create!');
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
        Debugbar::info("storing lab queue");

        $data = $request->validated();

        if ($request->has('group_index_indifference'))
            $data['group_index_indifference'] = true;
        else
            $data['group_index_indifference'] = false;

        $queue = LabQueue::make($data);

        $queue->creator_id = Auth::id();
        $queue->save();

        Debugbar::info($queue);

        return redirect()->route('queue.show', ['queue' => $queue->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabQueue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(LabQueue $queue)
    {
        return view('lab_queue.show', compact('queue'));
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
