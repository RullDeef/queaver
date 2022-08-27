<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabQueueRequest;
use App\Http\Requests\UpdateLabQueueRequest;
use App\Models\LabQueue;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLabQueueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabQueueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabQueue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(LabQueue $queue)
    {
        //
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
