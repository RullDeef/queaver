@extends('layouts.app')

@section('content')
    @include('partials.verify-email')

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
                <div class="row">
                    <div class="col-auto">
                        <form action="{{ route('place.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="lab_task_id" value="{{ $task->id }}">
                            <input type="hidden" name="lab_queue_id" value="{{ $task->labQueue->id }}">
                            <input class="btn btn-primary" type="submit" value="Put this on queue"
                                @isset($place) disabled @endisset>
                        </form>
                    </div>
                    @isset($place)
                        <div class="col-auto text-success my-auto alert alert-success py-0 px-2">
                            Lab was putted on queue.
                        </div>
                    @endisset
                    @if ($errors->any())
                        <div class="col-auto text-danger my-auto alert alert-danger py-0 px-2">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
