<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LabTask;
use App\Models\LabQueue;
use App\Models\UserPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Requests\StoreLabTaskRequest;
use App\Http\Requests\UpdateLabTaskRequest;

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
            'tasks' => LabTask::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $res = view('lab_task.create')->with([
            'queues' => LabQueue::all(),
        ]);

        if ($request->has('lab_queue_id'))
            $res->with([
                'lab_queue_id' => $request->input('lab_queue_id'),
            ]);

        return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLabTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabTaskRequest $request)
    {
        $data = $request->validated();

        $data['creator_id'] = Auth::id();

        if ($request->input('deadline') !== '') {
            $deadline = Carbon::parse($request->input('deadline'));
            Debugbar::debug("deadline: {$request->input('deadline')} -> $deadline");
            $data['deadline'] = $deadline;
        }

        $task = LabTask::create($data);

        return redirect()->route('task.show', compact('task'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabTask  $task
     * @return \Illuminate\Http\Response
     */
    public function show(LabTask $task)
    {
        $params = compact('task');

        if (Auth::check()) {
            $params['place'] = UserPlace::where('user_id', Auth::id())->where('lab_task_id', $task->id)->first();
        }

        Debugbar::debug($params);

        return view('lab_task.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabTask  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(LabTask $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabTaskRequest  $request
     * @param  \App\Models\LabTask  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabTaskRequest $request, LabTask $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabTask  $labTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabTask $task)
    {
        //
    }
}
