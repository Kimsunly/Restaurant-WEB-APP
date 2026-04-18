<x-guest-layout>
    <div class="auth-card-header">
        <span class="auth-chip">Sign in</span>
        <h2>Welcome back</h2>
        <p>Log in to manage the Feane restaurant menus and homepage slides.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="auth-field">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="auth-footer-links">
            <label for="remember_me" class="d-inline-flex align-items-center mb-0">
                <input id="remember_me" type="checkbox" name="remember" class="auth-input mr-2">
                <span class="auth-muted mb-0">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="auth-small-link" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            @endif
        </div>

        <div class="auth-footer">
            <a class="auth-inline-link" href="{{ route('home') }}">{{ __('Back to site') }}</a>
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>