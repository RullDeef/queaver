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

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>

                @isset($groupmates)
                    <div class="col-3">
                        <div class="card">

                            <div class="card-header">{{ __('Groupmates list') }}</div>

                            <div class="card-body">
                                @foreach ($groupmates as $gm)
                                    <div class="d-flex justify-content-between {{ $loop->index == 0 ? '' : 'border-top' }}">
                                        <span>{{ $gm->name . ' '  . Str::substr($gm->name, 0, 1) . '.' }}</span>

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
