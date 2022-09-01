@unless(auth()->user()?->hasVerifiedEmail())
    <div class="alert alert-warning" role="alert">
        <strong>{{ __('Warning') }}</strong> {{ __('Check your inbox for email verification link') }}
    </div>
@endunless
