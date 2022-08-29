@extends('layouts.app')

@section('content')
    <div class="container col-4">
        <h1>{{ __('Lab task creation') }}</h1>

        <form method="post" action="{{ route('task.store') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="lab-queue-id">{{ __('Queue to add task to') }}</label>
                <select class="form-control" id="lab-queue-id" name="lab_queue_id"
                    @isset($lab_queue_id) value="{{ $lab_queue_id }}" @endisset>
                    @foreach ($queues as $queue)
                        <option value="{{ $queue->id }}">{{ $queue->name }}</option>
                    @endforeach
                </select>

                @error('lab_queue_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="index">{{ __('Lab index') }}</label>
                <input type="number" class="form-control" name="index" id="index" required>

                @error('index')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" name="title" id="title" required>
                {{-- TODO: add remaining chars counter --}}

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="desription" class="form-label">{{ __('Lab description') }}</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- TODO: add checkbox for deadline activation --}}
            <div class="form-group mb-3">
                <label for="deadline">{{ __('Lab deadline') }}</label>
                <input type="date" class="form-control" name="deadline" id="deadline">

                @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Submit new task') }}</button>
        </form>
    </div>
@endsection
