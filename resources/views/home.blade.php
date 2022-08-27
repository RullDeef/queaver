@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @unless(auth()->user()
                ?->hasVerifiedEmail())
                <div class="alert alert-warning" role="alert">
                    <strong>{{ __('Warning') }}</strong> {{ __('Check your inbox for email verification link') }}
                </div>
            @endunless

            <div class="row">
                <div class="col-9">
                    <div class="card mb-4">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h1 class="px-4 py-4 d-flex justify-content-between">
                                <span>{{ __('My stats') }}</span><span>2/18</span>
                            </h1>

                            <div class="container ">
                                <div class="row">
                                    <h3 class="offset-1 col-4">{{ __('Labs done') }}:</h3>
                                    <h3 class="col-2 text-success">13</h3>
                                </div>
                                <div class="row">
                                    <h3 class="offset-1 col-4">{{ __('Labs pending') }}:</h3>
                                    <h3 class="col-2 text-warning">4</h3>
                                </div>
                                <div class="row">
                                    <h3 class="offset-1 col-4">{{ __('Labs ongoing') }}:</h3>
                                    <h3 class="col-2 text-danger">~37</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    @isset($queues)
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Queues') }}</div>
                            <div class="card-body" style="overflow: scroll">

                                <div class="container-fluid">
                                    <div class="row flex-row flex-nowrap">
                                        @foreach ($queues as $queue)
                                            <div class="col-3 container">
                                                <div class="card">
                                                    <div class="card-header"></div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">{{ $queue->name }}</h5>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div>6/20 people</div>
                                                        <div>04:39:15 for you</div>
                                                        <div>00:20:10 for everyone</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">{{ __('my places') }}</button>
                            </div>
                        </div>
                    @endisset
                </div>

                @isset($groupmates)
                    <div class="col-3">
                        <div class="card">

                            <div class="card-header">{{ __('Groupmates list') }}</div>

                            <div class="card-body">
                                @foreach ($groupmates as $gm)
                                    <div class="d-flex justify-content-between {{ $loop->index == 0 ? '' : 'border-top' }}">
                                        <span>{{ $gm->name . ' ' . Str::substr($gm->name, 0, 1) . '.' }}</span>

                                        @if (Cache::has('user-is-online-' . $gm->id))
                                            <span class="text-success">
                                                Online
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection
