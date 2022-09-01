@extends('layouts.app')

@section('content')
    @include('partials.verify-email')

    <div class="container col-8 d-flex flex-wrap justify-content-begin">
        {{-- TODO: make sections for different courses (for admins) --}}
        @foreach ($queues as $queue)
            <div class="card mb-3 mx-3 col-3">
                <div class="card-header d-flex justify-content-between">
                    <span>{{ $queue->name }}</span>
                    <a href="{{ route('queue.show', ['queue' => $queue]) }}">
                        {{ __('View this') }} &rightarrow;
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">Content</p>
                </div>
                <div class="card-footer">
                    Footer
                </div>
            </div>
        @endforeach
    </div>
@endsection
