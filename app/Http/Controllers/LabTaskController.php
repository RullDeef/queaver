<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabTaskRequest;
use App\Http\Requests\UpdateLabTaskRequest;
use App\Models\LabTask;

class LabTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lab_task.index')->with([
            'labs' => LabTask::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lab_task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLabTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Http\Response
     */
    public function show(LabTask $labTask)
    {
        return view('lab_task.show')->with([
            'lab_task' => $labTask,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Http\Response
     */
    public function edit(LabTask $labTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabTaskRequest  $request
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabTaskRequest $request, LabTask $labTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabTask $labTask)
    {
        //
    }
}
