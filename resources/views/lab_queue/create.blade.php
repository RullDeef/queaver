@extends('layouts.app')

@section('content')
    @include('partials.verify-email')

    <div class="container col-4">
        <h1>{{ __('Create queue') }}</h1>

        <form action="{{ route('queue.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Queue name') }}</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                    required>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="mr-3" for="semester">{{ __('Semester') }}</label>
                <input class="form-control @error('semester') is-invalid @enderror" type="number" id="semester"
                    name="semester" min="1" max="8" value="{{ Auth::user()->semester }}" required>

                @error('semester')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="labs-count">{{ __('Approx labs count') }}</label>
                <input class="form-control @error('labs_count') is-invalid @enderror" type="number" name="labs_count"
                    id="labs-count" min="1" max="255" required>

                @error('labs_count')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="priority-policy">{{ __('Priority policy') }}</label>
                <select class="form-control @error('priority_policy') is-invalid @enderror" id="priority-policy"
                    name="priority_policy" value="1">
                    <option value="1">{{ __('Priority policy 1') }}</option>
                    <option value="2">{{ __('Priority policy 2') }}</option>
                    <option value="3">{{ __('Priority policy 3') }}</option>
                    <option value="4">{{ __('Priority policy 4') }}</option>
                </select>

                @error('priority_policy')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group checkbox">
                <label class="mx-2" for="group-index-indifference">
                    <input class="@error('group_index_indifference') is-invalid @enderror" type="checkbox"
                        name="group_index_indifference" id="group-index-indifference">
                    {{ __('Group index indifference') }}</label>

                @error('group_index_indifference')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <p>
            <div class="alert alert-warning" role="alert">
                Both admins and moders can create new queues. However, <strong>only admins can delete</strong> them, so be
                careful.
            </div>
            </p>

            <button type="submit" class="btn btn-primary">{{ __('Create new queue') }}</button>
        </form>
    </div>
@endsection
