@extends('layouts.app')

@section('content')
    @include('partials.verify-email')

    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-9">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <dashboard />
                    </div>

                    <queue-preview @isset($queues) :queues="{{ $queues }}" @endisset
                        @can('create', \App\LabQueue::class) :can-create="true" @endcan />

                </div>

                @isset($groupmates)
                    <div class="col-3">
                        <groupmate-list :groupmates="{{ $groupmates }}" />
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection
