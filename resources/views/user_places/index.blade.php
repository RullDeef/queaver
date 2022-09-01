@extends('layouts.app')

@section('content')
    <div class="container col-8">
        <h1>User places:</h1>
        @foreach ($userPlaces as $userPlace)
            <div class="card mb-3">
                <div class="card-header">
                    Queue: {{ $userPlace->labQueue->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">User: {{ $userPlace->owner->surname }}</h5>
                    <p class="card-text">Lab: # {{ $userPlace->labTask->index }}</p>
                </div>
                <div class="card-footer">
                </div>
            </div>
        @endforeach
    </div>
@endsection
