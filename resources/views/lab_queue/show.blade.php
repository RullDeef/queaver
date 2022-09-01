@extends('layouts.app')

@section('content')
    @include('partials.verify-email')

    <lab-queue-viewer :me="{{ $me }}" :queue="{{ $queue }}" :my-task-states="{{ $taskStates }}"
        @can('create', \App\LabTask::class) :can-create-lab-tasks="true" @endcan />
@endsection
