<x-guest-layout>
    <div class="auth-card-header">
        <span class="auth-chip">Reset access</span>
        <h2>Forgot password</h2>
        <p>We will email you a password reset link.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="auth-footer">
            <a class="auth-inline-link" href="{{ route('login') }}">{{ __('Back to login') }}</a>
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>