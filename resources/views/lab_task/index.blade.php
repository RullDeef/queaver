@extends('layouts.app')

@section('content')
    @include('partials.verify-email')

    <div class="container col-8 d-flex flex-wrap">
        {{-- TODO: make sections for each queue --}}
        @foreach ($tasks as $task)
            <div class="card col-4 mb-3 mx-3">
                <div class="card-header d-flex justify-content-between">
                    <span>{{ $task->title }}</span>
                    <a href="{{ route('task.show', compact('task')) }}">
                        {{ __('View this') }} &rightarrow;
                    </a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            {{ $task->title }}
                        </h5>
                        <small class="card-text alert alert-info py-1">
                            {{ $task->labQueue->name }}
                        </small>
                    </div>
                    <p class="card-text">Description: {{ $task->description }}</p>
                </div>
                <div class="card-footer">
                    Add info
                </div>
            </div>
        @endforeach
    </div>
@endsection
