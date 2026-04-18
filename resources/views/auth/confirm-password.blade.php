<x-guest-layout>
    <div class="auth-card-header">
        <span class="auth-chip">Security check</span>
        <h2>Confirm password</h2>
        <p>Please confirm your password before continuing.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="auth-footer">
            <a class="auth-inline-link" href="{{ route('home') }}">{{ __('Back to site') }}</a>
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>