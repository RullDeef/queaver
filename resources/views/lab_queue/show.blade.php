@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-3">
                <h1>{{ $queue->name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="offset-1 col-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Filters') }}:</h5>
                        <p class="card-text">
                            <ul>
                                <li>{{ __('Status') }}: {{ $queue->status }}</li>
                                <li>{{ __('Priority') }}: {{ $queue->priority }}</li>
                                <li>{{ __('Created at') }}: {{ $queue->created_at }}</li>
                                <li>{{ __('Updated at') }}: {{ $queue->updated_at }}</li>
                            </ul>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Users') }}:</h5>
                        <p class="card-text">
                            <ul>
                                @foreach ([1,2,3,4,5] as $user)
                                    <li>{{ $user }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('About this queue') }}</h5>
                        <p class="card-text">Content</p>
                        <p class="card-text">Content</p>
                        <p class="card-text">Content</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
