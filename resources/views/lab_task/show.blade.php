@extends('layouts.app')

@section('content')
    <div class="container col-6">
        <div class="d-flex justify-content-between align-items-baseline">
            <h1>{{ __('Lab №') }} {{ $task->index }}</h1>
            <span>{{ $task->labQueue->name }}</span>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}</p>

                <p class="card-text">
                    @if ($task->deadline == null)
                        <span class="alert alert-info py-2">
                            {{ __('This lab does not have a deadline.') }}
                        </span>
                    @else
                        <span class="alert alert-warning py-2">
                            {{ __('Deadline') }}: {{ $task->deadline->format('j M') }}
                        </span>
                    @endif
                </p>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </div>
@endsection
