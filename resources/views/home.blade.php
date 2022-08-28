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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <dashboard />
                    </div>

                    <queue-preview @isset($queues) :queues="{{ $queues }}" @endisset
                        :can-create="{{ Auth::user()->can('create', 'App\Models\LabQueue') }}" />
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
